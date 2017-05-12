@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content" style="padding-top: 1em; margin-top: 0; background: white;">
	<div class="title" style="margin: 0; padding-bottom: 1em">
		RSE
	</div>
	<div class="container clearfix">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="products-items clearfix">
					<div class="item clearfix">
						<div class="image">
							<img style="height: 400px" class="img-responsive" src="/images/products.png" alt="">
						</div>
						<div class="item-content">
							<header>
								<p>
									<span class="date">26-01-2017 |</span><span class="title"> NOTICIA FORMAL</span>
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
							<img style="height: 400px" class="img-responsive" src="/images/products.png" alt="">
						</div>
						<div class="item-content">
							<header>
								<p>
									<span class="date">26-01-2017 |</span><span class="title"> NOTICIA FORMAL</span>
								</p>
							</header>
							<article>
								<p>Presencia de  Sclerotina en lotes de Soja en el Sudeste Bonarence</p>
							</article>
							<footer>
								<a href="">Ver mas</a>
								<span class="label label-success tag">RSE</span>
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
			<div class="col-md-6" style="padding-left: 0;">
				<div class="col-md-12  orange" style="color:white; font-size: 5px;padding:0 15px !important">
					<p class="title" style="text-align: left;">NOTICIAS INSTITUCIONALES</p>
				</div>
				<div class="row">
					@for($i = 0; $i < 4; $i++)
					<div class="col-md-6" style="margin: 1em 0;">
						<div class="products-items clearfix">
							<div class="item clearfix">
								<div class="image">
									<img class="img-responsive" src="/images/products.png" alt="">
								</div>
								<div class="item-content">
									<header>
										<p>
											<span class="date">26-01-2017 |</span><span class="title"> NOTICIAS INSTITUCIONALES</span>
										</p>
									</header>
									<article>
										<p>Presencia de  Sclerotina en lotes de Soja en el Sudeste Bonarence</p>
									</article>
									<footer>
										<a href="/institutional/1">Ver mas</a>
										<span class="label label-success tag">RSE</span>
										<div class="cover">
											<span class="triangle"></span>
										</div>
									</footer>
								</div>
							</div>
						</div>
					</div>
					@endfor
					<div class="row">
						<div class="button-center text-center"><br>
							<button type="submit" class="btn btn-warning danger-alternative orange-alt"
							style="width: auto; padding: inherit 1em;"
							onclick="window.location='/institutional'">VER TODAS LAS NOTICIAS INSTITUCIONALES</button>
						</div>
						<br>
					</div>
				</div>
			</div>

			<div class="col-md-6" style="padding-right: 0;">
				<div class="col-md-12  green" style="color:white; font-size: 5px;padding:0 15px !important">
					<p class="title" style="text-align: left;">NOTICIAS INFORMALES</p>
				</div>
				<div class="row">
					@for($i = 0; $i < 4; $i++)
					<div class="col-md-6" style="margin: 1em 0;">
						<div class="products-items clearfix">
							<div class="item clearfix">
								<div class="image">
									<img class="img-responsive" src="/images/products.png" alt="">
								</div>
								<div class="item-content">
									<header>
										<p>
											<span class="date">26-01-2017 |</span><span class="title"> NOTICIAS INFORMALES</span>
										</p>
									</header>
									<article>
										<p>Presencia de  Sclerotina en lotes de Soja en el Sudeste Bonarence</p>
									</article>
									<footer>
										<a href="/informal/1">Ver mas</a>
										<span class="label label-success tag">RSE</span>
										<div class="cover">
											<span class="triangle"></span>
										</div>
									</footer>
								</div>
							</div>
						</div>
					</div>
					@endfor
					<div class="row">
						<div class="button-center text-center"><br>
							<button type="submit" class="btn btn-warning danger-alternative orange-alt"
							style="width: auto; padding: inherit 1em;"
							onclick="window.location='/informal'">VER TODAS LAS NOTICIAS INFORMLES</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
</div>

<div class="row" style="padding: 4em 0">
	<div class="col-md-12 clearfix">
	<div class="container clearfix">
		<div class="sectores-lista clearfix">
			<h2 class="title">Sectores</h2>
			@for($i = 0; $i < 11; $i++)
			<div class="col-md-4 sector-item">
				<a href="/sector/1">
					<h2>Ventas</h2>
					<small>Ingresar ></small>
				</a>
			</div>
			@endfor
		</div>
	</div>
</div>
</div>

@include('layouts.footer')
@stop