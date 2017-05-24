@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content" style="padding-top: 1em; margin-top: 0; background: white;">
	<div class="title" style="margin: 0; padding-bottom: 1em">
		BeGreen
	</div>
</div>

<div class="rse" style="background: white;">
	<div class="container">
		<div class="col-md-12">
			<img width="100%" class="img-responsive" src="{{'/storage/'.$contenido->image}}" alt="" style="height: auto!important;">

			<p class="date">{{$contenido->updated_at->format('d-m-Y')}}</p>

			<div class="content">
				<p style="column-count: 2;">
					{{$contenido->cuerpo}}
				</p>
			</div>
		</div>
	</div>
</div>

<div class="rse-images clearfix">
	<div class="container">
		<div class="col-md-3 description">
			<div class="title">Lorem ipsum dolor sit amet, consectetur</div>
			<p class="content">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis magni eveniet molestiae sapiente ipsum ea, impedit quae aliquam nesciunt omnis nam soluta illum quam alias numquam consectetur at voluptatibus accusantium.
			</p>
		</div>

		<div class="col-md-9 images">
			@for($i = 0; $i < 6; $i++)
				<div class="col-md-4 image-item">
					<img src="/images/item-rse.png" alt="">
				</div>
			@endfor
		</div>
	</div>
</div>
@include('layouts.footer')
@stop