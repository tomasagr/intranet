<section class="news-preview" ng-controller="NewsController">
		<div class="container">
			<div class="text-slider ticker-wrap">
				<div class="ticker"><div class="ticker__item" ng-repeat="item in lastNews" style="padding: 0 2em;">@{{item.titulo}}</div></div>
			</div>

			@include('news.latests', ['link' => $link])
		</div>
	</section>

	<section class="news-slider clearfix" ng-controller="NewsController">
		<div class="container">
			<div class="col-md-6">
				<div class="col-md-12 title-top orange">
					<p class="title">NOTICIAS INSTITUCIONALES</p>
				</div>

				<div class="col-md-12 slider">
					<div class="slider-item" 
					     ng-style="{'background-image': 'url(/storage/'+ institucionales.image +')', 'background-repeat': 'no-repeat','background-size': '100%'}"
				 >
					<div class="content">
						<img class="elipse" src="/images/elipse.png" alt="">
						<article>
							<p class="title">@{{institucionales.titulo}}</p>
							<p class="content-body">
								@{{institucionales.cuerpo}}
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
				<div class="slider-item" ng-style="{'background-image': 'url(/storage/'+ informales.image +')', 'background-repeat': 'no-repeat','background-size': '100%'}">
				<div class="content">
					<img class="elipse" src="/images/elipse.png" alt="">
					<article>
						<p class="title">@{{informales.titulo}}</p>
						<p class="content-body">
							@{{informales.cuerpo}}
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