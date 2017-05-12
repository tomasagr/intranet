@extends('layouts.master')
@section('content')

@include('layouts.header')
<div class="row">
	<div class="container" style="padding: 2em 0;">
		<div class="col-md-3">
			@include('forum.sidebar')
		</div>
		<div class="col-md-9">
			<div class="forum-header grey">
				ULTIMOS TEMAS
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
						<tr>
							<td>
								<b><a style="color: black;" href="/topic/1">REFORMAS</a></b>
								<p>Iniciado por: Lucas Michailian</p>
							</td>
							<td>
								<button type="submit" class="btn btn-warning danger-alternative"
									style="width: 100%; padding: inherit 1em;"
									onclick="window.location='/forum/1'">NUEVAS IDEAS</button>
							</td>
							<td style="text-align:center;">
								20
							</td>
							<td style="text-align:center;">
								20
							</td>
							<td>
								Hace 31 horas
							</td>
						</tr>

						<tr>
							<td>
								<b><a style="color: black;" href="/topic/1">REFORMAS</a></b>
								<p>Iniciado por: Lucas Michailian</p>
							</td>
							<td>
								<button type="submit" class="btn btn-success danger-alternative"
									style="width: 100%; padding: inherit 1em; background: #74b956"
									onclick="window.location='/forum/1'">NUEVAS IDEAS</button>
							</td>
							<td style="text-align:center;">
								20
							</td>
							<td style="text-align:center;">
								20
							</td>
							<td>
								Hace 31 horas
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
@stop