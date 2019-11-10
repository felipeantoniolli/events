<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class AdmController extends Controller
{
    public function index()
    {
        $user = session()->get('user');
        $user = json_decode($user, false);

        $events = Event::where([
            ['id_user', $user->id_user],
            ['start_date', '>', date('Y-m-d H:i:s')]
        ])->get();

        return view('adm.index', compact('events'));
    }
}
