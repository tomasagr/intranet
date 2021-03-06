@inject('model', 'Intranet\Sector')
@extends('layouts.master')
@section('content')
@inject('sectorName', 'Intranet\Sector')
@include('layouts.header')
<div class="main-content" style="padding-top: 1em; margin-top: 0; background: white;">
	<div class="title" style="margin: 0; padding-bottom: 1em">
		{{$sectores->name}}
	</div>
	<div class="container" style="text-align: center; font-weight: 600; font-size: 16px; margin-bottom: 3em;">
		{{$sectores->descripcion}}
	</div>

	<div class="container">
		@foreach($sectores->users as $user)
			<div class="col-md-3 pearson text-center" style="height:350px;">
					@if ($user->avatar && $user->avatar != 'null')
					<img class="img-responsive img-circle"  alt="" style="display: inline-block; width: 150px; height: 150px;background:url(/storage/{{$user->avatar}});background-size:cover; background-position:center">
					@elseif ($user->avatar == 'null' || !$user->avatar)
					<img class="img-responsive img-circle" ng-src="/images/default.svg" alt="" style="display: inline-block; width: 150px; height: 140px;" >
					@endif
					<p class="name">{{$user->fullname}}</p>
					<p class="charge">{{$user->position}}</p>
					<p class="description">{{substr($user->bio, 0, 100)}}...</p>
				</div>
		@endforeach
	</div>
	<br>
	<div class="container clearfix">
		<div class="col-md-12">
			@foreach($sector as $item)
				<div class="col-md-6">
				<div class="products-items clearfix">
					<div class="item clearfix">
						<div class="image">
							<img style="height: 400px; width: 100%; background: url({{asset('/storage/'.$item->image)}}); background-size: cover"
								class="img-responsive">
						</div>
						<div class="item-content">
							<header>
								<p>
									<span class="date">{{$item->created_at->format('d-m-Y')}} |</span><span class="title" style="text-transform: uppercase"> {{$item->category->name}}</span>
								</p>
							</header>
							<article>
								<p>{{$item->titulo}}</p>
							</article>
							<footer>
								<a href="/individual/{{$item->id}}">Ver mas</a>
								<span class="label label-success tag">{{$item->sector->name}}</span>
								<div class="cover">
									<span class="triangle"></span>
								</div>
							</footer>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="col-md-12" style="margin-top: 3em;">
			<div class="col-md-6" style="padding-left: 0;">
				<div class="col-md-12  orange" style="color:white; font-size: 5px;padding:0 15px !important">
					<p class="title" style="text-align: left;">NOTICIAS INSTITUCIONALES</p>
				</div>
				<div class="row">
					@forelse($institutional as $item)
					<div class="col-md-6" style="margin: 1em 0;">
						<div class="products-items clearfix">
							<div class="item clearfix">
								<div class="image">
									<img class="img-responsive" src="" style="background:url({{asset('/storage/'.$item->image)}}); background-size:cover; width:100%; height:160px;" alt="">
								</div>
								<div class="item-content">
									<header>
										<p>
											<span class="date">{{$item->created_at->format('d-m-Y')}} |</span><span class="title" style="text-transform: uppercase"> {{$item->category->name}}</span>
										</p>
									</header>
									<article>
										<p>{{$item->titulo}}</p>
									</article>
									<footer>
										<a href="/institutional/{{$item->id}}">Ver mas</a>
										<span class="label label-success tag">{{$item->sector->name}}</span>
										<div class="cover">
											<span class="triangle"></span>
										</div>
									</footer>
								</div>
							</div>
						</div>
					</div>
					@empty
						<div class="col-md-12"><br>
								<div class="alert alert-info clearfix">No hay noticias de este sector</div>
							</div>
					@endforelse
					<div class="row">
						<div class="button-center text-center"><br>
							<button type="submit" class="btn btn-warning danger-alternative orange-alt"
							style="width: auto; padding: inherit 1em;"
							onclick="window.location='/institutional'">VER TODAS LAS NOTICIAS INSTITUCIONALES</button>
						</div>
						<br>
					</div>
				</div>
			</div>

			<div class="col-md-6" style="padding-right: 0;">
				<div class="col-md-12  green" style="color:white; font-size: 5px;padding:0 15px !important">
					<p class="title" style="text-align: left;">NOTICIAS INFORMALES</p>
				</div>
				<div class="row">
						@forelse($informal as $item)
					<div class="col-md-6" style="margin: 1em 0;">
						<div class="products-items clearfix">
							<div class="item clearfix">
								<div class="image">
									<img class="img-responsive" src="" style="background:url({{asset('/storage/'.$item->image)}}); background-size:cover; width:100%; height:160px;background-position: 0;" alt="">
								</div>
								<div class="item-content">
									<header>
										<p>
											<span class="date">{{$item->created_at->format('d-m-Y')}} |</span><span class="title" style="text-transform: uppercase"> {{$item->category->name}}</span>
										</p>
									</header>
									<article>
										<p>{{$item->titulo}}</p>
									</article>
									<footer>
										<a href="/informal/{{$item->id}}">Ver mas</a>
										<span class="label label-success tag">{{$item->sector->name}}</span>
										<div class="cover">
											<span class="triangle"></span>
										</div>
									</footer>
								</div>
							</div>
						</div>
					</div>
					@empty
						<div class="col-md-12"><br>
								<div class="alert alert-info clearfix">No hay noticias de este sector</div>
							</div>
					@endforelse
					<div class="row">
						<div class="button-center text-center"><br>
							<button type="submit" class="btn btn-warning danger-alternative orange-alt"
							style="width: auto; padding: inherit 1em;"
							onclick="window.location='/informal'">VER TODAS LAS NOTICIAS INFORMLES</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
</div>

<div class="row" style="padding: 4em 0">
	<div class="col-md-12 clearfix">
	<div class="container clearfix">
		<div class="sectores-lista clearfix">
			<h2 class="title">Sectores</h2>
			@foreach($model->all() as $sec)
			<div class="col-md-4 sector-item">
				<a href="/sector/{{$sec->id}}">
					<h2>{{$sec->name}}</h2>
					<small>Ingresar ></small>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
</div>

@include('layouts.footer')
@stop