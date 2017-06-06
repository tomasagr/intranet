@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content" style="margin-bottom: 3em;">
	<div class="title">
		Información de productos
	</div>
</div>

<div class="container clearfix">
	<div class="col-md-12">
		@foreach($productos->slice(0, 2) as $item)
		<div class="col-md-6">
			<div class="products-items clearfix">
				<div class="item clearfix">
					<div class="image">
						<img class="img-responsive" src="" style="background:url({{asset('/storage/'. $item->image)}}); background-size:cover; background-position: 0; width: 100%; height: 300px;" alt="">
					</div>
					<div class="item-content">
						<header>
							<p>
								<span class="date">{{$item->created_at->format('d-m-Y')}} |</span><span style="text-transform:uppercase"> {{$item->category->name}}</span>
							</p>
						</header>
						<article>
							<p>{{$item->titulo}}</p>
						</article>
						<footer>
							<a href="/products/{{$item->id}}">Ver más</a>
							<span class="label label-success tag">Ventas</span>
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
		@foreach($productos->slice(2) as $item)
		<div class="col-md-3" style="margin: 3em 0;">
			<div class="products-items clearfix">
				<div class="item clearfix">
					<div class="image">
						<img class="img-responsive" src="{{asset('/storage/'. $item->image)}}" alt="">
					</div>
					<div class="item-content">
						<header>
							<p>
								<span class="date">{{$item->created_at->format('d-m-Y')}} |</span><span style="text-transform:uppercase"> {{$item->category->name}}</span>
							</p>
						</header>
						<article>
							<p>{{$item->titulo}}</p>
						</article>
						<footer>
							<a href="/products/{{$item->id}}">Ver más</a>
							<span class="label label-success tag">Ventas</span>
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
</div>
@include('layouts.footer')
@stop