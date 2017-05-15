@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="container main-container">
	<br><br>
	<div class="col-md-10 col-md-offset-1 card">
		<div class="row">
			<br>
			<h1 class="top-title">Mi Perfil</h1>
		</div>

		<form action="/login">
			<div class="row upload-row">
				<div class="col-md-2">
					<img class="img-responsive user-image" src="/images/default.svg" alt="">
				</div>
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Subir imagen" disabled>
						<span class="input-group-btn">
							<button class="btn btn-default bg-orange" type="button"><i class="fa fa-upload"></i></button>
						</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-inline inline-flex">
						<div class="col-md-2">
							<label>Nombre Completo</label>
						</div>
						<div class="col-md-5">
							<input type="text" class="form-control inline-block-input" placeholder="Ingrese su nombre">
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="form-inline inline-flex">
						<div class="col-md-2">
							<label>E-Mail</label>
						</div>
						<div class="col-md-5">
							<input type="text" class="form-control inline-block-input" placeholder="Ingrese su E-Mail">
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="form-inline inline-flex">
						<div class="col-md-2">
							<label>Contraseña</label>
						</div>
						<div class="col-md-5">
							<input type="text" class="form-control inline-block-input" placeholder="Ingrese su contraseña">
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="form-inline inline-flex">
						<div class="col-md-2">
							<label>Puesto</label>
						</div>
						<div class="col-md-5">
							<input type="text" class="form-control inline-block-input"
							placeholder="Ingrese su puesto">
						</div>
					</div>
				</div>
			</div>
			<br>
			@include('partials.fields.types')
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="form-inline inline-flex">
						<div class="col-md-2">
							<label>Bio</label>
						</div>
						<div class="col-md-5">
							<textarea style="width: 100%!important; height: 100px;"
							name="bio" class="form-control"
							placeholder="Ingrese su bio"></textarea>
						</div>
					</div>
				</div>
			</div>
			<hr class="col-md-8 col-md-offset-2">

			<div class="col-md-8 col-md-offset-2 questions">
				<h1>Sobre mí</h1>

				<div class="questions-items">
					@for($i = 0; $i < 5; $i++)
					@include('partials.fields.questions')
					@endfor
				</div>
			</div>

			<div class="row button-center text-center"><br>
				<button type="submit" class="btn btn-warning danger-alternative orange-alt">Guardar</button>
			</div>
		</form>
		<hr>
		<div class="activity col-md-8 col-md-offset-2">
			<h1 style="color: #f3922c;">Tu actividad en el foro</h1>
			<p style="margin: 2em 0;"><b>RESPONDIERON TU MENSAJE</b></p>

			<div class="messages-list">
				<div class="item clearfix" style="margin: 3em 0;">
					<div class="col-md-8" style="padding-left: 0;">
						<p style="color:#ccc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur vero aliquam minima neque. Molestiae, consequuntur, doloremque? Rem quae quam, excepturi sequi saepe cupiditate, dignissimos voluptatem at dolore, in magnam tempora!</p>
					</div>
					<div class="col-md-4">
						<button class="btn btn-warning danger-alternative orange-alt">IR A MENSAJE</button>
					</div>
				</div>
				<div class="item clearfix" style="margin: 3em 0;">
					<div class="col-md-8" style="padding-left: 0;">
						<p style="color:#ccc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur vero aliquam minima neque. Molestiae, consequuntur, doloremque? Rem quae quam, excepturi sequi saepe cupiditate, dignissimos voluptatem at dolore, in magnam tempora!</p>
					</div>
					<div class="col-md-4">
						<button class="btn btn-warning danger-alternative orange-alt">IR A MENSAJE</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')
@stop