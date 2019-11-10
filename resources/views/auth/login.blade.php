@extends('layout.structure')

@section('titulo', 'Login')

@section('conteudo')
    @if (isset($message))
        <div class="alert {{$alert}}" role="alert">
            {{$message}}
        </div>
    @endif
    <form method='POST' action={{route('login.submit')}}>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Usuário ou Email</label>
            <input name="data" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuário ou email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="******">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
@endsection
