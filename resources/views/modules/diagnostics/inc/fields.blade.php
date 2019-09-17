<div class="row">
    {!! Form::label('', 'Seleccionar Procedimiento') !!}
    {!! Form::select('procedimiento_id', $procedimientos, null, ['class' => 'browser-default']) !!}
</div>

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
