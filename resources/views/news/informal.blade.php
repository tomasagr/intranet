@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content news-list" ng-controller="NewsController">
	<div class="container">
		<div class="header-title green">
			Noticias Informales
		</div>
		@include('news.latests', ['link' => 'informal'])
		<div class="col-md-12" style="margin-top: 3em; padding: 0 0;">
			@foreach($informal as $item)
			<div class="col-md-3" style="margin: 3em 0;">
				<div class="products-items clearfix">
					<div class="item clearfix">
						<div class="image">
							<img class="img-responsive" src="{{asset('/storage/'. $item->image)}}" alt="">
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
			@endforeach
		</div>
	</div>
</div>
@include('layouts.footer')
@stop