<header>
	<div class="top-bar">
		<div class="container">
			<div class="user-bar">
				<a href="/profile">
					@if (!Auth::user()->avatar || Auth::user()->avatar == "null")
						<img class="user-top img-responsive" src="/images/default.svg" alt="" style="width: 30px; height: 30px;">
					@else
						<img class="user-top img-responsive img-circle" src="{{asset('/storage/'.Auth::user()->avatar)}}" alt="" style="width: 30px; height: 30px;">
					@endif
				</a>
				<span class="user-name"><a href="/profile" style="color: white">{{Auth::user()->fullname}}</a></span>
				<div class="dropdown">
					<button class="dropdown-toggle dropdown-btn-custom"
					type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="badge">{{count(Auth::user()->unreadNotifications)}}</span>
					<i class="fa fa-bell"></i>
				</button>
				<ul class="dropdown-menu custom-dropdown-list" aria-labelledby="dropdownMenu2">
					<li class="item-title"><b class="title">NOTIFICACIONES</b><div class="label-notification-warning">No leídas {{count(Auth::user()->unreadNotifications)}}</div></li>
					<li role="separator" class="divider"></li>
					<li class="items-list">
						<div class="title"><span class="label-notification danger">	{{getCount('responses')}}</span> Respuestas del foro</div>
						<div class="notify-items">
							@foreach(Auth::user()->unreadNotifications as $item)
								@if ($item->type == 'Intranet\Notifications\ComentarioNotificacion')
									<a href="/notification/{{$item->id}}/mark">{{substr($item->data["comentario"], 0, 20)}}...</a>
								@endif
							@endforeach
						</div>
					</li>
					<li role="separator" class="divider"></li>
					<li class="items-list">
						<div class="title"><span class="label-notification success">
						{{getCount('voting')}}
						</span> Puntajes</div>
						<div class="notify-items">
							@foreach(Auth::user()->unreadNotifications as $item)
								@if ($item->type == 'Intranet\Notifications\VotingNotify')
									<a href="/notification/{{$item->id}}/mark">{{substr($item->data["comments"], 0, 20)}}...</a>
								@endif
							@endforeach
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
	@include('partials.menu')
</div>

<div class="mobile-header">
	<div class="container">
		<a href="/home" class="logo-responsive"><img src="/images/logo.svg" class="img-responsive" alt="" width="200"></a>
		<a href="" class="hamburger"><i class="fa fa-bars"></i></a>
	</div>
</div>

</header>