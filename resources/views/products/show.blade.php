@extends('layouts.master')
@section('content')
@include('layouts.header')
<div style="background: white;">
	<div class="container">
		<br>
		<div class="row">
			<img width="132" src="{{asset('storage/'.$producto->logo)}}" alt="">
			<hr style="margin: 2.6em 0;">
		</div>

		<div class="row">
			<div class="col-md-6">
				<h3 style="color: #F3922C; font-weight: 600">Aplicaciones: {{$producto->aplicaciones_titulo}}</h3>
				<p style="color: rgba(60,60,60)!important;">{!! $producto->aplicaciones_descripcion !!}</p>
			</div>
			<div class="col-md-6">
				<h3 style="color: #F3922C; font-weight: 600">Grandes Ventajas</h3>
				<p style="color: rgba(60,60,60) !important;">{!! $producto->ventajas !!}</p>
			</div>
		</div>
		<hr>
		<div class="row" style="margin: 3em 0 5em 0">
			<div class="col-md-6">
				@foreach($producto->archivos as $archivos)
					<a href="" style="text-decoration: none; color: black;">
						<p style="font-size: 16px;">
							<img src="/images/document.png" alt="" style="margin-right: .5em">
							<a href="{{asset('storage/'.$archivos->archivo)}}" style="color: black">{{$archivos->titulo}}</a>
						</p>
					</a>
				@endforeach
			</div>

			<div class="col-md-6 products">
				<div class="my-slider">
					<ul class="slider">
						@foreach($producto->imagenes as $imagenes)
							<li class="slider-item">
								<img height="300px!important" class="img-responsive" src="{{asset('storage/'.$imagenes->imagen)}}" alt="">
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
@stop