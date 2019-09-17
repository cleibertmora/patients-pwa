@extends('layouts.app')

@section('content')

@if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

<div class="container">
    <div class="row">

        <h3 class="center-align">Ingresar a su cuenta</h3>

        {!! Form::open(['url' => 'login', 'method' => 'POST']) !!}
        
        <div class="row">
            <div class="input-field col s12">
                {{ Form::email('email') }}
                {{ Form::label('email', 'Email') }}
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                {{ Form::password('password') }}
                {{ Form::label('password', 'Contraseña') }}
            </div>
        </div>

        <div class="row">
            <div class="input-field col 12">
                <label>
                    <input id="indeterminate-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Recuerdame</span>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col 12">
                {{ Form::submit('Ingresar', ['class' => 'btn blue-grey lighten-1']) }}
                <a class="waves-effect blue-grey darken-4 btn" href="{{ route('password.request') }}">
                    ¿Olvidaste la contraseña?
                </a>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection
