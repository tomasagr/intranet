<div class="container" ng-controller="AgendaCalendarController">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
			<a href="#events" aria-controls="events"
			   role="tab" data-toggle="tab"  ng-click="getEvents({type: 'eventos'})">EVENTOS</a>
		</li>
		<li role="presentation">
			<a href="#vacations" aria-controls="vacations"
			   role="tab" data-toggle="tab" ng-click="getEvents({type: 'vacaciones'})">VACACIONES</a>
		</li>
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="events">
			@include('partials.calendar',
				['type'=> 'eventos', 'title' => 'EVENTOS'])
		</div>
		<div role="tabpanel" class="tab-pane" id="vacations">
			@include('partials.calendar',
				['title' => 'VACACIONES', 'type'=> 'vacaciones'])
		</div>
	</div>
</div>