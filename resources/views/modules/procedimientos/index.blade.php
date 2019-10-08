@extends('layouts.app')

@section('content')

<div class="container">
  
    <div class="row"></div>

    <div class="row">
      {{ Form::open(['method' => 'GET', 'id' => 'searchProcedimientoForm']) }}
        <div class="row">
            <div class="input-field col s12">
                {!! Form::text('searchProcedimientoInput', null, ['id' => 'searchProcedimientoInput']) !!}
                {!! Form::label('searchProcedimientoInput', 'Buscar Procedimiento') !!}
            </div>
        </div>
        <div class="row center-align">
              {!! Form::submit('Buscar', ['class' => 'btn blue-grey darken-1']) !!}
              <a href="{{ route('procedimientos.index') }}" class="btn blue-grey darken-3">Todos</a>
        </div>
        </div>
      {{ Form::close() }}
    </div>
  
    <div class="container">

    @foreach($procedimientos as $procedimiento)    
        <div class="row">
            <div class="col s12">
              <div class="card">
              <div class="card-content">
              <div class="row">
                Procedimiento: {{ $procedimiento->procedimiento }} <br>
                Especialidad: {{ $procedimiento->especialidad }} <br> 
                Precio: {{ $procedimiento->precio }} <br>
                <a href="{{ route('procedimientos.edit', $procedimiento->id) }}" class="indigo-text"><i class="material-icons">create</i></a>  
               </div>
              </div>
            </div>
          </div>
        </div>
    @endforeach

  </div>

    <div class="row center-align">
        {{ $procedimientos->links('vendor.pagination.simple-default') }}  
    </div>
</div>

@endsection