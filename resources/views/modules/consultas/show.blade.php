@extends('layouts.app')

@section('content')

<div class="container">
    
        <h5><a href="{{ URL::previous() }}"><i class="material-icons">keyboard_arrow_left</i> Atrás</a></h5>

        <p class="flow-text">Marcar tratamientos realizados en la consulta de hoy al paciente <b>{{ $paciente->nombre }}</b></p>

        {{ Form::open(['route' => 'consultas.evolucion', 'method' => 'POST']) }}

        @foreach ($diagnosticos as $diagnostico)
                <div class="card">
                    <div class="card-content">
                        <label>
                            {{ Form::checkbox('diagnostico[]', $diagnostico->id) }}
                            <span>
                                {{ $diagnostico->procedimiento->procedimiento }}
                                {{ $diagnostico->pieza ? ' - Pieza: '.$diagnostico->pieza : '' }}
                                {{ $diagnostico->zona ? ' - Zona(s): '.$diagnostico->zona : '' }}
                                {!! ' - <b class="flow-text">Precio: ' . $diagnostico->procedimiento->precio . '</b>' !!}
                            </span>
                        </label>
                    </div>        
                </div>
        @endforeach

        {{ Form::hidden('id', $consulta->id) }}

        {{ Form::hidden('idpaciente', $consulta->paciente_id) }}

        <div class="row">
            <div class="input-field col s12">
                {!! Form::textarea('evolucion', null, ['class' => 'materialize-textarea', 'required']) !!}
                {!! Form::label('evolucion', 'Evolución clínica') !!}
            </div>
        </div>

        <div class="row center-align">
            {!! Form::submit('Realizar', ['class' => 'btn blue-grey darken-2']) !!}
        </div>

        {!! Form::close() !!}
</div>
 
@endsection