<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Validator;

class EventController extends Controller
{
    public function newEventPage()
    {
        $page = 0;
        return view('adm.eventForm', compact('page'));
    }

    public function editEventPage($id)
    {
        $event = Event::where('id_event', $id)->first();

        if (!$event) {
            $message = 'Página não encontrada!';
            $alert = 'btn-danger';
            return view('adm.index', compact('message', 'alert'));
        }

        $date = explode(" ", $event->start_date);
        $event->start_date = $date[0];
        $event->start_time = $date[1];

        $date = explode(" ", $event->end_date);
        $event->end_date = $date[0];
        $event->end_time = $date[1];

        $page = 1;
        return view('adm.eventForm', compact('page', 'event'));
    }

    private function formatEvent($req)
    {
        $user = session()->get('user');
        $user = json_decode($user, false);

        $start = str_replace(':', '', $req['start_time']);
        $end = str_replace(':', '', $req['end_time']);

        $startTime = '';
        $endTime = '';
        for ($i = 0; $i < 3; $i++) {
            if ($i == 0) {
                $n = 0;
            } else {
                $n = 2;
            }

            $startTime .= substr($start, $n, 2);
            $endTime .= substr($end, $n, 2);

            if ($i < 2) {
                $startTime .= ":";
                $endTime .= ":";
            }
        }

        $startDate = $req['start_date'] . ' ' . $startTime;
        $endDate = $req['end_date'] . ' ' . $endTime;

        $data = [
            'id_user' =>  $user->id_user,
            'name' => $req['name'],
            'start_date' => $startDate,
            'description' => $req['description'],
            'end_date' => $endDate,
            'address' => $req['address'],
            'tickets' => $req['tickets']
        ];

        return $data;
    }

    public function insert(Request $request)
    {
        $req = $request->all();

        $rules = Event::rules();

        $data = $this->formatEvent($req);

        $validator = Validator::make(
            $data,
            $rules['rules'],
            $rules['messages']
        );

        if ($validator->fails()) {
            $message = 'Houve um erro ao inserir o evento!';
            $page = 0;
            $event = $req;
            $errors = $validator->errors();
            return view('adm.eventForm', compact('message', 'page', 'req', 'errors'));
        }

        $event = Event::create($data);

        if (!$event) {
            $message = 'Houve um erro ao inserir o evento!';
            $page = 0;
            $event = $req;
            return view('adm.eventForm', compact('message', 'page', 'req'));
        }

        $message = 'Evento criado com sucesso!';
        $alert = 'btn-success';
        return redirect()->route('adm.index', compact('message', 'alert'));
    }

    public function edit(Request $request)
    {
        $req = $request->all();

        $rules = Event::rules();

        $data = $this->formatEvent($req);

        $validator = Validator::make(
            $data,
            $rules['rules'],
            $rules['messages']
        );

        if ($validator->fails()) {
            $message = 'Houve um erro ao alterar o evento!';
            $page = 1;
            $event = $req;
            $errors = $validator->errors();
            return view('adm.eventForm', compact('message', 'page', 'event', 'errors'));
        }

        $data['id_event'] = $req['id_event'];

        $event = new Event($data);

        $event->save();

        if (!$event) {
            $message = 'Houve um erro ao alterar o evento!';
            $page = 0;
            $event = $req;
            return view('adm.eventForm', compact('message', 'page', 'req'));
        }

        $message = 'Evento alterado com sucesso!';
        $alert = 'btn-success';
        return redirect()->route('adm.index', compact('message', 'alert'));
    }

    public function delete($id)
    {
        $event = Event::where('id_event', $id)->first();

        if (!$event) {
            $message = 'Evento não encontrado!';
            $alert = "alert-danger";
            return redirect()->route('adm.index');
        }

        $event->delete();

        $message = 'Evento não encontrado!';
        $alert = "alert-danger";
        return redirect()->route('adm.index');

    }
}
