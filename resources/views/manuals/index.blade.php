@extends('layouts.master')
@section('content')
@include('layouts.header')

<div class="manuals clearfix">
	<div class="main-content">
		<div class="title">Manuales</div>
	</div>

	<div class="container">
		<div class="search clearfix">
			<p><b>BÚSQUEDA</b></p>
			<input type="text" class="form-control" placeholder="Ingrese aquí su búsqueda">
		</div>
		<hr>
		<div class="sectors filter">
			<p><b>SECTORES</b></p>
			<div class="btn-group">
						<button type="button"
						class="btn btn-default dropdown-toggle btn-summit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						SELECCIONAR <i class="fa fa-chevron-down"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a href="#">Marketing</a></li>
						<li><a href="#">RRHH</a></li>
					</ul>
				</div>
		</div>
		<hr>

		<div class="manual-lists">
			<section class="description">
				<div class="image">
					<img src="/images/pdf.png" alt="">
				</div>
				<div class="data">
					<p><b>TITULO</b></p>
					<p class="content">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus quaerat voluptatibus libero rem molestiae eius accusantium fugit, eaque voluptate ipsa dolore officiis saepe quam architecto nulla ut. Quos, deserunt similique.
					</p>
				</div>
				<div class="options">
					<div class="col-md-12 first">
						<div class="col-md-6">
							<p class="option">First Option</p>
						</div>
						<div class="col-md-6">
							<p><b>First Specification</b></p>
						</div>
					</div>
					<div class="col-md-12 second">
						<div class="col-md-6">
							<p class="class="option">Second Option</p>
						</div>
						<div class="col-md-6">
							<p><b>Second Specification</b></p>
						</div>
					</div>
				</div>
				<div class="download-link">
					<a href="">
						<img src="/images/download.png" alt="">
					</a>
				</div>
			</section>
			<hr>
			<section class="description">
				<div class="image">
					<img src="/images/video.png" alt="">
				</div>
				<div class="data">
					<p><b>TITULO</b></p>
					<p class="content">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus quaerat voluptatibus libero rem molestiae eius accusantium fugit, eaque voluptate ipsa dolore officiis saepe quam architecto nulla ut. Quos, deserunt similique.
					</p>
				</div>
				<div class="options">
					<div class="col-md-12 first">
						<div class="col-md-6">
							<p class="option">First Option</p>
						</div>
						<div class="col-md-6">
							<p><b>First Specification</b></p>
						</div>
					</div>
					<div class="col-md-12 second">
						<div class="col-md-6">
							<p class="class="option">Second Option</p>
						</div>
						<div class="col-md-6">
							<p><b>Second Specification</b></p>
						</div>
					</div>
				</div>
				<div class="download-link">
					<a href="">
						<img src="/images/play.png" alt="">
					</a>
				</div>
			</section>
			<section class="description">
				<div class="image">
					<img src="/images/pdf.png" alt="">
				</div>
				<div class="data">
					<p><b>TITULO</b></p>
					<p class="content">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus quaerat voluptatibus libero rem molestiae eius accusantium fugit, eaque voluptate ipsa dolore officiis saepe quam architecto nulla ut. Quos, deserunt similique.
					</p>
				</div>
				<div class="options">
					<div class="col-md-12 first">
						<div class="col-md-6">
							<p class="option">First Option</p>
						</div>
						<div class="col-md-6">
							<p><b>First Specification</b></p>
						</div>
					</div>
					<div class="col-md-12 second">
						<div class="col-md-6">
							<p class="class="option">Second Option</p>
						</div>
						<div class="col-md-6">
							<p><b>Second Specification</b></p>
						</div>
					</div>
				</div>
				<div class="download-link">
					<a href="">
						<img src="/images/download.png" alt="">
					</a>
				</div>
			</section>
			<hr>
			<section class="description">
				<div class="image">
					<img src="/images/video.png" alt="">
				</div>
				<div class="data">
					<p><b>TITULO</b></p>
					<p class="content">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus quaerat voluptatibus libero rem molestiae eius accusantium fugit, eaque voluptate ipsa dolore officiis saepe quam architecto nulla ut. Quos, deserunt similique.
					</p>
				</div>
				<div class="options">
					<div class="col-md-12 first">
						<div class="col-md-6">
							<p class="option">First Option</p>
						</div>
						<div class="col-md-6">
							<p><b>First Specification</b></p>
						</div>
					</div>
					<div class="col-md-12 second">
						<div class="col-md-6">
							<p class="class="option">Second Option</p>
						</div>
						<div class="col-md-6">
							<p><b>Second Specification</b></p>
						</div>
					</div>
				</div>
				<div class="download-link">
					<a href="">
						<img src="/images/play.png" alt="">
					</a>
				</div>
			</section>
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