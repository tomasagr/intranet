@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Aplicaciones</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('panel.rSES.create') !!}">Crear Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               <table class="table table-responsive" id="rSES-table">
    <thead>
        <th>Nombre</th>
        <th>Email</th>
        <th>Sector</th>
        <th>Unidad</th>
    </thead>
    <tbody>
    @foreach($rSE->users as $user)
        <tr>
          <td>{{$user->fullname}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->sector->name}}</td>
          <td>{{$user->unit->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
@endsection
