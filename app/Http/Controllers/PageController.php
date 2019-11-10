<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class PageController extends Controller
{
    public function index()
    {
        $events = Event::where([
            ['start_date', '>', date('Y-m-d H:i:s')]
        ])->get();

        return view('index', compact('events'));
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }


}
