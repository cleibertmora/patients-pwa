@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <h5><a href="{{ route('pacientes.show', $paciente) }}"><i class="material-icons">keyboard_arrow_left</i> Atrás</a></h5>

        <h4 class="right-align">Agregar diagnósticos</h4>
    </div>

    <div class="row">
        {{ Form::open(['route' => 'diagnosticos.insert', 'method' => 'POST']) }}

            @include('modules.diagnostics.inc.fields')

        <div class="row center-align">
            {{ Form::submit('Agregar diagnóstico', ['class' => 'btn blue-grey darken-2']) }}
        </div>

        {{ Form::close() }}
    </div>

    @if($diagnosticos->isNotEmpty())
    
        @foreach($diagnosticos as $diagnostico)
            <div class="card">
                <div class="card-content">
                    {{ $diagnostico->procedimiento->procedimiento }}
                    {{ $diagnostico->pieza ? ' - Pieza: '.$diagnostico->pieza : '' }}
                    {{ $diagnostico->zona ? ' - Zona(s): '.$diagnostico->zona : '' }}
                    {!! ' - <b class="flow-text">Precio: ' . $diagnostico->procedimiento->precio . '</b>' !!}
                
                @if ($diagnostico->estado === 'pendiente')
                    <span class="new badge red" data-badge-caption="">{{ $diagnostico->estado }}</span>
                @elseif($diagnostico->estado === 'realizado')
                    <span class="new badge blue" data-badge-caption="">{{ $diagnostico->estado }}</span> <br>
                    {{-- Marcar como <a href="{{ route('undoTratamiento', $diagnostico->id) }}">no realizado</a> --}}
                @else
                    <span class="new badge green" data-badge-caption="">{{ $diagnostico->estado }}</span>
                @endif 
                
                <br>

                </div>
            </div>
        @endforeach

    @else

    <div class="card">
        No hay diagnosticos para este paciente, agregue algunos :).
    </div>

    @endif

    <div class="row">
        @if($consultas)
        <h5 class="center-align">Consultas para hoy</h5>
            @foreach ($consultas as $consulta)
            <div class="col s12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        El día de hoy este paciente tiene una consulta, hora de consulta desde: {{ $consulta->horaIn }} - hasta {{ $consulta->horaFin }}
                        | <a href="{{ route('consultas.show', $consulta->id) }}" class="amber-text lighten-1">Evolucionar</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p class="center-align">Este paciente no tiene una consulta para evolucionar, <a href="{{ route('consultas.create', ['id='.$paciente]) }}">cree una aquí.</a></p>
        @endif
    </div>

</div>

@endsection