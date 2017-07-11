<!-- Modal -->
<div class="modal fade" id="galeriaModal" tabindex="-1" role="dialog" aria-labelledby="galeriaModalLabel"
ng-controller="GaleriaController" ng-init="profileid={{Auth::user()->id}}">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="galeriaModalLabel">Galeria</h4>
    </div>
    <div class="modal-body">
      <div class="alert alert-success" ng-if="success">Guardado con exito!</div>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Creada el</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="photo in photos">
            <td>@{{photo.id}}</td>
            <td>@{{photo.created_at}}</td>
            <td>
              <a ng-href="storage/@{{photo.file}}" class="btn btn-xs btn-success" target="_blank">VER</a>
            </td>
          </tr>
        </tbody>
        </table>
      <div style="margin-top: 1em">
        <button type="file" class="btn btn-primary"
        ng-model="file" name="file" ngf-pattern="'image/*'"
        ngf-accept="'image/*'"
        ngf-select="upload($file)">
        Subir/Modificar Portada
      </button>
    </div>
  </div>
</div>
</div>
</div>