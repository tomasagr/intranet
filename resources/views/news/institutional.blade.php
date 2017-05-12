@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content news-list">
	<div class="container">
		<div class="header-title orange">
			Noticias Institucionales
		</div>
		@include('news.latests', ['link' => 'institutional'])
		<div class="col-md-12" style="margin-top: 3em; padding: 0 0;">
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
									<span class="date">26-01-2017 |</span><span class="title"> NOTICIA INSTITUCIONAL</span>
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
</div>
@include('layouts.footer')
@stop