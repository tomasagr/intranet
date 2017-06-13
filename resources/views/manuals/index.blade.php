@extends('layouts.master')
@section('content')
@include('layouts.header')

<div class="manuals clearfix" ng-controller="ManualController">
	<div class="main-content">
		<div class="title">Manuales</div>
	</div>

	<div class="container">
		<div class="search clearfix">
			<p><b>BÚSQUEDA</b></p>
			<input type="text" ng-model="search.titulo" class="form-control" placeholder="Ingrese aquí su búsqueda">
		</div>
		<hr>
		<div class="sectors filter">
			<p><b>SECTORES</b></p>
			<div class="btn-group">
						<button type="button"
						class="btn btn-default dropdown-toggle btn-summit" 
						data-toggle="dropdown" 
						aria-haspopup="true" aria-expanded="false">
						@{{selectedFilter || 'SELECCIONAR'}} <i class="fa fa-chevron-down"></i>
					</button>
					<ul class="dropdown-menu">
					<li><a href="" ng-click="filterSector()">Todos</a></li>
						<li><a href="" ng-repeat="sector in sectors" ng-click="filterSector(sector.id)">@{{sector.name}}</a></li>
					</ul>
				</div>
		</div>
		<hr>

		<div class="manual-lists">
			<div class="manual-item" ng-repeat="item in manual | filter: search">
			<section class="description" ng-if="item.type == 'PDF'">
				<div class="image">
					<img src="/images/file.svg" alt="" width="50">
				</div>
				<div class="data">
					<p><b>@{{item.titulo}}</b></p>
					<p class="content">
						@{{item.cuerpo}}
					</p>
				</div>
				<div class="options" style="opacity:0">
					<div class="col-md-12 first">
						<div class="col-md-6">
							<p class="option">Primera Opción</p>
						</div>
						<div class="col-md-6">
							<p><b>@{{item.opcion1}}</b></p>
						</div>
					</div>
					<div class="col-md-12 second">
						<div class="col-md-6">
							<p class="option">Segunda Opción</p>
						</div>
						<div class="col-md-6">
							<p><b>@{{item.opcion2}}</b></p>
						</div>
					</div>
				</div>
				<div class="download-link">
					<a href="/storage/@{{item.file}}" target="_blank">
						<img src="/images/download.png" alt="">
					</a>
				</div>
			</section>
	
			<section class="description" ng-if="item.type == 'Video'">
				<div class="image">
					<img src="/images/video.png" alt="">
				</div>
				<div class="data">
					<p><b>@{{item.titulo}}</b></p>
					<p class="content">
						@{{item.cuerpo}}
					</p>
				</div>
				<div class="options" style="opacity:0">
					<div class="col-md-12 first">
						<div class="col-md-6">
							<p class="option">Primera Opción</p>
						</div>
						<div class="col-md-6">
							<p><b>@{{item.opcion1}}</b></p>
						</div>
					</div>
					<div class="col-md-12 second">
						<div class="col-md-6">
							<p class="option">Segunda Opción</p>
						</div>
						<div class="col-md-6">
							<p><b>@{{item.opcion2}}</b></p>
						</div>
					</div>
				</div>
				<div class="download-link">
					<a href="#" ng-click="modalData(item.link)" 
						data-toggle="modal" data-target="#myModal" data-backdrop="static">
						<img src="/images/play.png" alt="">
					</a>
				</div>
			</section>

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-body">
							<iframe width="100%" height="300" src="@{{linkData}}" frameborder="0" allowfullscreen></iframe>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" ng-click="closeModal()">Cerrar</button>
						</div>
					</div>

				</div>
			</div>
			</div>
			<hr>
		</div>
	</div>

	<div class="col-md-12" style="background: #f6f6f6;">
	<div class="main-content" style="background: transparent;">
		<h1 class="title">
			También puede interesarte
		</h1>
	</div>
	@include('partials.sugerencias', [
		'titles' => ['Busqueda Laboral', 'Reserva de sala'],
		'links' => ['/jobs', '/diary']
	])
</div>
</div>
@include('layouts.footer')
@stop