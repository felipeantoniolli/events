@extends('layout.structure')

@section('titulo', 'Index')

@section('conteudo')
    @if (isset($message))
        <div class="alert {{$alert}}" role="alert">
            {{$message}}
        </div>
    @endif
    <div class="content">
            <div>
                Eventos
                <div class="m-5">
                    @if (isset($events))
                        @foreach($events as $event)
                            <div>Nome: {{$event->name}}</div>
                            <div>Descrição: {{$event->description}}</div>
                            <div>Data do evento: {{date('d/m/Y', strtotime($event->start_date))}}</div>
                            <div>Hora do evento: {{date('h:i', strtotime($event->start_date))}}</div>
                            @if (session()->exists('user'))
                                <a href="{{ route('subscription.subscribe',  $event->id_event) }}">
                                    <button>Inscreva-se</button>
                                </a>
                            @endif
                        @endForeach
                    @endif
                </div>
            </div>
    </div>
@endsection
