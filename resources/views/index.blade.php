@extends('layout.structure')

@section('titulo', 'Index')

@section('conteudo')
    @if (isset($message))
        <div class="alert {{$alert}}" role="alert">
            {{$message}}
        </div>
    @endif
    <main class="mt-5 pt-4">
        <div class="container">

            <h3 class="my-5 h3 text-center">Sobre a <b>Cosplay SP</b>!</h3>

            <!--Grid row-->
            <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="home-text col-md-8 text-center">

                <p class="mb-5">A <b>COSPLAY SP</b> tem como objetivo reunir em um só lugar todos os eventos relacionados ao universo cosplay que
                ocorrem no estado de São Paulo. Desde desfiles, competições e oportunidades de <i>jobs</i>, a COSPLAY SP está sempre buscando
            expandir este hobby por toda São Paulo, facilitando a interação entre os <i>cosplayers</i> e os admiradores desta arte em ascensão.</p>

            </div>
            </div>
            <div class="col-lg-12">
            <h1 style="text-align: center">Eventos em Destaque</h1>
        </div>
        <div class="row text-center wow fadeIn">
            @if (isset($events))
                @foreach($events as $event)
                <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <strong>{{$event->name}}</strong>
                                </h4>
                            </div>
                            <div class="card-body">
                                <ol class="list-unstyled mb-4">
                                    <li>
                                        <b>Vagas:</b> {{$event->tickets}}
                                    </li>
                                    <hr>
                                        <li><h4>Sobre o evento:</h4>
                                        <p>{{$event->description}}</p>
                                    </li>
                                    <hr>
                                    <li>
                                        <b>Local:</b> {{$event->address}}
                                    </li>
                                    <hr>
                                    <li>
                                        <b>Horário:</b>{{date('d/m/Y', strtotime($event->start_date))}} das {{date('h:i', strtotime($event->start_date))}} às {{date('h:i', strtotime($event->end_date))}}
                                    </li>
                                </ol>

                                @if (session()->exists('user'))
                                <a href="{{ route('subscription.subscribe',  $event->id_event) }}">
                                    <button type="button" class="btn btn-cadastro btn-lg btn-block btn-outline-primary waves-effect">Inscrever-se</button>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endForeach
            @endif
        </div>
        <!--Grid row-->
        </div>
        </div>
    </main>
    <!--Main layout-->
@endsection
