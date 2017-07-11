<!-- Modal -->
<div class="modal fade" id="portadaModal" tabindex="-1" role="dialog" aria-labelledby="portadaModalLabel"
  ng-controller="PortadaController" ng-init="profileid={{Auth::user()->id}}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="portadaModalLabel">Portada</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-success" ng-if="success">Guardado con exito!</div>
        <form ng-submit="upload({{Auth::user()->id}})">
          <img ngf-thumbnail="file || '/images/cover-default.png'"
               style="background-repeat: no-repeat; background-size: cover; background-position: center 0; width: 100%; height: 300px" ngf-as-background="true">
          <div style="margin-top: 1em">
            <button type="button" class="btn btn-primary"
                  ngf-select ng-model="file" name="file" ngf-pattern="'image/*'"
                  ngf-accept="'image/*'" ngf-max-size="20MB" ngf-min-height="100">
                  Subir/Modificar Portada
            </button>
           <button type="submit" class="btn btn-success">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>