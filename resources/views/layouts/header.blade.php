<header>
	<div class="top-bar">
		<div class="container">
			<div class="user-bar">
				<a href="/profile">
					<img class="user-top img-responsive" src="/images/default.svg" alt="" style="width: 30px; height: 30px;">
				</a>
				<span class="user-name"><a href="/profile" style="color: white">Lucas</a></span>
				<div class="dropdown">
					<button class="dropdown-toggle dropdown-btn-custom"
					type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="badge">42</span>
					<i class="fa fa-bell"></i>
				</button>
				<ul class="dropdown-menu custom-dropdown-list" aria-labelledby="dropdownMenu2">
					<li class="item-title"><b class="title">NOTIFICACIONES</b><div class="label-notification-warning">No leídas 5</div></li>
					<li role="separator" class="divider"></li>
					<li class="items-list">
						<div class="title"><span class="label-notification danger">3</span> Respuestas del foro</div>
						<div class="notify-items">
							<a href="#">Another action</a>
							<a href="#">Another action</a>
							<a href="#">Another action</a>
						</div>
					</li>
					<li role="separator" class="divider"></li>
					<li class="items-list">
						<div class="title"><span class="label-notification success">3</span> Puntajes</div>
						<div class="notify-items">
							<a href="#">Another action</a>
							<a href="#">Another action</a>
							<a href="#">Another action</a>
						</div>
					</li>
				</ul>
				<a href="/logout" class="logouticon"><i class="fa fa-sign-out"></i></a>
			</div>
		</div>
	</div>
</div>

<div class="container main-header">
	<div class="logo">
		<a href="/home"><img src="/images/logo.svg" class="img-responsive" alt="" width="200"></a>
	</div>
	<ul class="main-menu">@include('partials.menu')</ul>
</div>

</header>