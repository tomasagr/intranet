@inject('comentarios', 'Intranet\Models\Comentario')
@inject('temas', 'Intranet\Models\Tema')
<?php Carbon\Carbon::setLocale('es') ?>
<div class="forumsidebar">
	<div class="main">
		<div class="topic-sidebar">
			<div class="forum-header green">
				FOROS
			</div>

			<div class="messages">
				<header>
					<p>FORO</p>
					<p>MENSAJES</p>
				</header>

				@foreach($foros as $foro)
					<div class="item">
					<header>
						<p><a href="/forum/{{$foro->id}}">{{$foro->nombre}}</a></p>
						<p>{{$foro->temas->count()}}</p>
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
						<p>MAS POPULARES</p>
						<p>{{$comentarios->count()}}</p>
					</header>
					<hr>
				</div>

				<div class="item">
					<header>
						<p>NO RESPONDIDOS</p>
						<p>{{$temas->where('response', 0)->count()}}</p>
					</header>
				</div>
			</div>

			<div>
				<form action="/forum">
					<input placeholder="Buscar..." type="text" name="q" class="form-control" style="border-radius:20px;">
					<button type="submit" style="display:none"></button>
				</form>
				<br>
				<button type="button" class="btn btn-warning danger-alternative"
									style="width: 100%; padding: inherit 1em;"
									onclick="window.location='/'">NUEVO TEMA</button>
			</div>
		</div>
	</div>
</div>