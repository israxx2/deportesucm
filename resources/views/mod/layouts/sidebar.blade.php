<div class="sidebar" data-color="yellow">
        <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="{{ route('estudiante.inicio') }}" class="simple-text logo-mini">
                UCM
            </a>
            <a href="{{ route('estudiante.inicio') }}" class="simple-text logo-normal">
            DEPORTES
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">


                {{-- DEPORTES --}}
                <li class="@yield('deporte', ' ')">
                    <a data-toggle="collapse" href="#deportes">
                        <i class="now-ui-icons design_image"></i>
                        <p>DEPORTES
                            <b class="caret"></b>
                        </p>
                    </a>
                </li>

                <div class="collapse" id="deportes">
                    <ul class="nav">
                        @foreach($deportes_sidebar as $deporte_sidebar)
                        <li class="@yield('deporte_'.$deporte_sidebar->id , ' ')">
                        <a href="{{ route('estudiante.deportes.show', [ 'id' => $deporte_sidebar->id]) }}">
                                <span class="sidebar-mini-icon"><i class="{{ $deporte_sidebar->icon }}"></i></span>
                                <span class="sidebar-normal">{{ $deporte_sidebar->nombre }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- TORNEOS --}}
                <li class="@yield('torneos', ' ')">
                  <a href="{{ route('estudiante.torneos.index') }}">
                      <i class="now-ui-icons sport_trophy"></i>
                      <p>Torneos</p>
                  </a>
                  
                {{-- TORNEOS --}}
                <li class="@yield('torneos', ' ')">
                    <a data-toggle="collapse" href="#torneo">
                        <i class="now-ui-icons ui-1_calendar-60"></i>
                        <p>Invitaciones
                            <b class="caret"></b>
                        </p>
                    </a>
                </li>


                <div class="collapse" id="torneo">
                    <ul class="nav">
                        {{-- OPCIONES DE LOS TORNEOS --}}
                        <li class="@yield('verTorneos', '')">
                        <a href="{{ route('mod.torneos.index') }}">
                        <i class="now-ui-icons ui-1_email-85"></i>
                        <p>Ver</p>
                        </a>
                        </li>
                        {{-- OPCIONES DE LAS INVITACIONES --}}
                        <li class="@yield('crearTorneo', '')">
                        <a href="{{ route('mod.torneos.create') }}">
                        <i class="now-ui-icons location_world"></i>
                        <p>Crear</p>
                        </a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
      </div>
