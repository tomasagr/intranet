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
			<div class="col-md-3">

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
			</div>
			<div class="col-md-9">
				<div class="sectores-lista">
					<h2 class="title">Sectores</h2>
					@for($i = 0; $i < 11; $i++)
					<div class="col-md-4 sector-item">
						<a href="/sector/1">
							<h2>Ventas</h2>
							<small>Ingresar ></small>
						</a>
					</div>
					@endfor
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
@endsection