@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content" style="margin-bottom: 3em;">
	<div class="title">
		PRODUCTOS
	</div>
</div>

<div class="container clearfix">
	<div class="col-md-12">
		<div class="col-md-6">
			<div class="products-items clearfix">
				<div class="item clearfix">
					<div class="image">
						<img class="img-responsive" src="/images/products.png" alt="">
					</div>
					<div class="item-content">
						<header>
							<p>
								<span class="date">26-01-2017 |</span><span class="title"> NO</span>
							</p>
						</header>
						<article>
							<p>Presencia de  Sclerotina en lotes de Soja en el Sudeste Bonarence</p>
						</article>
						<footer>
							<a href="">Ver mas</a>
							<span class="label label-success tag">Ventas</span>
							<div class="cover">
								<span class="triangle"></span>
							</div>
						</footer>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="products-items clearfix">
				<div class="item clearfix">
					<div class="image">
						<img class="img-responsive" src="/images/products.png" alt="">
					</div>
					<div class="item-content">
						<header>
							<p>
								<span class="date">26-01-2017 |</span><span class="title"> NO</span>
							</p>
						</header>
						<article>
							<p>Presencia de  Sclerotina en lotes de Soja en el Sudeste Bonarence</p>
						</article>
						<footer>
							<a href="">Ver mas</a>
							<span class="label label-success tag">Ventas</span>
							<div class="cover">
								<span class="triangle"></span>
							</div>
						</footer>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12" style="margin-top: 3em;">
		@for($i = 0; $i < 8; $i++)
		<div class="col-md-3" style="margin: 3em 0;">
			<div class="products-items clearfix">
				<div class="item clearfix">
					<div class="image">
						<img class="img-responsive" src="/images/products.png" alt="">
					</div>
					<div class="item-content">
						<header>
							<p>
								<span class="date">26-01-2017 |</span><span class="title"> NO</span>
							</p>
						</header>
						<article>
							<p>Presencia de  Sclerotina en lotes de Soja en el Sudeste Bonarence</p>
						</article>
						<footer>
							<a href="">Ver mas</a>
							<span class="label label-success tag">Ventas</span>
							<div class="cover">
								<span class="triangle"></span>
							</div>
						</footer>
					</div>
				</div>
			</div>
		</div>
		@endfor
	</div>
</div>
@include('layouts.footer')
@stop