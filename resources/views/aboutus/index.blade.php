@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="aboutus clearfix">
	<div class="main-content">
		<div class="container">
			<h1 class="title">Quienes Somos</h1>
			<div class="content">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit beatae eveniet, impedit voluptates facere minus dignissimos consequatur placeat, earum mollitia fugiat obcaecati, est quod ratione iste quibusdam laborum! Repellendus, deserunt.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente saepe quas sed expedita sequi qui provident voluptatibus, nihil quaerat totam maiores pariatur delectus labore atque doloremque mollitia, voluptas quis blanditiis.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam consectetur est quia accusantium sit eligendi enim dolorem soluta ab, eveniet vel cumque sapiente reiciendis, excepturi, suscipit! Fuga deserunt, officiis quam!
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium odio debitis, vitae itaque sunt necessitatibus quidem aliquid qui fugit, praesentium fugiat nam eaque porro excepturi sint dolore nesciunt, delectus asperiores?
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente saepe quas sed expedita sequi qui provident voluptatibus, nihil quaerat totam maiores pariatur delectus labore atque doloremque mollitia, voluptas quis blanditiis.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam consectetur est quia accusantium sit eligendi enim dolorem soluta ab, eveniet vel cumque sapiente reiciendis, excepturi, suscipit! Fuga deserunt, officiis quam!
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium odio debitis, vitae itaque sunt necessitatibus quidem aliquid qui fugit, praesentium fugiat nam eaque porro excepturi sint dolore nesciunt, delectus asperiores?
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
				<img src="/images/slider-quienes.png" alt="">
			</div>
		</div>
	</div>
</div>
</div>

<div class="col-md-12">
	<div class="main-content" style="background: transparent;">
		<h1 class="title">
			Tambien puede interesarte
		</h1>
	</div>
	@include('partials.sugerencias', [
		'titles' => ['Rincon Japones', 'Productos'],
		'links' => ['/', '/']
	])
</div>
</div>
@include('layouts.footer')
@endsection
