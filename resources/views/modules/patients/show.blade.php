@extends('layouts.app')

@section('content')

<div class="container">
        <h5><a href="{{ route('pacientes.index') }}"><i class="material-icons">keyboard_arrow_left</i> Listado de pacientes</a></h5>

        <h4 class="right-align">Historia clínica</h4>

    <div class="row">
        <div class="col s12">
            <div class="card">
            <div class="card-content">
            <div class="card-title">Paciente: {{ $patient->nombre }}</div>
            <div class="row valign-wrapper">
                <p>HC: {{ $patient->id }}  <br><br>
                
                <b>Información personal:</b>  <br>
                
                Cédula del paciente: {{ $patient->cedula }} {!! $patient->doctype === 'pass' ? ' <span class="green-text">Extranjero</span>' : '' !!} {!! $patient->doctype === 'ruc' ? ' <span class="teal-text">Empresa</span>' : '' !!} <br>
                Contacto: {{ $patient->celular }} - {{ $patient->telefono }} <br>
                Email: {{ $patient->email }} </p>
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
            <div class="row">
                @if ($pendientes->isNotEmpty())

                <b> Este paciente tiene tratamientos pendientes por realizar: </b> <br>

                    @foreach ($pendientes as $item)
                        {{ $item->procedimiento->procedimiento }} {{ $item->pieza ? ' - Pieza: '.$item->pieza : '' }}
                        {{ $item->zona ? ' - Zona(s): '.$item->zona : '' }} <br>
                    @endforeach
                @else
                    Ningún tratamiento pendiente por realizar.
                @endif
            </div>
            </div>
            <div class="card-action">
            <a href="{{ route('diagnosticos', $patient->id) }}">Agregar Diagnósticos</a>
            </div>
        </div>
        </div>
    </div>

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
        @endif
    </div>

    <div class="row center-align">

        <p>
            <a href="{{ route('consultas.create', $patient->id) }}" class="btn blue-grey darken-2">Nueva consulta</a>
            <a href="{{ route('consultas.quickEvolucion', $patient->id) }}" class="btn blue-grey">Evolución Rápida</a>
        </p>

    </div>

    <div class="row">
        @if($historial->isNotEmpty())
        
        <h5 class="center-align">Historial de atenciones</h5>

            @foreach ($historial as $item)    
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <b>Consulta del día: {{ $item->fecha }} hora: {{ $item->horaIn }} - {{ $item->horaIn }}</b> con el <b> {{ $item->doctor->titulo }} {{ $item->doctor->nombre }} </b> <br>
                        <b>Estado: {{ $item->status }} </b><br><br>
                        
                        @if(count($item->diagnosticos) > 0)
                        <b>Tratamientos realizados:</b> <br>
                            @foreach ($item->diagnosticos as $diagnostico)
                                <ul class="collection">
                                    <li class="collection-item"> 

                                        {{ $diagnostico->procedimiento->procedimiento }}
                                        {{ $diagnostico->pieza ? ' - Pieza: '.$diagnostico->pieza : '' }}
                                        {{ $diagnostico->zona ? ' - Zona(s): '.$diagnostico->zona : '' }}

                                    </li>
                                </ul>
                            @endforeach
                        @endif

                        <b>Motivo de consulta:</b> <br>
                        
                        @if ($item->motivoConsulta)
                            {{ $item->motivoConsulta }} <br><br>
                        @else
                            Ningún motivo para esta consulta.<br><br>
                        @endif

                        <b>Evolución:</b> <br>
                        
                        @if ($item->evolucion)
                            {{ $item->evolucion }}
                        @else
                            Ningúna evolución para esta consulta.
                        @endif

                        <br><br>
                        
                        <a href="{{ route('consultas.edit', [$item->id ,'id='.$patient->id]) }}">Editar Consulta</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>

</div>

@endsection