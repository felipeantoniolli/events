@extends('layout.structure')

@section('titulo', 'Login')

@section('conteudo')
    @if (isset($message))
        <div class="alert {{$alert}}" role="alert">
            {{$message}}
        </div>
    @endif
  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container">
      <!--Grid row-->
      <div class="row d-flex justify-content-center">

        <!--Grid column-->
        <!--Grid column-->
      </div>
      <!--Grid row-->
      <div class="col-lg-12 titulo-cadastro">
      <h1 style="text-align: center">Login</h1>
    </div>
      <!--Grid row-->
      <div class="row text-center wow fadeIn">

        <!--Grid column-->

        <div class="col-lg-12 col-md-12 mb-4">
            <form method='POST' action={{route('login.submit')}}>
            @csrf
                <!--Card-->
                <div class="card card-cadastro">
                    <!-- Card header -->
                    <div class="card-header">
                        <h4>
                            <strong>Acessar</strong>
                        </h4>
                    </div>
                    <!--Card content-->
                    <div class="card-body text-center">
                    <ol class="list-unstyled mb-4">
                        <li>
                            <b>E-mail:</b>
                        </li>
                        <li>
                            <input id="nome" name="data" autofocus type="text" placeholder="Usuário ou E-mail" required class="form-control form-cadastro">
                        </li>
                        <hr>
                        <li>
                            <b>Senha:</b>
                        </li>
                        <li>
                            <input id="nome" name="password" autofocus type="password" placeholder="Senha" required class="form-control form-cadastro">
                        </li>
                        <hr>
                    </ol>
                    <div class="botao-cadastro">
                        <button type="submit" class="btn btn-cadastro btn-lg btn-block btn-outline-primary waves-effect">
                            Entrar
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
          <!--/.Card-->
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

    </div>
  </main>
@endsection
