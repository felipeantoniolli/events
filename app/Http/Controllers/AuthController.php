<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $req = $request->all();
        $password = $this->parseToSha256($req['password']);
        $user = User::where([
            ['email', $req['data']],
            ['password', $password]
        ])->orWhere([
            ['username', $req['data']],
            ['password', $password]
        ])->first();

        if (!$user) {
            $message = "Usuário ou senha inválidos!";
            $alert = "alert-danger";
            return view('auth.login', compact("message", "alert"));
        }

        session(["user" => json_encode($user)]);
        session(["type" => $user->type]);

        $message = "Bem vindo, " . $user->name;
        $alert = "alert-success";
        return redirect()->route('index.page');
    }

    public function logout()
    {
        session()->forget(['user', 'type']);
        return redirect()->route('index.page');
    }

    public function register(Request $request)
    {
        $rules = User::rules();
        $request->validate($rules['rules'], $rules['messages']);

        $req = $request->all();

        $req['password'] = self::parseToSha256($req['password']);

        if (!$user = UserController::create($req)) {
            $message = 'Erro ao finalizar cadastro, tente novamente mais tarde.';
            $caminho = 'register.submit';
            return view('auth.register', compact('message', 'caminho'));
        }

        $message = 'Cadastro realizado com sucesso!';
        $alert = 'alert-success';
        return redirect()->route('index.page');
    }

    public static function parseToSha256($data)
    {
        return hash('sha256', $data);
    }
}
