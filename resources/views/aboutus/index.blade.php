@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="aboutus clearfix">
	<div class="main-content">
		<div class="container">
			<h1 class="title">Quienes Somos</h1>
			<div class="content">
				<p>
					{{$contenido->cuerpo}}
				</p>
			</div>
		</div>
	</div>

	<div class="main-content clearfix pearsons" ng-controller="PersonsController">
		<h1 class="title" style="padding-top: 1em">Personas</h1>
		<div class="col-md-12">
			<div class="container">
				<span style="margin-bottom: 2em;"><b>FILTRAR POR:</b></span>
				<div class="col-md-12">
					<br>
					<div class="btn-group">
						<button type="button"
						class="btn btn-default dropdown-toggle btn-summit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						UNIDAD <i class="fa fa-chevron-down"></i>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="" ng-click="clearFilter()">Todos</a>
						</li>
						<li ng-repeat="unit in units">
							<a href="" ng-click="changeUnit($index)">@{{unit.name}}</a>
						</li>
					</ul>
				</div>

				<div class="btn-group">
					<button type="button"
					class="btn btn-default dropdown-toggle btn-summit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					SECTOR <i class="fa fa-chevron-down"></i>
				</button>
				<ul class="dropdown-menu">
					<li ng-if="!sectors.length"><a href="">Seleccionar unidad</a></li>
					<li ng-if="sectors.length" ng-click="search.sector_id = ''"><a href="">Todos</a></li>
					<li ng-repeat="sector in sectors" ng-click="changeSector($index)"><a href="">@{{sector.name}}</a></li>
				</ul>
			</div>
		</div>
		<hr>
		<div class="col-md-12">
			<div class="pearsons-list">
				<div ng-cloak ng-show="!filteredUser.length" class="alert alert-info">No hay personas para el filtro aplicado.</div>
				<div class="col-md-3 pearson text-center" ng-repeat="user in filteredUser = (users | filter:search)" style="height:350px;">
					<img  ng-if="user.avatar && user.avatar != 'null'"  class="img-responsive img-circle" ng-src="/storage/@{{user.avatar}}" alt="" style="display: inline-block; width: 150px; height: 140px;" >
					<img  ng-if="user.avatar == 'null' || !user.avatar"  class="img-responsive img-circle" ng-src="/images/default.svg" alt="" style="display: inline-block; width: 150px; height: 140px;" >
					<p class="name">@{{user.fullname}}</p>
					<p class="charge">@{{user.position}}</p>
					<p class="description">@{{user.bio | limitTo:161}}</p>
					<a ng-if="user.id != {{Auth::user()->id}}" href="/profile/@{{user.id}}" style="color:orange">Ver más</a>
					<a ng-if="user.id == {{Auth::user()->id}}" href="/profile" style="color:orange">Ver más</a>
				</div>
			</div>
		</div>

		

		<div class="col-md-12">
			<div class="slider">
				<img width="100%" class="img-responsive" src="{{asset('/storage/'.$contenido->image)}}" alt="">
			</div>
		</div>
	</div>
</div>
</div>

<div class="col-md-12">
	<div class="main-content" style="background: transparent;">
		<h1 class="title">
			También puede interesarte
		</h1>
	</div>
	@include('partials.sugerencias', [
		'titles' => ['Rincon Japones', 'Productos'],
		'links' => ['/rincon-japones', '/products']
	])
</div>
</div>
@include('layouts.footer')
@endsection
