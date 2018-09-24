<?php
function current_page($url = '/'){
  return request()->path() == $url;
}
?>
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        @if (Auth::user()->avatar == null)
          <img src="/dist/img/user.jpg" class="img-circle" alt="User Image">
        @else  
          <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        @endif
        </div>
        <div class="pull-left info">
          <p>
          @if (Auth::user()->social_name == null)
            {{ Auth::user()->nombres}}
          @else
            {{ Auth::user()->social_name}}
          @endif
          </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Categorias</li>
        <!-- Optionally, you can add icorns to the links -->
         <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>Usuarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/user">Ver Usuarios</a></li>
            <li><a href="/admin/user/create">Nuevo Usuario</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-university"></i> <span>Carreras</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/carrera">Ver Carreras</a></li>
            <li><a href="/admin/carrera/create">Nueva Carrera</a></li>
          </ul>
          
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-support"></i> <span>Equipos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/equipo">Ver Equipos</a></li>
            <li><a href="/admin/equipo/create">Nuevo Equipos</a></li>
          </ul>
          <li class="treeview">
          <a href="#"><i class="fa fa-support"></i> <span>Modalidades</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/modalidad">Ver Modalidades</a></li>
            <li><a href="/admin/modalidad/create">Nueva Modalidad</a></li>
          </ul>
  
          </a>
          <li class="treeview">
          <a href="#"><i class="fa fa-support"></i> <span>Deportes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/deporte">Ver Deportes</a></li>
            <li><a href="/admin/deporte/create">Nuevo Deporte</a></li>
          </ul>
          <a href="#"><i class="fa fa-support"></i> <span>Partidos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/partido">Ver Partidos</a></li>
            <li><a href="/admin/partido/create">Nuevo Partido</a></li>
          </ul>
          <li class="treeview">
          <a href="#"><i class="fa fa-trash"></i> <span>Papelera</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Equipos</a></li>
            <li><a href="#">Usuarios</a></li>
            <li><a href="#">Carreras</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>