@extends('layouts.master')
@section('content')

@include('layouts.header')

<div class="main-content" style="padding-top: 1em; margin-top: 0; background: white;">
	<div class="title" style="margin: 0; padding-bottom: 1em">
		Búsqueda Laboral
	</div>
</div>

<div class="jobs-list" style="background: white">
	<div class="container">
		@include('flash::message')

		@foreach($jobs as $job)
		<section class="description">
			<div class="image">
				<div class="square green" style="text-transform: uppcase">
					{{substr($job->puesto, 0, 1)}}
				</div>
			</div>
			<div class="data">
				<p><b>{{$job->titulo}}</b></p>
				<p class="content">
					{{substr($job->cuerpo, 0, 100)}}
				</p>
			</div>
			<div class="options">
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
			<div class="download-link">
				<a href="/jobs/1">
					<img src="/images/tick.png" alt="">
				</a>
			</div>
		</section>
		<hr>
		@endforeach
	</div>
</div>

@include('layouts.footer')
@stop
