<div class="calendar-module">
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
        on-timespan-click="timespanClicked(calendarDate, calendarCell, '{{$type}}')">
      </mwl-calendar>
    </div>
    @if($title != 'VACACIONES')
    <div class="col-md-12 ticks">
      <span><i class="fa fa-circle" style="color: red;margin-right: 0px"></i> EVENTOS AGRO</span>
      <span><i class="fa fa-circle" style="color:green;;margin-right: 0px"></i> EVENTOS SUMMIT</span>
      <span><i class="fa fa-circle" style="color:#EC8E2B;;margin-right: 0px"></i> VACACIONES</span>
    </div>
    @endif
  </div>
  <div class="col-md-6" >
    <div class="header-list">
      <h2 style="color:black;">{{$title}}</h2>
      <h3>@{{daySelected}}</h3>
    </div>
    <div class="items" style="
    overflow-y: scroll;
    height: 320px;">
      <div class="alert alert-info" ng-if="!frontEvents.length">
        No hay eventos para el día seleccionado
      </div>

      <div class="item" ng-repeat ="item in frontEvents">
        <header style="background-color: transparent;">
          <p class="hour" ng-if="item.type == 'eventos'">@{{item.hora}}</p>
          <p class="hour" ng-if="item.type == 'vacaciones'">Usuario: @{{item.user.fullname}}</p>

          <p class="event-title" style="text-transform: uppercase">
            <i ng-if="item.tipo == 'AGRO'" class="fa fa-circle" style="color: red;margin-right: 10px"></i>
            <i ng-if="item.tipo == 'SUMMIT'" class="fa fa-circle" style="color: green;margin-right: 10px"></i>@{{item.titulo}}
          <p>
          <p class="event-description">
            @{{item.cuerpo}}
          </p>
        </header>
        <hr>
      </div>
    </div>
  </div>
</div>