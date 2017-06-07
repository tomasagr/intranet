@inject('comentario', 'Intranet\Models\Comentario')

@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="container main-container"  ng-app="app" 
  ng-controller="UsersProfileController">
  <br><br>
  <div class="col-md-10 col-md-offset-1 card" ng-init="profileid={{Auth::user()->id}}">
    <div class="row">
      <br>
      <h1 class="top-title">Mi Perfil</h1>
    </div>
    <form name="registerForm" novalidate ng-submit="store()">
      <div class="row upload-row">
        <div class="col-md-2">
          <img
            style="width: 150px; height: 150px" 
            class="img-responsive user-image img-circle" 
            ngf-thumbnail="file || fileAvatar" alt="">
        </div>
        <div class="col-md-4">
          <div class="input-group">
            <input type="text"
              class="form-control" placeholder="Cargar imagen" disabled>
            <span class="input-group-btn">
            <button class="btn btn-default bg-orange"
              ngf-select ng-model="file" 
              name="file" 
              ngf-pattern="'image/*'"
              ngf-accept="'image/*'"
              gf-resize="{width: 100, height: 100}"><i class="fa fa-upload"></i></button>
            </span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-inline inline-flex">
            <div class="col-md-2">
              <label>Nombre completo</label>
            </div>
            <div class="col-md-5">
              <input type="text"
                ng-model="user.fullname"
                required
                class="form-control inline-block-input"
                placeholder="Ingrese su nombre" autofocus>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="form-inline inline-flex">
            <div class="col-md-2">
              <label>E-Mail</label>
            </div>
            <div class="col-md-5">
              <input type="email" class="form-control inline-block-input"
                ng-model="user.email"
                required
                placeholder="Ingrese su E-Mail">
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="form-inline inline-flex">
            <div class="col-md-2">
              <label>Contraseña</label>
            </div>
            <div class="col-md-5">
              <input  type="password"
                ng-model="user.password"
                class="form-control inline-block-input"
                placeholder="Ingrese su contraseña">
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="form-inline inline-flex">
            <div class="col-md-2">
              <label>Puesto</label>
            </div>
            <div class="col-md-5">
              <input type="text"
                class="form-control inline-block-input"
                ng-model="user.position"
                required
                placeholder="Ingrese su puesto">
            </div>
          </div>
        </div>
      </div>
      <br>
      @include('partials.fields.types')
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="form-inline inline-flex">
            <div class="col-md-2">
              <label>Bio</label>
            </div>
            <div class="col-md-5">
              <textarea style="width: 100%!important; height: 100px;"
                ng-model="user.bio" class="form-control"
                required
                placeholder="Ingrese su bio"></textarea>
            </div>
          </div>
        </div>
      </div>
      <hr class="col-md-8 col-md-offset-2">
      <div class="col-md-8 col-md-offset-2 questions">
        <h1>Sobre mí</h1>
        <div class="questions-items">
          @include('partials.fields.questions')
        </div>
      </div>
      <div class="row button-center text-center"><br>
        <button type="submit"
          ng-disabled="registerForm.$invalid"
          class="btn btn-warning danger-alternative orange-alt">Guardar</button>
      </div>
    </form>
    <hr>
    <div id="votes" class="activity col-md-8 col-md-offset-2">
      <h1 style="color: #f3922c;">Tus votaciones</h1>
      <p style="margin: 2em 0;"><b>COMENTARIOS</b></p>
      <div class="messages-list">
        @foreach($voting as $vote)
            <div class="item clearfix" style="margin: 3em 0;">
          <div class="col-md-8" style="padding-left: 0;">
            <p><b>Usuario: </b>{{$vote->user->fullname}}</p>
            <p style="color:#ccc">{{$vote->comments}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <hr>
    <div class="activity col-md-8 col-md-offset-2">
      <h1 style="color: #f3922c;">Tu actividad en el foro</h1>
      <p style="margin: 2em 0;"><b>RESPONDIERON TU MENSAJE</b></p>
      <div class="messages-list">
        @foreach(Auth::user()->notifications as $item) 
          @if ($item->type == 'Intranet\Notifications\ComentarioNotificacion')
            <div class="item clearfix" style="margin: 3em 0;">
            <div class="col-md-8" style="padding-left: 0;">
              <p style="color:#ccc">{{$item->data["comentario"]}}</p>
            </div>
            <div class="col-md-4">
              <button class="btn btn-warning danger-alternative orange-alt" onclick="window.location='/topic/{{$comentario->findOrFail((int)$item->notifiable_id)->tema_id}}'">IR A MENSAJE</button>
            </div>
          </div>
          @endif
       @endforeach
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')
@stop