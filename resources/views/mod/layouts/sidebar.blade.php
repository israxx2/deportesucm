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

                {{-- EQUIPOS DEL USUARIO --}}
                <li class="@yield('equipos', ' ')">
                    <a href="/mod/equipos">
                        <i class="now-ui-icons business_badge"></i>
                        <p>Equipos</p>
                    </a>
                </li>
                

                
                
                {{-- TORNEOS --}}
                <li class="@yield('torneos', ' ')">
                  <a href="/mod/torneos">
                      <i class="now-ui-icons sport_trophy"></i>
                      <p>Torneos</p>
                  </a>
            </ul>
        </div>
      </div>
