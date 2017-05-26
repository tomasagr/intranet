<div class="row">
	<div class="col-md-12">
		<div class="form-inline inline-flex">
			<div class="col-md-2">
				<label>Unidad</label>
			</div>
			<div class="col-md-5">
				<select ng-model="user.unit_id"
								ng-options="item.id as item.name for item in units"
				        required
								ng-change="toggleSectorSelect()"
				        class="inline-block-input form-control">
					<option value="">Seleccionar unidad</option>
				</select>
			</div>
		</div>
	</div>
</div>
<br>

<div class="row" ng-if="haveUnit">
	<div class="col-md-12">
		<div class="form-inline inline-flex">
			<div class="col-md-2">
				<label>Sector</label>
			</div>
			<div class="col-md-5">
				<select ng-model="user.sector_id" 
								ng-options="item.id as item.name for item in sectors"
								ng-required="haveUnit" 
								class="inline-block-input form-control">
					<option value="">Seleccionar sector</option>
				</select>
			</div>
		</div>
	</div>
</div>