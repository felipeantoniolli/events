<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public static function create($request)
    {
        $user = User::create($request);

        return $user;
    }
}
