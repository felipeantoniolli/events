<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Subscription;

class SubscriptionController extends Controller
{
    public function subscribe($id)
    {
        $user = session()->get("user");
        $user = json_decode($user, false);

        $subscription = Subscription::create([
            'id_event' => $id,
            'id_user' => $user->id_user,
            'subscribe_date' => date('Y-m-d H:i:s')
        ]);

        if (!$subscription) {
            $message = "Não foi possivel se inscrever no evento!";
            $alert = "alert-danger";
            return redirect()->route('subscription.index');
        }

        $message = "Inscrito com sucesso";
        $alert = "alert-success";
        return redirect()->route('subscription.index');
    }

    public function index()
    {
        $user = session()->get("user");
        $user = json_decode($user, false);

        $subscriptions = Subscription::where('id_user', $user->id_user)->get();

        if (!$subscriptions) {
            return view("subscription.index");
        }

        $eventsId[] = null;
        foreach ($subscriptions as $one) {
            $eventsId[] = $one->id_event;
        }

        $events = Event::whereIn('id_event', $eventsId)->get();

        if (!$events) {
            return view("subscription.index");
        }

        return view("subscription.index", compact('events'));
    }

    public function unsubscribe($id)
    {
        $user = session()->get("user");
        $user = json_decode($user, false);

        $subscription = Subscription::where([
            ['id_subscription', $id],
            ['id_user', $user->id_user]
        ])->first();

        if (!$subscription) {
            return redirect()->route("subscription.index");
        }

        $subscription->delete();
        return redirect()->route("subscription.index");
    }
}
