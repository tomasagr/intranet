@can('show-user', Auth::user())
<li class="{{ Request::is('panel/users*') ? 'active' : '' }}">
  <a href="{!! route('panel.users.index') !!}"><i class="fa fa-user"></i><span>USUARIOS</span></a>
</li>
@endcan

<li class="{{ Request::is('panel/starmeup*') ? 'active' : '' }}">
  <a href="{!! route('panel.starmeup.index') !!}"><i class="fa fa-star-o"></i><span>STAR ME UP</span></a>
</li>

<li class="treeview {{ Request::is('panel/noticias*') || Request::is('panel/avisos*')  ? 'active menu-open' : '' }}">
  <a href="#"><i class="fa fa fa-newspaper-o"></i>
  <span>NOTICIAS</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('panel/avisos*') ? 'active' : '' }}">
      <a href="{!! route('panel.avisos.index') !!}"><i class="fa fa-edit"></i><span>Avisos cortos</span></a>
    </li>
    <li class="{{ Request::is('panel/noticias*') ? 'active' : '' }}">
      <a href="{!! route('panel.noticias.index') !!}"><i class="fa fa-newspaper-o"></i><span>Noticias</span></a>
    </li>
  </ul>
</li>

<li class="treeview {{ Request::is('panel/contenidos/4/edit*') || Request::is('panel/manuales*') || Request::is('panel/productos*') || Request::is('panel/rSES*') ? 'active menu-open' : '' }}">
  <a href="#"><i class="fa fa-file-text-o"></i>
  <span>INFORMACIÓN UTIL</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('panel/contenidos/4/edit') ? 'active' : '' }}">
      <a href="/panel/contenidos/4/edit"><i class="fa fa-users"></i><span>Nosotros</span></a>
    </li>
    <li class="{{ Request::is('panel/manuales*') ? 'active' : '' }}">
      <a href="{!! route('panel.manuales.index') !!}"><i class="fa fa-archive"></i><span>Manuales</span></a>
    </li>
    <li class="{{ Request::is('panel/productos*') ? 'active' : '' }}">
      <a href="{!! route('panel.productos.index') !!}"><i class="fa fa-cubes"></i><span>Info Productos</span></a>
    </li>
    <li class="{{ Request::is('panel/rSES*') ? 'active' : '' }}">
      <a href="{!! route('panel.rSES.index') !!}"><i class="fa fa-briefcase"></i><span>Búsqueda Laboral</span></a>
    </li>
  </ul>
</li>

<li class="treeview {{ Request::is('panel/contenidos/1/edit') || Request::is('panel/contenidos/2/edit') ||  Request::is('panel/contenidos/3/edit') ? 'active menu-open' : '' }}">
  <a href="#"><i class="fa fa-file-text-o"></i>
  <span>RSE</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('panel/contenidos/1/edit') ? 'active' : '' }}">
      <a href="/panel/contenidos/1/edit"><i class="fa fa-heart"></i><span>Summit Solidaria</span></a>
    </li>
    <li class="{{ Request::is('panel/contenidos/2/edit') ? 'active' : '' }}">
      <a href="/panel/contenidos/2/edit"><i class="fa fa-globe"></i><span>Nuestros Valores</span></a>
    </li>
    <li class="{{ Request::is('panel/contenidos/3/edit') ? 'active' : '' }}">
      <a href="/panel/contenidos/3/edit"><i class="fa fa-sun-o"></i><span>Be Green</span></a>
    </li>
  </ul>
</li>

<li class="treeview {{ Request::is('panel/eventos*') || Request::is('panel/vacaciones*') || Request::is('panel/salas*') || Request::is('panel/reservas*') ? 'active menu-open' : '' }}">
  <a href="#"><i class="fa fa-calendar"></i>
  <span>AGENDA</span>
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

<li class="treeview {{ Request::is('panel/videos*') || Request::is('panel/informacion*') ||  Request::is('panel/curiosidades*') ? 'active menu-open' : '' }}">
  <a href="#">ジ
  <span>RINCON JAPONES</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('panel/videos*') ? 'active' : '' }}">
      <a href="{!! route('panel.videos.index') !!}"><i class="fa fa-play"></i><span>Videos</span></a>
    </li>
    <li class="{{ Request::is('panel/informacion*') ? 'active' : '' }}">
      <a href="{!! route('panel.informacions.index') !!}"><i class="fa fa-edit"></i><span>Información</span></a>
    </li>
    <li class="{{ Request::is('panel/curiosidades*') ? 'active' : '' }}">
      <a href="{!! route('panel.curiosidades.index') !!}"><i class="fa fa-smile-o"></i><span>Curiosidades</span></a>
    </li>
  </ul>
</li>

<li class="{{ Request::is('foros*') ? 'active' : '' }}">
    <a href="{!! route('foros.index') !!}"><i class="fa fa-comment"></i><span>FOROS</span></a>
</li>

<li class="treeview">
  <a href="#"><i class="fa fa-image"></i>
  <span>GALERIAS/SLIDERS</span>
  <span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
  </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('sliders*') ? 'active' : '' }}">
      <a href="{!! route('sliders.index') !!}"><i class="fa fa-edit"></i><span>Imagenes</span></a>
    </li>
    <li class="{{ Request::is('galeria/informacion*') ? 'active' : '' }}">
      <a href="/galerias/informacion"><i class="fa fa-edit"></i><span>Galerias Información</span></a>
    </li>
  </ul>
</li>

<li class="{{ Request::is('sectores*') ? 'active' : '' }}">
    <a href="{!! route('sectores.index') !!}"><i class="fa fa-edit"></i><span>Sectores</span></a>
</li>

