<div class="row">
    {!! Form::label('', 'Seleccionar Procedimiento') !!}
    {!! Form::select('procedimiento_id', $procedimientos, null, ['class' => 'browser-default']) !!}
</div>

<p>En caso de que el procedimiento que desea no este en el listado, puede <a href="{{ route('procedimientos.create', ['pat='.$paciente]) }}" class="teal-text">agregar uno nuevo.</a></p>

<div class="row">
    <div class="input-field col s12">
        {!! Form::number('pieza', null) !!}
        {!! Form::label('pieza', 'Número de Pieza') !!}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::text('zona', null) !!}
        {!! Form::label('zona', 'Zona/Superficie(s) del diente') !!}
    </div>
</div>

{!! Form::hidden('paciente_id', $paciente ? $paciente : null) !!}
