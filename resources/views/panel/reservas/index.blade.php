@extends('layouts.app')
@section('content')
<div ng-app="app" ng-controller="ReservasController" ng-cloak>
  <section class="content-header">
    <h1 class="pull-left">Reservas</h1>
    <h1 class="pull-right">
    </h1>
  </section>
  <div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
      <div class="box-body">
        <div class="col-md-12">
          <p><b>SALAS:</b></p>
				
				<button class="btn btn-warning" ng-class="{active: tab == 'TOKYO'}" ng-click="setTab('TOKYO', calendarDate)">
          <b>TOKYO</b> | SALA GRANDE
        </button>
				<button class="btn btn-warning" ng-class="{active: tab == 'OSAKA'}" ng-click="setTab('OSAKA', calendarDate)">
          <b>OSAKA</b> | SALA INTERMEDIA
        </button>
				<button class="btn btn-warning" ng-class="{active: tab == 'KYOTO'}" ng-click="setTab('KYOTO', calendarDate)">
          <b>KYOTO </b>| SALA NARANJA
        </button>
				<button class="btn btn-warning" ng-class="{active: tab == 'NARA'}" ng-click="setTab('NARA', calendarDate)">
          <b>NARA </b>| SALA VERDE
        </button>
				<hr>
        </div>
        <div class="col-md-6">
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

        <div class="col-md-6">
          <h2>Reservas del @{{daySelected}}</h2>
          <div ng-if="!reservas.length" class="alert alert-info">
            No hay reservas para el día seleccionado
          </div>
          <div class="col-md-12">
            <div class="item" ng-repeat="item in reservas">
              <p style="display: flex; justify-content: space-between">
                <span><b>Usuario:</b> @{{item.user.fullname}}</span>
                <span><a href="/api/reservas/@{{item.id}}/delete"><i class="fa fa-trash"></i></a></span>
              </p>
              <p><b>Franja:</b> @{{item.franja.start}} - @{{item.franja.end}}</p>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection