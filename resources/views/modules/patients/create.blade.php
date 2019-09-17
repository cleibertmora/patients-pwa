@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <h5><a href="{{ URL::previous() }}"><i class="material-icons">keyboard_arrow_left</i> Atrás</a></h5>

            <h3 class="right-align">Agregar paciente</h3>

            {{ Form::open(['route' => 'pacientes.store', 'method' => 'POST']) }}

            @include('modules.patients.inc.fields')

            {!! Form::submit('Agregar', ['class' => 'btn blue-grey darken-2']) !!}

            {{ Form::close() }}
        </div>
    </div>

@endsection