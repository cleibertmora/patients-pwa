<div class="row">
        {!! Form::label('', 'Seleccionar Doctor') !!}
        {!! Form::select('doctor_id', $doctors, null, ['class' => 'browser-default']) !!}
    </div>
    
    {!! Form::hidden('status', 'Finalizada', ['class' => 'browser-default']) !!}
    
    {!! Form::hidden('paciente_id', $patient->id, ['class' => 'browser-default']) !!}
    
    <div class="row">
        <div class="input-field col s12">
            {!! Form::textarea('motivoConsulta', null, ['class' => 'materialize-textarea']) !!}
            {!! Form::label('motivoConsulta', 'Escriba el motivo de consulta aquí') !!}
        </div>
    </div>
    
    <div class="row">
        <div class="input-field col s12">
            {!! Form::textarea('evolucion', null, ['class' => 'materialize-textarea', 'required']) !!}
            {!! Form::label('evolucion', 'Escriba su evolución aquí') !!}
        </div>
    </div>