<section class="news-preview">
		<div class="container">
			<div class="text-slider">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			</div>

			@include('news.latests', ['link' => $link])
		</div>
	</section>

	<section class="news-slider clearfix">
		<div class="container">
			<div class="col-md-6">
				<div class="col-md-12 title-top orange">
					<p class="title">NOTICIAS INSTITUCIONALES</p>
				</div>

				<div class="col-md-12 slider">
					<div class="slider-item" style="background: url('/images/slider-image.png'); background-repeat: no-repeat;
					background-size: 100%;">
					<div class="content">
						<img class="elipse" src="/images/elipse.png" alt="">
						<article>
							<p class="title">MALEZAS: UN CONGRESO PARA ENCONTRAR LA MEJOR ESTRATEGIA</p>
							<p class="content-body">
								la! Repellendus, ea iusto eveniet, autem veniam incidunt vitae illum,
							</p>
						</article>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="button-center text-center"><br>
					<button type="submit" class="btn btn-warning danger-alternative orange-alt"
									style="width: auto; padding: inherit 1em;"
									onclick="window.location='/institutional'">VER TODAS LAS NOTICIAS INSTITUCIONALES</button>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 title-top green">
				<p class="title">NOTICIAS INSTITUCIONALES</p>
			</div>

			<div class="col-md-12 slider">
				<div class="slider-item" style="background: url('/images/slider-image.png'); background-repeat: no-repeat;
				  background-size: 100%;">
				<div class="content">
					<img class="elipse" src="/images/elipse.png" alt="">
					<article>
						<p class="title">MALEZAS: UN CONGRESO PARA ENCONTRAR LA MEJOR ESTRATEGIA</p>
						<p class="content-body">
							la! Repellendus, ea iusto eveniet, autem veniam incidunt vitae illum,
						</p>
					</article>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="button-center text-center"><br>
			<button type="submit"
							class="btn btn-warning danger-alternative orange-alt"
							style="width: auto; padding: inherit 1em;"
							onclick="window.location='/informal'">VER TODAS LAS NOTICIAS INFORMALES</button>
			</div>
		</div>
	</div>
</div>
</section>