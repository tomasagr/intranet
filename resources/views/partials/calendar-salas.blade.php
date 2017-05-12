<div class="calendar-module">
	<div class="col-md-6 calendar-item">
		<div class="col-md-12">
			<div id="<?php echo $modelName; ?>" ui-calendar="<?php echo $config; ?>.calendar"
				class="span8 calendar" ng-model="<?php echo $modelName; ?>"></div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="header-list">
				<h2>{{$title}}</h2>
				<h3>14 de Febrero</h3>
			</div>
			<div class="items">
				<div class="item">
					<header style="background-color: transparent;">
						<span>
							<i class="fa fa-circle" style="color:green;;margin-right: 10px"></i>
							<small>RESERVADA</small>
						</span>
						<p class="event-title">FRANJA HORARIA DISPONIBLE<p>
						</header>
						<div class="hour-range">
							<label for="">
								<input type="radio">
								10:00 - 12:00
							</label>

							<label for="">
								<input type="radio">
								10:00 - 12:00
							</label>

							<label for="">
								<input type="radio">
								10:00 - 12:00
							</label>
						</div>
						<button class="btn btn-warning danger-alternative orange-alt">
							APLICAR
						</button>
					</div>
				</div>
			</div>
		</div>