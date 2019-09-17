<nav class="blue-grey darken-2">
    <div class="container">
        <div class="nav-wrapper">
            <a href="{{ route('home') }}" class="brand-logo left">Patients</a>
            <ul id="nav-mobile" class="right">
                @auth        
                    <li><a href="{{ route('pacientes.index', '#searchPacienteInput') }}"><i class="material-icons">search</i>
                    </a></li>
                    <li><a href="{{ route('pacientes.index') }}"><i class="material-icons">people</i>
                    </a></li>
                    <li><a href="{{ route('home') }}"><i class="material-icons">dashboard</i>
                    </a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
@auth
    <a href="{{ route('pacientes.create') }}" id="newPatient" class="btn-floating btn-large waves-effect waves-light blue-grey darken-2"><i class="material-icons">person_add</i></a>
@endauth