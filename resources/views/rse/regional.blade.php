@inject('info', 'Intranet\GaleriaInformacion')
@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content" style="padding-top: 1em; margin-top: 0; background: white;">
	<div class="title" style="margin: 0; padding-bottom: 1em">
		Regional
	</div>
</div>

<div class="rse" style="background: white;">
	<div class="container">
		<div class="col-md-12">
			<img width="100%" class="img-responsive" src="{{'/storage/'.$contenido->image}}" alt="" style="height: auto!important;">
			<p class="date">{{$contenido->updated_at->format('d-m-Y')}}</p>
			<div class="content">
				<p style="column-count: 2;"> {!! $contenido->cuerpo !!}</p>
			</div>
		</div>
	</div>
</div>

<div class="rse-images clearfix">
	<div class="container">
		<div class="col-md-3 description">
			<div class="title">{{$info->all()[1]->titulo}}</div>
			<p class="content">
				{{$info->all()[1]->texto}}
			</p>
		</div>

		<div class="col-md-9 images">
				@foreach($contenido->images as $item)
					<div class="col-md-4 image-item">
						<a href="{{asset('/storage/'.$item->imagen)}}" data-lightbox="roadtrip">
							<img class="img-responsive" src="{{asset('/storage/'.$item->imagen)}}"
								style="width:100%; height:205px;">
						</a>
					</div>
				@endforeach
		</div>
	</div>
</div>
@include('layouts.footer')
@stop