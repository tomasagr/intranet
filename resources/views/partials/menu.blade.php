<ul class="main-menu" ng-controller="MenuController">
	<li>
		<div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle"
						  data-toggle="dropdown"
						  aria-haspopup="true"
						  aria-expanded="false">
				INFORMACIÓN ÚTIL <i class="fa fa-chevron-down"></i>
			</button>
			<ul class="dropdown-menu">
				<li><a class="menu-item" href="/about-us">Nosotros</a></li>
				<li role="separator" class="divider"></li>
				<li><a class="menu-item" href="/manuals">Manuales</a></li>
				<li role="separator" class="divider"></li>
				<li><a class="menu-item" href="/products">Info Productos</a></li>
				<li role="separator" class="divider"></li>
				<li><a class="menu-item" href="/jobs">Búsqueda Laboral</a></li>
			</ul>
		</div>
	</li>

	<li>
		<div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle"
						  data-toggle="dropdown"
						  aria-haspopup="true"
						  aria-expanded="false">
				RSE <i class="fa fa-chevron-down"></i>
			</button>
			<ul class="dropdown-menu">
				<li><a class="menu-item" href="/solidaria">Summit Solidaria</a></li>
				<li role="separator" class="divider"></li>
				<li><a class="menu-item" href="/regional">Regional</a></li>
				<li role="separator" class="divider"></li>
				<li><a class="menu-item" href="/begreen">Be Green</a></li>
			</ul>
		</div>
	</li>

	<li>
		<div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle"
						  data-toggle="dropdown"
						  aria-haspopup="true"
						  aria-expanded="false">
				AGENDA <i class="fa fa-chevron-down"></i>
			</button>
			<ul class="dropdown-menu">
				<li><a class="menu-item" href="/diary">Reserva de Sala</a></li>
				<li role="separator" class="divider"></li>
				<li><a class="menu-item" href="/diary">Eventos</a></li>
				<li role="separator" class="divider"></li>
				<li><a class="menu-item" href="/diary">Vacaciones</a></li>
			</ul>
		</div>
	</li>

	<li><a href="/forum">FOROS</a></li>

	<li><a href="/rincon-japones">RINCÓN JAPONES</a></li>

	<li style="position:relative; border: 0">
		<a href="" ng-click="toggleBox()"><i class="fa fa-search"></i></a>
		<form ng-submit="search()">
			<input 
				ng-show="isOpen"
				type="text" class="form-control" 
				ng-model="querySend"
				placeholder="Ingrese su busqueda"
				style="position: absolute;
				transition: .3s all ease;
				width: 300px;
				left: -250px;
				box-shadow: 2px 2px 3px rgba(0,0,0, 0.3);
				top: 32px;">
				<a href="" type="submit" ng-if="isOpen" style="position: absolute;top: 42px;left: -7px;-webkit-appearance:initial; opacity: 0"><i class="fa fa-search"></i></a>
		</form>
 </li>
</ul>