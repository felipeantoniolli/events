@extends('layout.structure')

@section('titulo', 'Registro')

@section('conteudo')
    <div class="panel panel-dark panel-flat">
        <div class="panel-body">
            <p class="text-center pv">Cadastre-se</p>
            <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                <input type="hidden" name="tipo" value="servidor"/>
                <div class="form-group has-feedback">
                    <p class="title"> Usuário:</p>
                    <input id="username" name="username" autofocus type="text" placeholder="Usuário" required
                        value="{{ isset($user->username)  ? $user->username  : '' }}"
                        class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}">
                    @if($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> Senha:</p>
                    <input id="password" name="password" type="password" placeholder="Senha" required
                        value="{{ isset($user->password)  ? $user->password  : '' }}"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> E-mail:</p>
                    <input id="email" name="email" type="email" placeholder="email@email.com.br" required
                        value="{{ isset($user->email)  ? $user->email  : '' }}"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> Nome Completo:</p>
                    <input id="name" name="name" autofocus type="text" placeholder="Nome Completo" required
                        value="{{ isset($user->name)  ? $user->name  : '' }}"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> CPF:</p>
                    <input id="cpf" name="cpf" autofocus type="text" maxlength="11" placeholder="CPF" required
                        value="{{ isset($user->cpf)  ? $user->cpf  : '' }}"
                        class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}">
                    @if($errors->has('cpf'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cpf') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                        <p class="title"> Data de nascimento:</p>
                        <input id="birth" name="birth" autofocus type="date" maxlength="11" placeholder="25/06/1996" required
                            value="{{ isset($user->birth)  ? $user->birth  : '' }}"
                            class="form-control {{ $errors->has('birth') ? 'is-invalid' : '' }}">
                        @if($errors->has('birth'))
                            <div class="invalid-feedback">
                                {{ $errors->first('birth') }}
                            </div>
                        @endif
                    </div>
                <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
