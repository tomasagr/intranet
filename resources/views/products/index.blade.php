@extends('layouts.master')
@section('content')
@include('layouts.header')
<div ng-controller="ProductosController">
	<div class="main-content" style="padding-bottom: 3em; background: white;">
		<div class="title" style="margin: 0">
			Información de productos
		</div>
	</div>

	<div style="background: white">
		<div class="container clearfix" style="background: white; padding: 1em 0;display: flex; justify-content: space-between;flex-wrap: wrap;">
			<button class="btn btn-default btn-summit alt" ng-class="{active: selectedTab === ''}"
			ng-click="setCategory()"><b>TODOS</b>
		</button>
		<button ng-repeat="category in categories"
		class="btn btn-default btn-summit alt"
		ng-class="{active: selectedTab === category.tag}"
		ng-click="setCategory(category)">
		<b style="text-transform: uppercase;">@{{category.name}}</b>
	</button>
</div>

<div class="container">
	<div class="row">
		<div class="logo-list" style="display: flex; justify-content: center; flex-wrap: wrap; align-items: center;">
			<a href="/products/@{{product.id}}" ng-repeat="product in products" style="margin: 1em 1em;">
				<img width="130" height="50" src="" ng-style="{'background': 'url(storage/@{{product.logo}})', 'background-size': 'cover'}">
			</a>
		</div>
	</div>
</div>
</div>
</div>
@include('layouts.footer')
@stop