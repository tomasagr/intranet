@extends('layouts.master')
@inject('userModel', 'Intranet\User')
@section('content')
<?php Carbon\Carbon::setLocale('es') ?>
@include('layouts.header')
<div class="row">
	<div class="container" style="padding: 2em 0;">
		<div class="col-md-3" id="forum-sidebar-desktop">
			@include('forum.sidebar')
		</div>
		<div class="col-md-9">
			<div class="forum-header grey">
				{{$tema->nombre}}
			</div>

			<div class="messages clearfix">
				<div class="content-list" style="padding: 2em;">
					<div class="col-md-3 text-center">
						<img src="/images/default.svg" alt="" class="img-responsive">
						<h3 style="color: #444; font-size: 20px; margin-bottom: 5px; font-weight: bold;">{{$tema->autor->fullname}}</h3>
						<p>{{$tema->created_at->diffForHumans()}}</p>
					</div>
					<div class="col-md-9">
						<p style"color:#444">
							{!!$tema->cuerpo!!}
						</p>
					</div>
				</div>
				<hr style="width: 100%;">

				@if ($tema->privado)
					<div class="col-md-12">
					<p><b>Participantes: </b>
						@foreach($tema->users as $user)
							{{$user->fullname}} /
						@endforeach
					</p>
				</div>
				<hr style="width: 100%;">
				<div class="col-md-12">
					{{Form::open(['url' => "/topic/$tema->id/user", 'method' => 'POST', 'class' => 'form-inline'])}}
						{!! Form::select('user_id', $userModel->where('id', '!=', $tema->autor->id)->pluck('fullname', 'id'), null,
							['class' => 'form-control']) !!}
						<button type="submit" class="btn btn-warning" style="font-family: Lato ">Agregar como participante</button>
					{{Form::close()}}
				</div>
				<br><br>
				<hr style="width: 100%;">
				@endif

				<div class="col-md-12">
					@foreach($tema->comentario as $item)
					<p><b>{{$item->user->fullname}}</b> {{$item->created_at->diffForHumans()}}</p>
					<p>{{$item->cuerpo}}</p>
					@if (Auth::user()->rol_id == 1)
					<p><a href="/comentario/{{$item->id}}/delete" class="btn btn-xs btn-danger">Borrar</a></p>
					@endif
					<hr>
					@endforeach
				</div>

				<form action="/foro/{{$tema->foro_id}}/tema/{{$tema->id}}/comentario" style="padding: 2em;" method="POST">
					{{csrf_field()}}
					<textarea style=" height: 200px;" name="cuerpo" class="form-control" placeholder="Escribe tu respuesta aquí"></textarea>
					<br>
					<div class="pull-right">
						<button type="submit" class="btn btn-warning danger-alternative"
						style="width: 100%; padding: inherit 1em;">ENVIAR</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-3" id="forum-sidebar-mobile">
			@include('forum.sidebar')
		</div>
	</div>
</div>
@include('layouts.footer')
@stop