	<div class="lastest-news">
		<div class="selected" ng-style="{background: 'red url(/storage/'+ selected.image +') no-repeat 0 0', 'background-size': 'cover', 'background-color': 'rgba(123, 123, 123, 1)'}" style="padding:0">
			<div class="content" style="background: rgba(0,0,0,0.3);
			width: 100%;
			padding-top: 6rem;
			padding-left: 3rem;">
			<p class="date">@{{selected.created_at | inDate | date:'dd-MM-yyyy'}}</p>
			<p class="category" style="text-transform: uppercase">@{{selected.sector.name}}</p>
			<h1>
				@{{selected.titulo}}
			</h1>
		</div>
	</div>
	<div class="news-items">
		<div class="item" ng-repeat="item in lastNews">
			<a href="/{{$link}}/@{{item.id}}" ng-mouseover="changeSelected($index)">
				<header>
					<p>
						<span class="date">@{{item.created_at | inDate | date:'dd-MM-yyyy'}} |</span>
						<span style="text-transform:uppercase" class="title"> @{{item.category.name}}</span>
					</p>
				</header>
				<article>
					<p ng-bind-html="item.titulo | limitTo: 100"></p>
				</article>
				<footer>
					<span class="tag @if(Request::is('institutional*') || Request::is('informal*')){{'tag-alt-inner'}}@endif">
						<p>@{{item.sector.name}}</p>
					</span>
				</footer>
			</a>
		</div>
	</div>
</div>
