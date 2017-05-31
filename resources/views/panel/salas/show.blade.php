@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Sala {{$sala->nombre}}</h1>
        <h1 class="pull-right">
           
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
              <br>
              <form class="clearfix" 
                    action="/panel/salas/{{$sala->id}}/franja" 
                    method="POST"
                    style="display: flex; align-items:center">
                    {{csrf_field()}}
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Inicio:</label>
                    <input type="time" name="start" class="form-control" required>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Fin:</label>
                    <input type="time" name="end" class="form-control" required>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <br>
                    <button class="btn btn-success" type="submit">Guardar</button>
                  </div>
                </div>
              </form>
              
              <hr>

              <div class="col-md-12">
                <h3>Franja horaria disponible</h3>

              @if (count($sala->franja))
                  <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sala->franja as $item)
                    <tr>
                      <td>{{$item->start}}</td>
                      <td>{{$item->end}}</td>
                      <td>
                        <a class="btn btn-danger btn-xs" href="/panel/franja/{{$item->id}}/delete">Eliminar</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              <table>
              @else
                <div class="alert alert-info">
                  No hay ninguna franja disponible
                </div>
              @endif
              </div>
            </div>
        </div>
    </div>
@endsection

