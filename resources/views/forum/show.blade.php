@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="row">
	<div class="container" style="padding: 2em 0;">
		<div class="col-md-3">
			@include('forum.sidebar-extra', ['foro' => $foro])
		</div>
		<div class="col-md-9">
			<div class="forum-header grey">
				ÚLTIMOS TEMAS
			</div>

			<div class="content-list">
				<table class="table" style="background: white;">
					<thead>
						<th>TEMA</th>
						<th style="text-align:center;">FORO</th>
						<th>PARTICIPANTES</th>
						<th>RESPUESTAS</th>
						<th>ÚLTIMA ACTUALIZACIÓN</th>
					</thead>
					<tbody>
							@foreach($temas as $key => $tema)
							<tr>
							<td>
								<b><a style="color: black; text-transform: uppercase;" href="/topic/{{$tema->id}}">{{$tema->nombre}}</a></b>
								<p>Iniciado por: {{$tema->autor->fullname}}</p>
							</td>
							<td>
								<button type="submit" class="btn @if($key % 2 == 0 ) {{'btn-success'}}  @else {{'btn-warning'}} @endif danger-alternative"
									style="width: 100%; padding: inherit 1em; @if($key % 2 == 0 ) {{'background: #74B956'}}  @endif"
									onclick="window.location='/forum/{{$tema->foro_id}}'">{{$tema->foro->nombre}}</button>
							</td>
							<td style="text-align:center;">
								{{$tema->comentario->count()}}
							</td>
							<td style="text-align:center;">
								{{$tema->comentario->count()}}
							</td>
							<td>
								{{$tema->updated_at->diffForHumans()}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
@stop