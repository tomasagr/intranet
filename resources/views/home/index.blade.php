@inject('sectors', 'Intranet\Sector')
@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-container" style="margin-bottom: 0;">
	@include('home.sections.news', ['link' => 'institutional'])
	<div class="agenda">
		<h2 class="title">Agenda</h2>
		@include('home.sections.agenda')
	</div>

	<div class="sectores clearfix">
		<div class="container">
			<!-- <div class="col-md-3">
				<article>
					<h3>STAR ME UP</h3>
					<img  class="img-responsive" src="/images/empleado.png" alt="">
					<div class="title">
						<p class="name">MARCELO SANCHEZ</p>
						<p class="departamento">Departamento QA</p>
					</div>
					<div class="description">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque minus, eius voluptas. Repellat tempore, voluptatem atque, recusandae mollitia consectetur molestias sunt repudiandae placeat temporibus eveniet consequuntur corporis rerum doloribus quidem.
					</div>
				</article>
			</div> -->
			<div class="col-md-12">
				<div class="sectores-lista">
					<h2 class="title">Sectores</h2>
					@foreach($sectors->all() as $item)
					<div class="col-md-4 sector-item">
						<a href="/sector/{{$item->id}}">
							<h2>{{$item->name}}</h2>
							<small>Ingresar ></small>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
@endsection