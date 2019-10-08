@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <h5><a href="{{ route('procedimientos.index') }}"><i class="material-icons">keyboard_arrow_left</i> Atrás</a></h5>

            <h3 class="right-align">Editar procedimiento</h3>

            {{ Form::model($procedimiento, ['route' => ['procedimientos.update', $procedimiento->id], 'method' => 'PUT']) }}

                @include('modules.procedimientos.inc.fields')

            {!! Form::submit('Actualizar', ['class' => 'btn blue-grey darken-2']) !!}

            {{ Form::close() }}
        </div>
    </div>

@endsection