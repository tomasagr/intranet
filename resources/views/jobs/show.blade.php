@extends('layouts.master')
@section('content')

@include('layouts.header')

<div class="container jobs-detail clearfix" style="margin: 2em auto;">
	<div class="main-content clearfix" style="padding-top: 3em; margin-top: 0; background: white;">
		<div class="title" style="margin: 0; padding-bottom: 1em">
			RSE
		</div>

		<div class="col-md-8 col-md-offset-2">
			<header class="clearfix">
			<div class="title-jobs clearfix">
				<h2>Supervisor de departamento</h2>
				<div class="square green">CE</div>
			</div>

			<div class="data clearfix">
				<div class="options clearfix">
					<div class="col-md-12 first">
						<div class="col-md-6">
							<p class="option">Puesto</p>
						</div>
						<div class="col-md-6">
							<p><b>First Specification</b></p>
						</div>
					</div>
					<div class="col-md-12 second">
						<div class="col-md-6">
							<p class="option">Ubicación</p>
						</div>
						<div class="col-md-6">
							<p><b>Second Specification</b></p>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="description">
			<p>
			Requisitos 
			<br>•	Edad: 25 a 40 años 
			<br>•	Sexo: Indistinto
			<br>•	Formación: Universitario completo/en Curso de las carreras de Administración, Marketing, Comercialización o afines. (No Excluyente) 
			<br>•	Experiencia: Al menos 2 años de experiencia comprobable en Ventas y Gestión Comercial en empresas de Consumo Masivo.
			<br>•	Conocimientos: Buen manejo de Paquete Office. (Excluyente)
			<br>•	Movilidad: Debe contar con movilidad propia (Excluyente)
			Responsabilidades
			<br>•	Desarrollar el negocio en el territorio asignado, procurando nuevas oportunidades de venta y ejecutando el mercado, mediante la visita sistemática de los distribuidores, vinotecas, y clientes asignados, para lograr los objetivos de volumen, precio y ejecución establecidos.
			<br>•	Gestionar las variables comerciales en los clientes directos e indirectos de su zona/canal, evaluando la gestión de exhibición, distribución, rotación, con el objetivo de mejorar el desempeño de las marcas de la Compañía.
			<br>•	Relevar y analizar la información referida al negocio con respecto a performance y acciones de marcas propias y de la competencia.
			, para detectar amenazas y oportunidades comerciales, informando sobre las mismas y manteniendo actualizada la base de datos comercial y administrando el tablero de comando de la gestión comercial.
			<br>•	Supervisar las cuentas Corrientes de los clientes asignados y realizar la cobranza en los mismos

			<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
		</p>
		</div>
		</div>

		<div class="col-md-12" style="padding-bottom: 2em; ">
				<div class="button-center text-center"><br>
					<button type="submit" class="btn btn-warning danger-alternative"
									style="width: 250px; padding: inherit 1em;"
									onclick="window.location='/'">APLICAR</button>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')
@stop