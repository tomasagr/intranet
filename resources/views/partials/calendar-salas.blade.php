<div class="calendar-module" ng-cloak>
	<div class="col-md-6 calendar-item">
		<div class="col-md-12">
			<div class="controls" 
			style="display: flex; align-items:center; justify-content: space-between; margin: 0em 0 1.5em 0">
			<button
			class="btn btn-default btn-calendar"
			mwl-date-modifier
			date="viewDate"
			decrement="calendarView">
			<i class="fa fa-chevron-left"></i>
		</button>
		<h3 style="margin:0;text-transform:capitalize;">@{{calendarTitle}}</h3>
		<button
		class="btn btn-default btn-calendar"
		mwl-date-modifier
		date="viewDate"
		increment="calendarView">
		<i class="fa fa-chevron-right"></i>
	</button>
</div>
<mwl-calendar
	view="calendarView"
	view-date="viewDate"
	events="events"
	view-title="calendarTitle"
	cell-auto-open-disabled="true"
	on-timespan-click="timespanClicked(calendarDate)">
</mwl-calendar>
</div>
</div>
<div class="col-md-6">
	<div class="header-list">
		<h2>@{{title}}</h2>
		<h3>@{{daySelected}}</h3>
	</div>
	<div class="items">
		<div class="item">
			<header style="background-color:transparent;">
				<span>
					<i class="fa fa-circle" style="color:green;margin-right: 10px"></i>
					<small>RESERVADA</small>
				</span>
				<p class="event-title">FRANJA HORARIA DISPONIBLE<p>
				</header>
				<div class="hour-range">
					<div ng-if="!franja.length" class="alert alert-info">
						No hay franjas horarias guardadas o disponibles
					</div>
					<input type="hidden" value="{{\Auth::user()->id}}" data-userid>
					<div ng-repeat="item in franja">
						<label class="radio-label"  style="display: flex;">
						<a ng-if="item.is_used && userOwnFranja(item.id, {{Auth::user()->id}})" ng-click="deleteReserva(item.id, {{Auth::user()->id}})"><i class="fa fa-trash"></i></a>
						<input ng-show="!item.is_used" class="radiocalendar"
							type="checkbox"
							ng-true-value="@{{item.id}}"
							ng-model="$parent.reservation[$index]">
							<span ng-if="!item.is_used" style="margin-left: 10px;">@{{item.start}} - @{{item.end}}</span>
							<span ng-if="item.is_used" style="margin-left: 10px; text-decoration: line-through;">@{{item.start}} - @{{item.end}}</span>
						</label>
					</div>
				</div>
				<button ng-if="franja.length"
				class="btn btn-warning danger-alternative orange-alt"
				ng-disabled="!reservation"
				ng-click="saveReservation(calendarDate)">
				APLICAR
			</button>
		</div>
	</div>
</div>
</div>