@extends('layouts.master')
@section('content')

@include('layouts.header')

<div class="jobs-detail clearfix" ng-controller="MenuController">
	<div class="main-content clearfix" style="padding-top: 3em; margin-top: 0; background: white;">
		<div class="title" style="margin: 0; padding-bottom: 1em">
			Resultados de búsqueda
		</div>

		<div class="container clearfix">
			<div class="search clearfix" style="margin-bottom: 2em;">
				<form ng-submit="search()">
					<input type="text" 
							 ng-model="querySend"
						   class="form-control"  
							 style="border-radius: 20px;"
							 placeholder="Ingrese Aquí su busqueda">
				  <a href="" type="submit" style="position: absolute;top: 42px;left: -7px;-webkit-appearance:initial; opacity: 0"><i class="fa fa-search"></i></a>
				</form>
			</div>
			<hr>
			<div class="search-list">
				<div class="search-item" ng-repeat="item in news">
					<h1>@{{item.sector.name}}</h1>
					<p><b style="text-transform: uppercase">@{{item.titulo}}</b></p>
					<div class="content">
						<p style="width:83%">@{{item.cuerpo}}</p>
						<button type="button" class="btn btn-warning danger-alternative"
						style="width: 200px; padding: inherit 1em;"
						><a style="color:white; text-decoration:none" ng-href="/individual/@{{item.id}}">VER MAS</a></button>
					</div>

					<hr>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')
@stop