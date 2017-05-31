@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Salas</h1>
        <h1 class="pull-right">
           
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($salas as $item)
                    <tr>
                      <td>{{$item->nombre}}</td>
                      <td>
                        <a class="btn btn-info btn-xs" href="/panel/salas/{{$item->id}}">Asignar Franja</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              <table>
            </div>
        </div>
    </div>
@endsection

