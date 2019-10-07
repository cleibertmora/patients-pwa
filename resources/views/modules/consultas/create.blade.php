@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <p><a href="{{ route('pacientes.index') }}"><i class="material-icons">keyboard_arrow_left</i> Atrás</a></p>
            <p class="flow-text">Crear una nueva cita para el paciente: {{ $patient->nombre }}</p>
        </div>
        
        <div class="row">

            {{ Form::open(['route' => 'consultas.store', 'method' => 'POST']) }}

            @include('modules.consultas.inc.fields')

            {!! Form::submit('Agregar', ['class' => 'btn blue-grey darken-2']) !!}

        </div>
    
    </div>

@endsection