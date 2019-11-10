@extends('layout.structure')

@if($page == 1)
    @section('titulo', 'Alterar Evento')
@else
    @section('titulo', 'Novo Evento')
@endif

@section('conteudo')
    <div class="panel panel-dark panel-flat">
        <div class="panel-body">
            <p class="text-center pv">
                {{ $page ? 'Alterar Evento' : 'Cadastrar Evento' }}
            </p>
            <form method="POST" action="{{ $page ? route('event.editsubmit') : route('event.submit')}}">
                @csrf
                @if ($page == 1)
                    <input id="id_event" name="id_event" type="hidden" required>
                @endif
                <div class="form-group has-feedback">
                    <p class="title"> Nome do evento:</p>
                    <input id="name" name="name" autofocus type="text" placeholder="Nome do evento" required
                        value="{{ isset($event->name)  ? $event->name  : '' }}"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> Descrição do evento:</p>
                    <input id="description" name="description" autofocus type="text" placeholder="Descrição do evento" required
                        value="{{ isset($event->description)  ? $event->description  : '' }}"
                        class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> Data de inicio:</p>
                    <input id="start_date" name="start_date" autofocus type="date" maxlength="11" placeholder="25/06/2019" required
                        value="{{ isset($event->start_date)  ? $event->start_date  : '' }}"
                        class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}">
                    @if($errors->has('start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> Hora de inicio:</p>
                    <input id="start_time" name="start_time" autofocus type="text" placeholder="08:00:00" required
                        value="{{ isset($event->start_time)  ? $event->start_time  : '' }}"
                        class="form-control {{ $errors->has('start_time') ? 'is-invalid' : '' }}">
                    @if($errors->has('start_time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_time') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> Data de fim:</p>
                    <input id="end_date" name="end_date" autofocus type="date" maxlength="11" placeholder="25/06/2019" required
                        value="{{ isset($event->end_date)  ? $event->end_date  : '' }}"
                        class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}">
                    @if($errors->has('end_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_date') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> Hora de fim:</p>
                    <input id="end_time" name="end_time" max-lenght="10" autofocus type="text" placeholder="19:00:00" required
                        value="{{ isset($event->end_time)  ? $event->end_time  : '' }}"
                        class="form-control {{ $errors->has('end_time') ? 'is-invalid' : '' }}">
                    @if($errors->has('end_time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_time') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> Endereço:</p>
                    <input id="address" name="address" type="text" placeholder="Endereço" required
                        value="{{ isset($event->address)  ? $event->address  : '' }}"
                        class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}">
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                </div>
                <div class="form-group has-feedback">
                    <p class="title"> Tickets:</p>
                    <input id="tickets" name="tickets" autofocus type="number" min="1" required
                        value="{{ isset($event->tickets)  ? $event->tickets  : '' }}"
                        class="form-control {{ $errors->has('tickets') ? 'is-invalid' : '' }}">
                    @if($errors->has('tickets'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tickets') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-block btn-primary mt-lg btn-lg">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
