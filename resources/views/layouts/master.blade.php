<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<title>Summit Intranet</title>
	<link rel="stylesheet" href="/css/app.css?v=<?php echo time(); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
	<link rel="stylesheet" href="/bower_components/fullcalendar/dist/fullcalendar.css"/>
	<link rel="stylesheet" href="/bower_components/sweetalert/dist/sweetalert.css"></link>
	<link rel="stylesheet" href="/js/libs/unslider-master/dist/css/unslider.css">
	<link rel="stylesheet" href="/js/libs/unslider-master/dist/css/unslider-dots.css">
	<link href="/bower_components/angular-bootstrap-calendar/dist/css/angular-bootstrap-calendar.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/bower_components/iCheck/skins/square/_all.css">
	<link rel="stylesheet" href="/bower_components/trumbowyg/dist/ui/trumbowyg.css">
	<link rel="stylesheet" href="/bower_components/lightbox2/dist/css/lightbox.css">
	<link rel="stylesheet" href="/bower_components/angucomplete-alt/angucomplete-alt.css">
	<link rel="stylesheet" href="/js/libs/jquery.mmenu/jquery.mmenu.all.css">
	<link rel="stylesheet" href="/bower_components/stacktable.js/stacktable.css">
	<link rel="stylesheet" href="/js/libs/jquery-accordions/css/jquery.accordion.css">

</head>
<body class="main background-main"ng-cloak>
	<nav id="my-menu">
   <ul>
	 		<li><a href="/">HOME</a>
      <li><a href="#">INFORMACIÓN ÚTIL</a>
				<ul>
					<li><a href="/about-us">Nosotros</a></li>
					<li><a href="/manuals">Manuales</a></li>
					<li><a href="/products">Info Productos</a></li>
					<li><a href="/jobs">Búsqueda Laboral</a></li>
				</ul>
			</li>

      <li>
				<a href="#">RSE</a>
				<ul>
					<li><a href="/solidaria">Summit Solidaria</a></li>
					<li><a href="/regional">Nuestros Valores</a></li>
					<li><a href="/begreen">BeGreen</a></li>
				</ul>
			</li>
      <li>
				<a href="#">AGENDA</a>
				<ul>
					<li><a href="/diary">Reserva de Sala</a></li>
					<li><a href="/diary">Eventos</a></li>
					<li><a href="/diary">Vacaciones</a></li>
				</ul>
			</li>
			<li><a href="/forum">FOROS</a></li>
			<li><a href="/rincon-japones">RINCÓN JAPONÉS</a></li>
   </ul>
</nav>

	<div class="div" id="my-wrapper">
		@yield('content')
	</div>
	<script>
	  // rename myToken as you like
	  window.myToken =  <?php echo json_encode([
	  	'csrfToken' => csrf_token(),
	  	]); ?>
	  </script>
	  <script src="/js/app.js"></script>

		<script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
	  <script src="/bower_components/angular/angular.js"></script>
		<script src="/bower_components/angular-sanitize/angular-sanitize.js"></script>
	  <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/es.js"></script>
	  <script type="text/javascript" src="/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
	  <script type="text/javascript" src="/bower_components/angular-ui-calendar/src/calendar.js"></script>
	  <script type="text/javascript" src="/bower_components/fullcalendar/dist/gcal.js"></script>
		 <script src="/bower_components/angular-bootstrap/ui-bootstrap.js"></script>
		 <script src="/bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
		 <script src="/bower_components/ng-file-upload/ng-file-upload.min.js"></script>
		 <script src="/bower_components/sweetalert/dist/sweetalert.min.js"></script>
		 <script src="/bower_components/ngSweetAlert/SweetAlert.js"></script>
		 <script src="/js/libs/unslider-master/dist/js/unslider-min.js"></script>
		 <script src="/bower_components/angular-bootstrap-calendar/dist/js/angular-bootstrap-calendar-tpls.min.js"></script>
		 <script src="/bower_components/underscore/underscore-min.js"></script>
		 <script src="/bower_components/iCheck/icheck.js"></script>
		 <script src="/bower_components/trumbowyg/dist/trumbowyg.js"></script>
		 <script src="/bower_components/lightbox2/dist/js/lightbox.js"></script>
		 <script src="/bower_components/rrule/lib/rrule.js"></script>

		 <!-- APP -->
		 <script src="/js/components/app.js?v=<?php echo time(); ?>"></script>

		 <!-- SERVICES -->
		<script src="/js/components/users/UsersService.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/sectors/SectorsService.js?v=<?php echo time(); ?>"></script> 
		<script src="/js/components/units/UnitsService.js?v=<?php echo time(); ?>"></script> 

		 <!-- CONTROLLERS -->
	  <script src="/js/components/agenda/AgendaCalendarController.js?v=<?php echo time(); ?>"></script>
	  <script src="/js/components/users/UsersController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/users/UsersProfileController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/news/NewsController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/manuales/ManualController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/videos/VideosController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/MenuController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/users/PersonsController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/salas/SalasController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/users/UserSelectorController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/users/PortadaController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/users/GaleriaController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/components/productos/ProductosController.js?v=<?php echo time(); ?>"></script>
		<script src="/js/libs/jquery-accordions/js/jquery.accordion.js"></script>

		<script>
			jQuery(document).ready(function($) {
			
				setTimeout(function() {
					$('.accordion').accordion({
    				"transitionSpeed": 400
					});

					$('.news-items .item').mouseover(function() { 
						$(this).find('.tag').addClass('hovered')
				 	})

					 $('.news-items .item').mouseleave(function() { 
						$(this).find('.tag').removeClass('hovered')
				 	})

					$('.my-slider').unslider({
					arrows: false,
					autoplay: true
				});

				$('.edit-area').trumbowyg({
					btns: [['removeformat'],['bold', 'italic'], ['link'], ['formatting'], 'btnGrp-justify','btnGrp-lists']
				});
				}, 1000)
				 
				$('input').iCheck({
					radioClass: 'icheckbox_square-orange',
					increaseArea: '5%' // optional
				});

				 $('[name="privado"]').on('ifChecked', function() { 
					if ($(this).val() == 1) {
						$('.users').css('display', 'block')
					} else {
						$('.users').css('display', 'none')
					}
       	})
				 $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    			event.preventDefault();
    			$(this).ekkoLightbox();
				});

				$("#my-menu").mmenu({
         // options
      	}, {
         // configuration
         offCanvas: {
            pageSelector: "#my-wrapper"
         }
      	});

				var API = $("#my-menu").data( "mmenu" );
      
				$(".hamburger").click(function() {
					API.open();
				});
			});
		</script>
		<script src="/bower_components/angucomplete-alt/angucomplete-alt.js"></script>
		<script src="/js/libs/jquery.mmenu/jquery.mmenu.all.js"></script>
		
		
	</body>
	</html>