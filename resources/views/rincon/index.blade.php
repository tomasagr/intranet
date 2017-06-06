@extends('layouts.master')
@section('content')

@include('layouts.header')

<div ng-controller="VideosController">
<div class="rincon clearfix">
	<div class="main-content clearfix" style="padding-bottom: 3em; padding-top: 3em; margin-top: 0; background: white;">
		<div class="container">
			<h1 class="title-videos">Videos</h1>
			<div class="videos col-md-6" id="customscroll">
				<div class="item" ng-repeat="item in videos">
					<img ng-src="https://i.ytimg.com/vi/@{{item.link}}/hqdefault.jpg" alt="" width="56px" height="43px">
					<div class="videos-desc">
						<p><b><a ng-click="selectVideo($index)" href="" style="text-transform:uppercase">@{{item.titulo}}</a></b></p>
					</div>
				</div>
				<hr>
			</div>
			<div class="videos-preview col-md-6">
				<iframe width="100%" height="300" src="@{{link}}" frameborder="0" allowfullscreen ng-if="videoSelected"></iframe>
			</div>
		</div>
	</div>

	<div class="info">
		<div class="container" style="position: relative; padding: 4em 0; height: 727px;" ng-if="!infoSelected">
			<img class="img-responsive" src="/storage/@{{info[0].imagen}}" alt="" style="height: 632px;">
			<div class="details">

			</div>
		</div>

		<div class="container" style="position: relative; padding: 4em 0; height: 727px;" ng-if="infoSelected">
			<img class="img-responsive" src="/storage/@{{infoSelected.imagen}}" alt="" style="height: 632px;">
			<div class="details">

			</div>
		</div>

		<div class="container items">
			<div class="col-md-4 item" 
					ng-repeat="item in info" 
					style="cursor:pointer" 
					ng-mouseover="selectContent($index)">
				<img class="img-responsive" src="/storage/@{{item.imagen}}" alt="">
				<div class="description">
					<p style="color: black;text-transform:uppercase"><b>@{{item.titulo}}</b></p>
					<p>@{{item.descripcion}}</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="main-content" style="background: white; padding-top: 3em;">
	<div class="container curiosidades">
		<h1>Curiosidades</h1>
		<br><br>
	
			<div class="item" ng-repeat="curiosidad in curiosidades">
				<div class="col-md-4">
				<a href="" ng-if="!curiosidad.isOpen" ng-click="toggleCuriosidad($index)"><img src="/images/icon-active.png" alt=""></a>
				<a href="" ng-if="curiosidad.isOpen" ng-click="toggleCuriosidad($index)"><img src="/images/icon-inactive.png" alt=""></a>
				<p style="display: inline; text-transform: uppercase;"><b>@{{curiosidad.titulo}}</b></p>
				<div style="width: 100%" class="curiosidad" ng-if="curiosidad.isOpen">
					<p>@{{curiosidad.descripcion}}</p>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12" style="background: #f6f6f6;">
	<div class="main-content" style="background: transparent;">
		<h1 class="title">
			También puede interesarte
		</h1>
	</div>
	@include('partials.sugerencias', [
		'titles' => ['Vacaciones', 'Summit Solidaria'],
		'links' => ['/diary', '/solidaria']
	])
</div>

</div>


@include('layouts.footer')
@stop