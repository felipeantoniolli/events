@extends('layout.structure')

@section('titulo', 'Pagina de Administração')

@section('conteudo')
    <h1>Pagina de administração de eventos</h1>
    <a href="{{ route('adm.newevent') }}">
        <button>
            Novo Evento
        </button>
    </a>
    <div class="content">
        @if (isset($message))
            <div class="alert {{$alert}}" role="alert">
                {{$message}}
            </div>
        @endif
        <div>
            Eventos cadastrados
            <div class="m-5">
                @if (isset($events))
                    @foreach($events as $event)
                        <div>Nome: {{$event->name}}</div>
                        <div>Descrição: {{$event->description}}</div>
                        <div>Data do evento: {{date('d/m/Y', strtotime($event->start_date))}}</div>
                        <div>Hora do evento: {{date('h:i', strtotime($event->start_date))}}</div>
                        <a href="{{ route('adm.editevent',  $event->id_event) }}">
                            <button>Editar</button>
                        </a>
                        <a href="{{ route('event.delete',  $event->id_event) }}">
                            <button>Excluir</button>
                        </a>
                    @endForeach
                @endif
            </div>
        </div>
    </div>
@endsection
