@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <p><a href="{{ route('pacientes.index') }}"><i class="material-icons">keyboard_arrow_left</i> Atrás</a></p>
            <p class="flow-text">Editar consulta del paciente: {{ $patient->nombre }}</p>
        </div>
        
        <div class="row">

            {{ Form::model($consulta, ['route' => ['consultas.update', $consulta->id], 'method' => 'PUT']) }}

                @include('modules.consultas.inc.fields')

                {!! Form::submit('Agregar', ['class' => 'btn blue-grey darken-2']) !!}

            {{ Form::close() }}

        </div>
    
    </div>

@endsection