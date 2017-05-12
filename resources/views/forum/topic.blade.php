@extends('layouts.master')
@section('content')

@include('layouts.header')
<div class="row">
	<div class="container" style="padding: 2em 0;">
		<div class="col-md-3">
			@include('forum.sidebar-extra')
		</div>
		<div class="col-md-9">
			<div class="forum-header grey">
				ULTIMOS TEMAS
			</div>

			<div class="messages clearfix">
				<div class="content-list" style="padding: 2em;">
				<div class="col-md-3 text-center">
					<img src="/images/default.svg" alt="" class="img-responsive">
					<h3 style="color: #444; font-size: 20px; margin-bottom: 5px; font-weight: bold;">Lucas Michailian</h3>
					<p>Hace 3 horas</p>
				</div>

				<div class="col-md-9">
					<p style"color:#444">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat tempora velit debitis eum, impedit recusandae, corporis temporibus esse modi minus similique sequi delectus voluptatem beatae magni. Tempore suscipit saepe maxime. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ipsum odio, possimus accusamus cumque ullam repudiandae aut perferendis, optio iste perspiciatis sequi, repellendus debitis quasi. Commodi tempora quidem aliquid mollitia.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat tempora velit debitis eum, impedit recusandae, corporis temporibus esse modi minus similique sequi delectus voluptatem beatae magni. Tempore suscipit saepe maxime. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ipsum odio, possimus accusamus cumque ullam repudiandae aut perferendis, optio iste perspiciatis sequi, repellendus debitis quasi. Commodi tempora quidem aliquid mollitia.
					</p>
				</div>
			</div>
			<hr style="width: 100%;">
				
				<form action="" style="padding: 2em;" >
					<textarea style=" height: 300px;" name="" class="form-control" placeholder="Escribe tu respusta aquí"></textarea>
					<br>
					<div class="pull-right">
						<button type="submit" class="btn btn-warning danger-alternative orange-alt"
									style="width: 100%; padding: inherit 1em;"
									onclick="window.location='/'">NUEVO TEMA</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
@stop