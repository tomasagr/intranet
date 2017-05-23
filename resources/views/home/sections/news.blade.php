<section class="news-preview" ng-controller="NewsController">
  <div class="container">
    <div class="text-slider ticker-wrap">
      <div class="ticker">
        <div class="ticker__item" ng-repeat="item in lastNews" style="padding: 0 2em;">
					<a href="/individual/@{{item.id}}" style="color: white">@{{item.titulo}}</a>
				</div>
      </div>
    </div>
    @include('news.latests', ['link' => 'individual'])
  </div>
</section>
<section class="news-slider clearfix" ng-controller="NewsController">
  <div class="container">
    <div class="col-md-6">
      <div class="col-md-12 title-top orange">
        <p class="title">NOTICIAS INSTITUCIONALES</p>
      </div>
      <div class="my-slider clearfix">
        <ul class="col-md-12 slider clearfix" style="position: relative">
					<li class="slider-item clearfix" 
						ng-repeat="item in institucionales"
            ng-style="{'background-image': 'url(/storage/'+ item.image +')', 'background-repeat': 'no-repeat','background-size': '100%'}">
            <div class="content">
              <img class="elipse" src="/images/elipse.png" alt="">
              <article>
                <p class="title" style="text-transform: uppercase">
									<a style="color: green" href="/institutional/@{{item.id}}">@{{item.titulo}}</a>
								</p>
                <p class="content-body">@{{item.cuerpo}}</p>
              </article>
            </div>
          </li>
        </ul>
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
        <p class="title">NOTICIAS INFORMALES</p>
      </div>
      <div class="my-slider clearfix">
        <ul class="col-md-12 slider clearfix" style="position: relative">
					<li class="slider-item clearfix" 
						ng-repeat="item in informales"
            ng-style="{'background-image': 'url(/storage/'+ item.image +')', 'background-repeat': 'no-repeat','background-size': '100%'}">
            <div class="content">
              <img class="elipse" src="/images/elipse.png" alt="">
              <article>
                <p class="title" style="text-transform: uppercase">
									<a href="/informal/@{{item.id}}" style="color: green; text-decoration-none">@{{item.titulo}}</a>
								</p>
                <p class="content-body">@{{item.cuerpo}}</p>
              </article>
            </div>
          </li>
        </ul>
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