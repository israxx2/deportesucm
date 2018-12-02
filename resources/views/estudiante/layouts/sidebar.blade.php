<div class="sidebar" data-color="orange">
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
                {{-- PERFIL DEL USUARIO --}}
                <li class="@yield('perfil', ' ')">
                <a href="{{ route('estudiante.perfil') }}">
                        <i class="now-ui-icons business_badge"></i>
                        <p>Perfil</p>
                    </a>
                </li>

                {{-- EQUIPOS DEL USUARIO --}}
                <li class="@yield('equipos', ' ')">
                    <a href="{{ route('estudiante.equipos') }}">
                        <i class="now-ui-icons business_badge"></i>
                        <p>Equipos</p>
                    </a>
                </li>
                {{-- Partidos DEL USUARIO --}}
                <li class="@yield('partidos', ' ')">
                    <a href="{{ route('estudiante.partidos') }}">
                        <i class="now-ui-icons business_badge"></i>
                        <p>Mis Partidos</p>
                    </a>
                </li>

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
                  </li>
                  {{-- COMUNIDAD --}}
                  <li class="@yield('comunidad', '')">
                    <a href="{{ route('estudiante.invitaciones.publico') }}">
                    <i class="now-ui-icons location_world"></i>
                    <p>Comunidad</p></a>
                  </li>

                  {{-- BUZON --}}
                <li class="@yield('Buzon', 'invitacion ')">
                    <a href="{{ route('estudiante.invitaciones.index') }}">
                    <i class="now-ui-icons ui-1_email-85"></i>
                    <p>Buzon</p>
                    </a>

                </li>

                {{-- INFORMACION --}}
                <li class="@yield('informacion', ' ')">
                      <a href="#">
                          <i class="now-ui-icons travel_info"></i>
                          <p>Información</p>
                      </a>
                  </li>
            </ul>
        </div>
      </div>
