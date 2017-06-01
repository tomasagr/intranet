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

</head>
<body class="main background-main" ng-cloak>
	@yield('content')
	<script>
	  // rename myToken as you like
	  window.myToken =  <?php echo json_encode([
	  	'csrfToken' => csrf_token(),
	  	]); ?>
	  </script>
	  <script src="/js/app.js"></script>

		<script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
	  <script src="/bower_components/angular/angular.js"></script>
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

		<script>
			jQuery(document).ready(function($) {
				setTimeout(function() {
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
			});
		</script>
	</body>
	</html>