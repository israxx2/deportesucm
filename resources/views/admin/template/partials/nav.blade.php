<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/admin"><i class="far fa-futbol"></i> TACA-TACA UCM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	<!-- OPCIONES DE LOS PARTIDOS -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/partido') }}">Partidos</a>
      </li>
      <!-- OPCIONES DE LOS JUGADORES -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Jugadores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/user">Ver jugadores</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/user/create">Nuevo jugador</a>
        </div>
      </li>
      <!-- OPCIONES DE LOS EQUIPOS -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Equipos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/equipo">Ver equipos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/equipo/create">Nuevo equipo</a>
        </div>
      </li>
      <!-- OPCIONES DE LAS CARRERAS -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Carreras
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/carrera">Ver carreras</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/carrera/create">Nueva carrera</a>
        </div>
      </li>
      <!-- OPCIONES DE LOS EVENTOS -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Eventos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/evento">Ver eventos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/evento/create">Nuevo evento</a>
        </div>
      </li>
      <!-- OPCIONES DE LAS MODALIDADES -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Modalidades
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/modalidad">Ver modalidades</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/modalidad/create">Nueva modalidad</a>
        </div>
      </li>

      <!-- LOGOUT -->
      <li class="nav-item">
          <a class="nav-link" href="{{ url('/logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Salir
          </a>

          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </li>
     </ul>
    </ul>
  </div>
</nav>