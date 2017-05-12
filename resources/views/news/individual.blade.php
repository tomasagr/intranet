@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="main-content" style="padding-top: 1em; margin-top: 0; background: white;">
	<div class="title" style="margin: 0; padding-bottom: 1em">
		Alerta Rojo: un biotipo de nabo (Brassica rapa)
	</div>

	<div class="rse" style="background: white;">
		<div class="container">
			<div class="col-md-12">
				<img class="img-responsive" src="/images/individual.png" alt="" style="height: 320px!important;">

				<p class="date" style="margin-bottom: 5px">20-01-2017 | <b style="color: black;">NOTICIAS INSTITUCIONALES</b></p>

				<span class="label label-success tag">RSE</span>
				<div class="cover">
					<span class="triangle"></span>
				</div>
				<br>
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

	<div class="related-news green">
		<div class="container">
			<h2>Otras noticias relacionadas</h2>

			<div class="col-md-12" style="margin-top: 1em; padding: 0 0;">
				@for($i = 0; $i < 4; $i++)
				<div class="col-md-3" style="margin: 3em 0;">
					<div class="products-items clearfix">
						<div class="item clearfix">
							<div class="image">
								<img class="img-responsive" src="/images/products.png" alt="">
							</div>
							<div class="item-content">
								<header>
									<p>
										<span style="color: white" class="date">26-01-2017 |</span><span class="title"> NOTICIA INSTITUCIONAL</span>
									</p>
								</header>
								<article>
									<p style="color: white">Presencia de  Sclerotina en lotes de Soja en el Sudeste Bonarence</p>
								</article>
								<footer>
									<a href="/institutional" style="color: black;">Ver mas</a>
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
</div>
@include('layouts.footer')
@stop