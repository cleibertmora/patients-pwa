@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"></div>
    <div class="row">
        <div class="col s12">
          <div class="card blue-grey darken-2">
            <div class="card-content white-text">
            <div class="row valign-wrapper">
                <div class="col s2">
                    <i class="medium material-icons">people</i>
                </div>
                <div class="col s8">
                    <h3>Módulo de Pacientes</h3>
                </div>
            </div>
            </div>
            <div class="card-action">
              <a href="{{ route('pacientes.index') }}">Ver Pacientes</a>
            </div>
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col s12">
        <div class="card blue-grey darken-3">
          <div class="card-content white-text">
          <div class="row valign-wrapper">
              <div class="col s2">
                  <i class="medium material-icons">layers</i>
              </div>
              <div class="col s8">
                  <h3>Módulo de Consultas</h3>
              </div>
          </div>
          </div>
          <div class="card-action">
            <a href="{{ route('listado', 'fecha='. now()->format('Y-m-d')) }}">Ver Consultas</a>
          </div>
        </div>
      </div>
    </div>
    </div>

      <div>
          <p class="center-align"><a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Salir de la aplicación</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form></p>
      </div>
</div>
@endsection
