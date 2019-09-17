@extends('layouts.app')

@section('content')

<div class="container">
        <h5><a href="{{ route('pacientes.index') }}"><i class="material-icons">keyboard_arrow_left</i> Listado de pacientes</a></h5>

        <h4 class="right-align">Historia clínica</h4>

    <div class="row">
        <div class="col s12">
            <div class="card">
            <div class="card-content">
            <div class="card-title">{{ $patient->nombre }}</div>
            <div class="row valign-wrapper">
                HC: {{ $patient->id }} <br>
                {{ $patient->telefono }}
            </div>
            </div>
            <div class="card-action">
            <a href="{{ route('pacientes.edit', $patient->id) }}">Editar datos del paciente</a>
            </div>
        </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col s12">
            <div class="card blue-grey lighten-4">
            <div class="card-content">
            <div class="card-title">Diagnósticos del paciente</div>
            <div class="row valign-wrapper">
                Diagnosticos pendientes aquí :).
            </div>
            </div>
            <div class="card-action">
            <a href="{{ route('diagnosticos', $patient->id) }}">Agregar Diagnósticos</a>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection