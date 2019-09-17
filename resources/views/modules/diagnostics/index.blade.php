@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <h5><a href="{{ URL::previous() }}"><i class="material-icons">keyboard_arrow_left</i> Atrás</a></h5>

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

    @if($diagnosticos)
    
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
                    <span class="new badge blue" data-badge-caption="">{{ $diagnostico->estado }}</span>
                @else
                    <span class="new badge green" data-badge-caption="">{{ $diagnostico->estado }}</span>
                @endif 
                
                <br>
                
                <p class="">
                    <a href="#"  title="ajustar precio"><i class="material-icons">swap_vert</i></a>
                </p>

                </div>
            </div>
        @endforeach

    @else

    <div class="card">
        No hay diagnosticos para este paciente, agregue algunos :).
    </div>

    @endif

</div>

@endsection