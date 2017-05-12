@extends('layouts.master')
@section('content')

@include('layouts.header')

<div class="main-content" style="padding-top: 1em; margin-top: 0; background: white;">
	<div class="title" style="margin: 0; padding-bottom: 1em">
		RSE
	</div>
</div>

<div class="jobs-list" style="background: white">
	<div class="container">
		<section class="description">
			<div class="image">
				<div class="square green">
					P
				</div>
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
						<p class="option">Puesto</p>
					</div>
					<div class="col-md-6">
						<p><b>First Specification</b></p>
					</div>
				</div>
				<div class="col-md-12 second">
					<div class="col-md-6">
						<p class="option">Ubicación</p>
					</div>
					<div class="col-md-6">
						<p><b>Second Specification</b></p>
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
		<section class="description">
			<div class="image">
			<div class="square orange">
					P
				</div>
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
						<p class="option">Puesto</p>
					</div>
					<div class="col-md-6">
						<p><b>First Specification</b></p>
					</div>
				</div>
				<div class="col-md-12 second">
					<div class="col-md-6">
						<p class="option">Ubicación</p>
					</div>
					<div class="col-md-6">
						<p><b>Second Specification</b></p>
					</div>
				</div>
			</div>
			<div class="download-link">
				<a href="/jobs/1">
					<img src="/images/tick.png" alt="">
				</a>
			</div>
		</section>
	</div>
</div>

@include('layouts.footer')
@stop
