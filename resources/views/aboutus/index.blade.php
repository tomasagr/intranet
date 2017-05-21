@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="aboutus clearfix">
	<div class="main-content">
		<div class="container">
			<h1 class="title">Quienes Somos</h1>
			<div class="content">
				<p>
					{{$contenido->cuerpo}}
				</p>
			</div>
		</div>
	</div>

	<div class="main-content clearfix pearsons">
		<h1 class="title" style="padding-top: 1em">Personas</h1>
		<div class="col-md-12">
			<div class="container">
				<span style="margin-bottom: 2em;"><b>FILTRAR POR:</b></span>
				<div class="col-md-12">
					<br>
					<div class="btn-group">
						<button type="button"
						class="btn btn-default dropdown-toggle btn-summit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						SECTOR <i class="fa fa-chevron-down"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</div>

				<div class="btn-group">
					<button type="button"
					class="btn btn-default dropdown-toggle btn-summit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					UNIDAD <i class="fa fa-chevron-down"></i>
				</button>
				<ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="#">Separated link</a></li>
				</ul>
			</div>
		</div>
		<hr>
		<div class="col-md-12">
			<div class="pearsons-list">
				@for($i = 0; $i < 8; $i ++)
				<div class="col-md-3 pearson text-center">
					<img width="100" class="img-responsive" src="/images/default.svg" alt="" style="display: inline-block;" >
					<p class="name">Lucas Michailian</p>
					<p class="charge">Cargo</p>
					<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis dignissimos ipsa quod, suscipit iure veritatis, perferendis aspernatur. Velit iure aliquam aspernatur, labore deleniti architecto dolorum nostrum sunt ipsum, ipsa quidem.</p>
					
				</div>
				@endfor
			</div>
		</div>

		<div class="col-md-12">
			<div class="slider">
				<img width="100%" class="img-responsive" src="{{asset('/storage/'.$contenido->image)}}" alt="">
			</div>
		</div>
	</div>
</div>
</div>

<div class="col-md-12">
	<div class="main-content" style="background: transparent;">
		<h1 class="title">
			También puede interesarte
		</h1>
	</div>
	@include('partials.sugerencias', [
		'titles' => ['Rincon Japones', 'Productos'],
		'links' => ['/rincon-japones', '/products']
	])
</div>
</div>
@include('layouts.footer')
@endsection
