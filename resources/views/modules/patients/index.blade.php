@extends('layouts.app')

@section('content')

<div class="container">
  
    <div class="row"></div>

    <div class="row">
      {{ Form::open(['method' => 'GET', 'id' => 'searchPacienteForm']) }}
        <div class="row">
            <div class="input-field col s12">
                {!! Form::text('searchPacienteInput', null, ['id' => 'searchPacienteInput']) !!}
                {!! Form::label('searchPacienteInput', 'Buscar Paciente por cédula o nombre') !!}
            </div>
        </div>
        <div class="row center-align">
              {!! Form::submit('Buscar', ['class' => 'btn blue-grey darken-1']) !!}
        </div>
        </div>
      {{ Form::close() }}
    </div>
  
    <div class="container">

    @foreach($patients as $patient)    
        <div class="row">
            <div class="col s12">
              <div class="card">
              <div class="card-content">
              <div class="card-title">{{ $patient->nombre }}</div>
              <div class="row valign-wrapper">
                  HC: {{ $patient->id }} <br>
                  {{ $patient->cedula }}
              </div>
              </div>
              <div class="card-action">
                <a href="{{ route('pacientes.show', $patient->id) }}">Historia Clínica</a>
              </div>
            </div>
          </div>
        </div>
    @endforeach

  </div>

    <div class="row center-align">
        {{ $patients->links('vendor.pagination.simple-default') }}  
    </div>
</div>

@endsection