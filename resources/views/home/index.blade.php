@inject('sectors', 'Intranet\Sector')
@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-container" style="margin-bottom: 0;">
	@include('home.sections.news', ['link' => 'institutional'])
	<div class="agenda">
		<h2 class="title">Agenda</h2>
		@include('home.sections.agenda')
	</div>

	<div class="sectores clearfix">
		<div class="container">
			@if(count($started))
				<div class="col-md-3">
				<article>
					<h3>STAR ME UP</h3>
					<br>
					@if (!$started->avatar || $started->avatar == 'null' )
						<img src="/images/default.svg" alt="" class="img-responsive">
					@else
						<img  class="img-responsive" src="{{asset('/storage/'.$started->avatar)}}" alt="">
					@endif
					<div class="title">
						<p class="name">{{$started->fullname}}</p>
						<p class="departamento">{{$started->position}}</p>
					</div>
					<div class="description">
						{{$started->bio}}
					</div>
				</article>
			</div>
			@endif
			<div class="@if (count($started)) {{'col-md-9'}} @else {{'col-md-12'}} @endif">
				<div class="sectores-lista">
					<h2 class="title">Sectores</h2>
					@foreach($sectors->all() as $item)
					<div class="col-md-4 sector-item" >
						<a href="/sector/{{$item->id}}" style="height: 93px">
							<h2 style="font-size: 20px;">{{$item->name}}</h2>
							<small>Ingresar ></small>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
@endsection