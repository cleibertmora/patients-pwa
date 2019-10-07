<div class="row">
    {!! Form::label('', 'Seleccionar Doctor') !!}
    {!! Form::select('doctor_id', $doctors, null, ['class' => 'browser-default']) !!}
</div>

{!! Form::hidden('status', 'Sin confirmar', ['class' => 'browser-default']) !!}

{!! Form::hidden('paciente_id', $patient->id, ['class' => 'browser-default']) !!}

<div class="row">
    <div class="input-field col s12">
        {!! Form::textarea('motivoConsulta', null, ['class' => 'materialize-textarea']) !!}
        {!! Form::label('motivoConsulta', 'Escriba el motivo aquí') !!}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::text('fecha', null ,['class' => 'datepicker', 'required'] ) !!}
        {!! Form::label('fecha', 'Fecha') !!}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::text('horaIn', null ,['class' => 'timepicker', 'required']) !!}
        {!! Form::label('horaIn', 'Hora Inicio') !!}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::text('horaFin', null ,['class' => 'timepicker', 'required']) !!}
        {!! Form::label('horaFin', 'Hora Fin') !!}
    </div>
</div>

