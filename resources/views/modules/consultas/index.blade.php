@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row"></div>

    <h5>Consultas para el día <b>{{ $queryFecha }}</b></h5>

    <div class="row">
    {{ Form::open(['method' => 'GET']) }}
        <div class="row">
            <div class="input-field col s12">
                {!! Form::text('fecha', null, ['class' => 'datepicker']) !!}
                {!! Form::label('fecha', 'Seleccionar Fecha') !!}
            </div>
        </div>
        <div class="row center-align">
            {!! Form::submit('Buscar', ['class' => 'btn blue-grey darken-1']) !!}
            <a href="{{ route('listado', 'fecha='. now()->format('Y-m-d')) }}" class="btn">Hoy</a>
        </div>
        </div>
    {{ Form::close() }}

    @if($consultas->isNotEmpty())

       @foreach($consultas as $consulta)

       <div class="row">
            <div class="col s12">
              <div class="card">
              <div class="card-content">
              <div class="card-title">
                  Paciente: <b>{{ $consulta->patient->nombre }}</b>
              </div>
              <div class="row valign-wrapper">
                <p>Doctor Agendado: {{ $consulta->doctor->nombre }} <br>
                  Motivo Consulta: <br> {{ $consulta->motivoConsulta }} <br/>
                  Estado: {{ $consulta->status }} <br>
                  Horario:<span class="badge blue-grey darken-1 white-text center-align"> Desde: {{ $consulta->horaIn }} - Hasta: {{ $consulta->horaFin }} <span></p>
              </div>
              </div>
              <div class="card-action">
                    <a href="{{ route('pacientes.show', $consulta->patient->id) }}">Historia Clínica del Paciente</a> <br>
                    <a href="{{ route('consultas.edit', [$consulta->id ,'id='.$consulta->patient->id]) }}">Editar Consulta</a>
              </div>
            </div>
          </div>
        </div>

       @endforeach

    @else

        <p class="center-align flow-text">No hay consultas para esta fecha, agende algunas en el modulo de <a href="{{ route('pacientes.index') }}">pacientes</a>.</p>

    @endif


</div>

</div>

@endsection