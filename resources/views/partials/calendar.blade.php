<div class="calendar-module">
  <div class="col-md-6 calendar-item">
    <div class="col-md-12">
      <!-- <div id="<?php echo $modelName; ?>" ui-calendar="<?php echo $config; ?>.calendar"
        class="span8 calendar" ng-model="<?php echo $modelName; ?>"></div> -->
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
        cell-auto-open-disabled="true">
      </mwl-calendar>
    </div>
    @if($title != 'VACACIONES')
    <div class="col-md-12 ticks">
      <span><i class="fa fa-circle" style="color: red;margin-right: 10px"></i> EVENTOS AGRO</span>
      <span><i class="fa fa-circle" style="color:green;;margin-right: 10px"></i> EVENTOS SUMMIT</span>
    </div>
    @endif
  </div>
  <div class="col-md-6">
    <div class="header-list">
      <h2>{{$title}}</h2>
      <h3>14 de Febrero</h3>
    </div>
    <div class="items">
      <div class="item">
        <header style="background-color: transparent;">
          @if($title != 'VACACIONES')
          <p class="hour">10:30 hs.</p>
          @endif
          <p class="event-title">TITULO DEL EVENTO
          <p>
          <p class="event-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam molestiae, commodi optio omnis
            iusto ullam laboriosam ea dignissimos rerum modi enim facere autem
          </p>
        </header>
      </div>
    </div>
  </div>
</div>