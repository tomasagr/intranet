<?php Carbon\Carbon::setLocale('es') ?>
@inject('foros', 'Intranet\Models\Foro')
@inject('comentarios', 'Intranet\Models\Comentario')

<div class="forumsidebar">
	<div class="main">
		<div class="topic-sidebar">
		<div class="forum-header grey">
				FORO: {{$foro->nombre}}
			</div>
			<div class="messages">
				<header>
					<p>FORO</p>
					<p>MENSAJES</p>
				</header>

				<div class="item">
					<header>
						<p><a href="">TEMAS</a></p>
						<p>{{$foro->temas->count()}}</p>
					</header>
					<hr>
				</div>

				<div class="item">
					<header>
						<p><a href="">RESPUESTAS</a></p>
						<p>{{$comentarios->where('foro_id', $foro->id)->count()}}</p>
					</header>
					<hr>
				</div>

				<div class="item">
					<header>
						<p><a href="">ULTIMO POST</a></p>
						<p>
							@if (count($foro->temas()->orderBy('created_at', 'desc')->first()))
								{{$foro->temas()->orderBy('created_at', 'desc')->first()->autor->fullname}}
							@else
								Ninguno
							@endif
						</p>
					</header>
					<hr>
				</div>
			
				<div class="item">
					<header>
						<p><a href="">ULTIMA ACTIVIDAD</a></p>
						<p>
							@if (count($foro->temas()->orderBy('created_at', 'desc')->first()))
								{{$foro->temas()->orderBy('created_at', 'desc')->first()->created_at->diffForHumans()}}
							@else
								Ninguna
							@endif
						</p>
					</header>
				</div>
			</div>
			<div class="forum-header green">
				FOROS
			</div>

			<div class="messages">
				<header>
					<p>FORO</p>
					<p>MENSAJES</p>
				</header>

				@foreach($foros->all() as $item)
					<div class="item">
					<header>
						<p><a href="/forum/{{$item->id}}">{{$item->nombre}}</a></p>
						<p>{{$item->temas->count()}}</p>
					</header>
					<hr>
				</div>
				@endforeach
			</div>
			<br>
		</div>
	
		<div class="topic-sidebar">
			<div class="forum-header green">
				ÚLTIMOS COMENTARIOS
			</div>

			<div class="messages">
				<div class="item">
					<header>
						<p>MAS POPULARES</a>
						<p>{{$comentarios->where('foro_id', $foro->id)->count()}}</p>
					</header>
					<hr>
				</div>

				<div class="item">
					<header>
						<p><a href="">NO RESPONDIDOS</a></p>
						<p>{{$foro->temas->where('response', 0)->count()}}</p>
					</header>
				</div>
			</div>

			<div>
				<form action="/forum/{{$foro->id}}">
					<input placeholder="Buscar..." type="text" name="q" class="form-control" style="border-radius:20px;">
					<button type="submit" style="display:none"></button>
				</form>
				<br>
				<button type="submit" class="btn btn-warning danger-alternative"
									style="width: 100%; padding: inherit 1em;"
									onclick="window.location='/'">NUEVO TEMA</button>
			</div>
		</div>
	</div>
</div>