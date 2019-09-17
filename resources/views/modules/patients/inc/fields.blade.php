<div class="row">
    <div class="input-field col s12">
        {!! Form::text('nombre', null) !!}
        {!! Form::label('nombre', 'Nombre paciente') !!}
    </div>
</div>

<div class="row">
        {!! Form::label('', 'Tipo documento') !!}
        {!! Form::select('doctype', ['ced' => 'cedula', 'pass' => 'pasaporte', 'ruc' => 'ruc'], 'ced', ['class' => 'browser-default']) !!}
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::number('cedula', null) !!}
        {!! Form::label('cedula', 'Cedula paciente') !!}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::email('email', null) !!}
        {!! Form::label('email', 'Email paciente') !!}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::textarea('direccion', null, ['class' => 'materialize-textarea']) !!}
        {!! Form::label('direccion', 'Direccion paciente') !!}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::number('celular', null) !!}
        {!! Form::label('celular', 'Nro. celular') !!}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::number('telefono', null) !!}
        {!! Form::label('telefono', 'Nro. telefono') !!}
    </div>
</div>

<div class="row">
    <div class="input-field col s12">
        {!! Form::textarea('datosFamiliares', null, ['class' => 'materialize-textarea']) !!}
        {!! Form::label('datosFamiliares', 'Datos de un familiar/Dato adicional') !!}
    </div>
</div>