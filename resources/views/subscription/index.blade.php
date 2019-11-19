@extends('layout.structure')

@section('titulo', 'Inscrições')

@section('conteudo')
    <h1>Pagina de inscrições dos eventos</h1>
    <div class="content">
        @if (isset($message))
            <div class="alert {{$alert}}" role="alert">
                {{$message}}
            </div>
        @endif
        <div>
            Eventos inscritos
            <div class="m-5">
                @if (isset($events))
                    @foreach($events as $event)
                        <div>Nome: {{$event->name}}</div>
                        <div>Descrição: {{$event->description}}</div>
                        <div>Data do evento: {{date('d/m/Y', strtotime($event->start_date))}}</div>
                        <div>Hora do evento: {{date('h:i', strtotime($event->start_date))}}</div>-
                    @endForeach
                @endif
            </div>
        </div>
    </div>
@endsection
