@extends('layouts.master')
@section('content')

@include('layouts.header')

<div class="container jobs-detail clearfix" style="margin: 2em auto;">
	<div class="main-content clearfix" style="padding-top: 3em; margin-top: 0; background: white;">
		<div class="title" style="margin: 0; padding-bottom: 1em">
			Búsqueda Laboral
		</div>

		<div class="col-md-8 col-md-offset-2">
			<header class="clearfix">
			<div class="title-jobs clearfix">
				<h2>{{$job->titulo}}</h2>
				<div class="square green">{{substr($job->puesto,0,1)}}</div>
			</div>

			<div class="data clearfix">
				<div class="options clearfix">
					<div class="col-md-12 first">
						<div class="col-md-6">
							<p class="option">Puesto</p>
						</div>
						<div class="col-md-6">
							<p><b>{{$job->puesto}}</b></p>
						</div>
					</div>
					<div class="col-md-12 second">
						<div class="col-md-6">
							<p class="option">Ubicación</p>
						</div>
						<div class="col-md-6">
							<p><b>{{$job->ubicacion}}</b></p>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="description">
		<p>
			{{$job->cuerpo}}
		</p>
		</div>
		</div>

		<div class="col-md-12" style="padding-bottom: 2em; ">
				<div class="button-center text-center"><br>
					<button type="submit" class="btn btn-warning danger-alternative"
									style="width: 250px; padding: inherit 1em;"
									onclick="window.location='/jobs/{{$job->id}}/apply'">APLICAR</button>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')
@stop