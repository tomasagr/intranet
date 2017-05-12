<div class="container" ng-app="app" ng-controller="AgendaCalendarController">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
			<a href="#events" aria-controls="events"
			role="tab" data-toggle="tab">EVENTOS</a>
		</li>
		<li role="presentation">
			<a href="#vacations" aria-controls="vacations"
			role="tab" data-toggle="tab"  ng-click="renderCalendar()">VACACIONES</a>
		</li>
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="events">
			@include('partials.calendar', 
				['modelName' => 'eventsCalendar', 'config' => 'eventConfig', 'title' => 'EVENTOS AGRO'])
		</div>
		<div role="tabpanel" class="tab-pane" id="vacations">
			@include('partials.calendar', 
				['modelName' => 'vacationsCalendar', 'config' => 'vacationsConfig', 'title' => 'VACACIONES'])
		</div>
	</div>
</div>