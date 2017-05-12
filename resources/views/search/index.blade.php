@extends('layouts.master')
@section('content')

@include('layouts.header')

<div class="jobs-detail clearfix">
	<div class="main-content clearfix" style="padding-top: 3em; margin-top: 0; background: white;">
		<div class="title" style="margin: 0; padding-bottom: 1em">
			Resultados de búsqueda
		</div>

		<div class="container clearfix">
			<div class="search clearfix" style="margin-bottom: 2em;">
				<input type="text" class="form-control"  style="border-radius: 20px;"
				placeholder="Ingrese Aquí su busqueda">
			</div>
			<hr>
			<div class="search-list">
				<div class="search-item">
					<h1>Rse</h1>
					<p><b>TITULO</b></p>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestiae quas architecto nulla commodi! At illo delectus perferendis aliquid voluptas vitae expedita, magni quos dolorem autem exercitationem, asperiores enim voluptatem.</p>
						<button type="submit" class="btn btn-warning danger-alternative"
						style="width: 200px; padding: inherit 1em;"
						onclick="window.location='/'">VER MAS</button>
					</div>

					<hr>
				</div>

				<div class="search-item">
					<h1>Rse</h1>
					<p><b>TITULO</b></p>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestiae quas architecto nulla commodi! At illo delectus perferendis aliquid voluptas vitae expedita, magni quos dolorem autem exercitationem, asperiores enim voluptatem.</p>
						<button type="submit" class="btn btn-warning danger-alternative"
						style="width: 200px; padding: inherit 1em;"
						onclick="window.location='/'">VER MAS</button>
					</div>

					<hr>
				</div>

				<div class="search-item">
					<h1>Rse</h1>
					<p><b>TITULO</b></p>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestiae quas architecto nulla commodi! At illo delectus perferendis aliquid voluptas vitae expedita, magni quos dolorem autem exercitationem, asperiores enim voluptatem.</p>
						<button type="submit" class="btn btn-warning danger-alternative"
						style="width: 200px; padding: inherit 1em;"
						onclick="window.location='/'">VER MAS</button>
					</div>

					<hr>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')
@stop