@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content" style="padding-top: 1em; margin-top: 0; background: white;">
	<div class="title" style="margin: 0; padding-bottom: 1em">
		{{$noticia->titulo}}
	</div>

	<div class="rse" style="background: white;">
		<div class="container">
			<div class="col-md-12">
				<img class="img-responsive" src="{{asset('/storage/'. $noticia->image)}}" alt="" style="height: 320px!important; width: 100%">

				<p class="date" style="margin-bottom: 5px">{{$noticia->created_at->format('d-m-Y')}} | <b style="color: black;text-transform:uppercase;">{{$noticia->category->name}}</b></p>

				<span class="label label-success tag">{{$noticia->sector->name}}</span>
				<div class="cover">
					<span class="triangle"></span>
				</div>
				<br>
				<div class="content">
					<p>
						{!! $noticia->cuerpo !!}
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="related-news green">
		<div class="container">
			<h2>Otras noticias relacionadas</h2>

			<div class="col-md-12" style="margin-top: 1em; padding: 0 0;">
				@foreach($ultimas as $item)
				<div class="col-md-3" style="margin: 3em 0;">
					<div class="products-items clearfix">
						<div class="item clearfix">
							<div class="image">
								<img class="img-responsive" src="{{asset('/storage/'. $item->image)}}" alt="">
							</div>
							<div class="item-content">
								<header>
							<p>
										<span style="color: white" class="date">{{$item->created_at->format('d-m-Y')}} |</span><span class="title" style="text-transform: uppercase"> {{$item->category->name}}</span>
									</p>
								</header>
								<article>
									<p style="color: white">{{$item->titulo}}</p>
								</article>
								<footer display="display: flex">
									@if ($item->category_id == 3)
									 <a href="/products/{{$item->id}}" style="color: black;">Ver mas</a>
									@else
										<a href="/individual/{{$item->id}}" style="color: black;">Ver mas</a>
									@endif
									<div class="tag-orange">
										<p>{{$item->sector->name}}</p>
									</div>
								</footer>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
@stop