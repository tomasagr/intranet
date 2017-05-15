<div class="row">
	<div class="col-md-12">
		<div class="form-inline inline-flex">
			<div class="col-md-2">
				<label>Unidad</label>
			</div>
			<div class="col-md-5">
				<select ng-model="user.unit_id"
				        required
								ng-change="toogleSectorSelect()"
				        class="inline-block-input form-control">
					<option value="">Seleccionar unidad</option>
					<option value="1">RRHH</option>
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
				<select ng-model="user.sector_id" ng-required="haveUnit" class="inline-block-input form-control">
					<option value="">Seleccionar sector</option>
					<option value="1">RRHH</option>
				</select>
			</div>
		</div>
	</div>
</div>