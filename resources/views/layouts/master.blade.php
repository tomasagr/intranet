<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Summit Intranet</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
	<link rel="stylesheet" href="/bower_components/fullcalendar/dist/fullcalendar.css"/>
</head>
<body class="main background-main">
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
	  <script src="/js/components/app.js"></script>
	  <script src="/js/components/agenda/AgendaCalendarController.js"></script>
	  <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
	  <script type="text/javascript" src="/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
	  <script type="text/javascript" src="/bower_components/angular-ui-calendar/src/calendar.js"></script>
	  <script type="text/javascript" src="/bower_components/fullcalendar/dist/gcal.js"></script>
		 <script src="/bower_components/angular-bootstrap/ui-bootstrap.js"></script>

	</body>
	</html>