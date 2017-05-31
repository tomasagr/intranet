@extends('layouts.master')
@section('content')
@include('layouts.header')
<div ng-app="app" ng-controller="SalasController">
	
	<div class="main-content salas" style="padding: 2em 0; margin-top: 0; background: white;">
		<div class="title" style="margin: 0; padding-bottom: 1em">
			Reserva de Sala
		</div>
		
		<div class="sala-tabs">
			<div class="container">
				<p><b>SALAS:</b></p>
				
				<button class="btn btn-default btn-summit alt" ng-class="{active: tab == 'TOKYO'}" ng-click="setTab('TOKYO', calendarDate)"><b>TOKYO</b> | SALA GRANDE</button>
				<button class="btn btn-default btn-summit alt" ng-class="{active: tab == 'OSAKA'}" ng-click="setTab('OSAKA', calendarDate)"><b>OSAKA</b> | SALA INTERMEDIA</button>
				<button class="btn btn-default btn-summit alt" ng-class="{active: tab == 'KYOTO'}" ng-click="setTab('KYOTO', calendarDate)"><b>KYOTO </b>| SALA NARANJA</button>
				<button class="btn btn-default btn-summit alt" ng-class="{active: tab == 'NARA'}" ng-click="setTab('NARA', calendarDate)"><b>NARA </b>| SALA VERDE</button>
				<hr>
			</div>
		</div>
		
		<div class="sala-calendar">
			<div class="container">
				<div class="calendar clearfix">
					@include('partials.calendar-salas',
						[
						'title' => 'TOKYO | Sala Grande',
						'modelName' => 'tokyoCalendar',
						'config' => 'tokyoConfig'
						])
					</div>
				</div>
			</div>
		</div>
		
		<div class="main-content salas" style="padding-top: 1em; margin-top: 2em;">
			<div class="title" style="margin: 0; padding-bottom: 1em">
				Agenda
			</div>
			
			<div class="agenda">
				@include('home.sections.agenda')
			</div>
		</div>
	</div>
	@include('layouts.footer')
	@stop
