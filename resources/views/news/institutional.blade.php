@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content news-list" ng-controller="NewsController">
	<div class="container">
		<div class="header-title orange">
			Noticias Institucionales
		</div>
		@include('news.latests', ['link' => 'institutional'])
		<div class="col-md-12" style="margin-top: 3em; padding: 0 0;">
			@foreach($institutional as $item)
			<div class="col-md-3" style="margin: 3em 0; height: 320px;">
				<div class="products-items clearfix">
					<div class="item clearfix">
						<div class="image">
							<img class="img-responsive" src=""
									 alt=""
									 style="background:url({{asset('/storage/'. $item->image)}}); background-size:cover;width: 100%;
    height: 190px;">
						</div>
						<div class="item-content">
							<header>
								<p>
									<span class="date">{{$item->created_at->format('d-m-Y')}} |</span>
									<span class="title" style="text-transform:uppercase"> {{$item->category->name}}</span>
								</p>
							</header>
							<article>
								<p>{{$item->titulo}}</p>
							</article>
							<footer>
								<a href="/institutional/{{$item->id}}">Ver más</a>
								<span class="label label-success tag tag-alt-inner">{{$item->sector->name}}</span>
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
</div>
@include('layouts.footer')
@stop