@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <p><a href="{{ route('pacientes.index') }}"><i class="material-icons">keyboard_arrow_left</i> Atrás</a></p>
            <p class="flow-text">Evolucionar Rápidamente a paciente: {{ $patient->nombre }}</p>
        </div>
        
        <div class="row">
            {{ Form::open(['route' => 'consultas.quickEvolucion.store', 'method' => 'POST']) }}

            @include('modules.consultas.inc.quickFields')

            {!! Form::submit('Evolucionar', ['class' => 'btn blue-grey darken-2']) !!}

            {{ Form::close() }}
        </div>
    
    </div>

@endsection