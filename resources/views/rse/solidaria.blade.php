@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content" style="padding-top: 1em; margin-top: 0; background: white;">
	<div class="title" style="margin: 0; padding-bottom: 1em">
		Summit Solidaria
	</div>
</div>

<div class="rse" style="background: white;">
	<div class="container">
		<div class="col-md-12">
			<img class="img-responsive" src="/images/header-rse.png" alt="" style="height: 320px!important;">

			<p class="date">20-01-2017</p>

			<div class="content">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur facere, a distinctio, saepe ratione consequuntur neque ipsum? Repellendus neque id ex, iste nemo sunt. At id a veniam inventore est!
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aut officia ex enim error optio est quibusdam quisquam accusamus, pariatur perspiciatis corporis amet facere possimus rerum ratione ad ut. Corrupti.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur facere, a distinctio, saepe ratione consequuntur neque ipsum? Repellendus neque id ex, iste nemo sunt. At id a veniam inventore est!
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aut officia ex enim error optio est quibusdam quisquam accusamus, pariatur perspiciatis corporis amet facere possimus rerum ratione ad ut. Corrupti.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur facere, a distinctio, saepe ratione consequuntur neque ipsum? Repellendus neque id ex, iste nemo sunt. At id a veniam inventore est!
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aut officia ex enim error optio est quibusdam quisquam accusamus, pariatur perspiciatis corporis amet facere possimus rerum ratione ad ut. Corrupti.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur facere, a distinctio, saepe ratione consequuntur neque ipsum? Repellendus neque id ex, iste nemo sunt. At id a veniam inventore est!
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aut officia ex enim error optio est quibusdam quisquam accusamus, pariatur perspiciatis corporis amet facere possimus rerum ratione ad ut. Corrupti.
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