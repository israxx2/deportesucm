<div class="sidebar" data-color="orange">
        <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="{{ route('estudiante.inicio') }}" class="simple-text logo-mini">
                UCM
            </a>
            <a href="{{ route('estudiante.inicio') }}" class="simple-text logo-normal">
                Taca-taca
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
                <li class="@yield('equipo', ' ')">
                  <a href="#">
                          <i class="now-ui-icons users_single-02"></i>
                          <p>Equipo</p>
                      </a>
                  </li>
                {{-- HISTORIAL--}}
                <li class="@yield('historial', ' ')">
                  <a href="#">
                      <i class="now-ui-icons education_paper"></i>
                      <p>Historial</p>
                  </a>
                </li>
                {{-- OPCIONES DE LOS RANKING --}}
                <li class="@yield('ranking', ' ')">
                  <a href="#">
                      <i class="now-ui-icons design_bullet-list-67"></i>
                      <p>Ranking</p>
                  </a>
                </li>
                {{-- OPCIONES DE LOS EVENTOS --}}
                <li class="@yield('eventos', ' ')">
                    <a href="#">
                        <i class="now-ui-icons ui-1_calendar-60"></i>
                        <p>Eventos</p>
                    </a>
                </li>
                {{-- COMUNIDAD --}}
                  <li class="@yield('comunidad', ' ')">
                      <a href="#">
                          <i class="now-ui-icons emoticons_satisfied"></i>
                          <p>Comunidad</p>
                      </a>
                  </li>

                {{-- OPCIONES DE LAS INVITACIONES --}}
                <li class="@yield('duelos', ' ')">
                  <a href="#">
                      <i class="now-ui-icons ui-1_email-85"></i>
                      <p>Duelos</p>
                  </a>
                </li>
                {{-- INFORMACION --}}
                <li class="@yield('informacion', ' ')">
                      <a href="#">
                          <i class="now-ui-icons travel_info"></i>
                          <p>Información</p>
                      </a>
                  </li>
                  <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="now-ui-icons design_image"></i>
                            <p>Example 2
                               <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="../examples/pages/pricing.html">
                                        <span class="sidebar-mini-icon">C1</span>
                                        <span class="sidebar-normal">Collapse 1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../examples/pages/timeline.html">
                                        <span class="sidebar-mini-icon">C2</span>
                                        <span class="sidebar-normal">Collapse 2</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


            </ul>
        </div>
      </div>
