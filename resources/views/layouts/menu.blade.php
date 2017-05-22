<li class="{{ Request::is('panel/users*') ? 'active' : '' }}">
    <a href="{!! route('panel.users.index') !!}"><i class="fa fa-user"></i><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('panel/noticias*') ? 'active' : '' }}">
    <a href="{!! route('panel.noticias.index') !!}"><i class="fa fa-newspaper-o"></i><span>Noticias</span></a>
</li>

<li class="{{ Request::is('panel/contenidos*') ? 'active' : '' }}">
    <a href="{!! route('panel.contenidos.index') !!}"><i class="fa fa-file-text"></i><span>Contenidos</span></a>
</li>

<li class="{{ Request::is('panel/rSES*') ? 'active' : '' }}">
    <a href="{!! route('panel.rSES.index') !!}"><i class="fa fa-briefcase"></i><span>Búsqueda Laboral</span></a>
</li>

<li class="{{ Request::is('panel/eventos*') ? 'active' : '' }}">
    <a href="{!! route('panel.eventos.index') !!}"><i class="fa fa-calendar"></i><span>Eventos</span></a>
</li>

<li class="{{ Request::is('panel/vacaciones*') ? 'active' : '' }}">
    <a href="{!! route('panel.vacaciones.index') !!}"><i class="fa fa-sun-o"></i><span>Vacaciones</span></a>
</li>

<li class="{{ Request::is('panel/manuales*') ? 'active' : '' }}">
    <a href="{!! route('panel.manuales.index') !!}"><i class="fa fa-archive"></i><span>Manuales</span></a>
</li>

<li class="{{ Request::is('panel/videos*') ? 'active' : '' }}">
    <a href="{!! route('panel.videos.index') !!}"><i class="fa fa-play"></i><span>Videos</span></a>
</li>

<li class="{{ Request::is('panel/informacion*') ? 'active' : '' }}">
    <a href="{!! route('panel.informacions.index') !!}"><i class="fa fa-edit"></i><span>Informacions</span></a>
</li>

<li class="{{ Request::is('panel/curiosidades*') ? 'active' : '' }}">
    <a href="{!! route('panel.curiosidades.index') !!}"><i class="fa fa-smile-o"></i><span>Curiosidades</span></a>
</li>

