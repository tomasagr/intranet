<div class="container" ng-controller="AgendaCalendarController">
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="events">
			@include('partials.calendar',
				['type'=> 'eventos', 'title' => 'EVENTOS'])
		</div>
	</div>
</div>