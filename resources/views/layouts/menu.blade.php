@can('show-user', Auth::user())
<li class="{{ Request::is('panel/users*') ? 'active' : '' }}">
  <a href="{!! route('panel.users.index') !!}"><i class="fa fa-user"></i><span>Usuarios</span></a>
</li>
@endcan
<li class="{{ Request::is('panel/starmeup*') ? 'active' : '' }}">
  <a href="{!! route('panel.starmeup.index') !!}"><i class="fa fa-star-o"></i><span>Star me up</span></a>
</li>
<li class="treeview {{ Request::is('panel/noticias*') || Request::is('panel/productos*') ||  Request::is('panel/contenidos*') ? 'active menu-open' : '' }}">
  <a href="#"><i class="fa fa-file-text-o"></i>
  <span>Contenidos del sito</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('panel/noticias*') ? 'active' : '' }}">
      <a href="{!! route('panel.noticias.index') !!}"><i class="fa fa-newspaper-o"></i><span>Noticias</span></a>
    </li>
    <li class="{{ Request::is('panel/productos*') ? 'active' : '' }}">
      <a href="{!! route('panel.productos.index') !!}"><i class="fa fa-cubes"></i><span>Productos</span></a>
    </li>
    <li class="{{ Request::is('panel/contenidos*') ? 'active' : '' }}">
      <a href="{!! route('panel.contenidos.index') !!}"><i class="fa fa-file-text"></i><span>Contenidos</span></a>
    </li>
  </ul>
<li class="{{ Request::is('panel/rSES*') ? 'active' : '' }}">
  <a href="{!! route('panel.rSES.index') !!}"><i class="fa fa-briefcase"></i><span>Búsqueda Laboral</span></a>
</li>
<li class="treeview {{ Request::is('panel/eventos*') || Request::is('panel/vacaciones*') || Request::is('panel/salas*') || Request::is('panel/reservas*') ? 'active menu-open' : '' }}">
  <a href="#"><i class="fa fa-calendar"></i>
  <span>Agenda</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>
  <ul class="treeview-menu">
    <li class="treeview {{ Request::is('panel/eventos*') || Request::is('panel/vacaciones*') || Request::is('panel/salas*') || Request::is('panel/reservas*') ? 'active menu-open' : '' }}">
      <a href="#">
        <i class="fa fa-clock-o"></i>
        <span>Reserva de salas</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
        <ul class="treeview-menu">
          <li class="{{ Request::is('panel/salas*') ? 'active' : '' }}">
             <a href="{!! route('panel.salas.index') !!}"><i class="fa fa-building"></i><span>Salas</span></a>
           </li>
          <li class="{{ Request::is('panel/reservas*') ? 'active' : '' }}">
          <a href="{!! route('panel.reservas.index') !!}"><i class="fa fa-calendar"></i><span>Reservas</span></a>
          </li>
      </ul>
    </li>
    <li class="{{ Request::is('panel/eventos*') ? 'active' : '' }}">
      <a href="{!! route('panel.eventos.index') !!}"><i class="fa fa-calendar"></i><span>Eventos</span></a>
    </li>
    <li class="{{ Request::is('panel/vacaciones*') ? 'active' : '' }}">
      <a href="{!! route('panel.vacaciones.index') !!}"><i class="fa fa-sun-o"></i><span>Vacaciones</span></a>
    </li>
  </ul>
</li>
<li class="{{ Request::is('panel/manuales*') ? 'active' : '' }}">
  <a href="{!! route('panel.manuales.index') !!}"><i class="fa fa-archive"></i><span>Manuales</span></a>
</li>
<li class="{{ Request::is('panel/videos*') ? 'active' : '' }}">
  <a href="{!! route('panel.videos.index') !!}"><i class="fa fa-play"></i><span>Videos</span></a>
</li>
<li class="{{ Request::is('panel/informacion*') ? 'active' : '' }}">
  <a href="{!! route('panel.informacions.index') !!}"><i class="fa fa-edit"></i><span>Información</span></a>
</li>
<li class="{{ Request::is('panel/curiosidades*') ? 'active' : '' }}">
  <a href="{!! route('panel.curiosidades.index') !!}"><i class="fa fa-smile-o"></i><span>Curiosidades</span></a>
</li><li class="{{ Request::is('foros*') ? 'active' : '' }}">
    <a href="{!! route('foros.index') !!}"><i class="fa fa-edit"></i><span>Foros</span></a>
</li>

