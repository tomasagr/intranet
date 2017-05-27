@extends('layouts.app')
@section('content')
<section class="content-header">
   <h1 class="pull-left">Star me Up</h1>
   <h1 class="pull-right">
    <a href="/panel/votos/refresh" class="btn btn-warning"><i class="fa fa-refresh"></i> Reiniciar votos</a>
   </h1>
</section>
<br>
<div class="content">
   <div class="clearfix"></div>
   @include('flash::message')
   <div class="clearfix"></div>
   <div class="box box-primary">
      <div class="box-body">
         <table class="table table-responsive" id="users-table">
            <thead>
               <th>Nombre</th>
               <th>Email</th>
               <th>Votos</th>
               <th colspan="3">Acción</th>
            </thead>
            <tbody>
               @foreach($users as $user)
               <tr>
                  <td>{{$user->profile->fullname}}</td>
                  <td>{{$user->profile->email}}</td>
                  <td>{{$user->votos}}</td>
                  <td>
                    @if (!$user->profile->star)
                      <a href="/panel/users/{{$user->profile->id}}/star" class='btn btn-success btn-xs'><i class="fa fa-star-o"></i>Destacar</a>
                    @else
                      <a href="#" class='btn btn-info btn-xs'><i class="fa fa-star-o"></i>Destacado</a>
                    @endif
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection