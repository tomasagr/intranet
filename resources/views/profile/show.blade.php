@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="container main-container"  ng-app="app" ng-controller="UsersProfileController" ng-init="authid={{Auth::user()->id}}">
<br><br>
<div class="col-md-10 col-md-offset-1 card" style="padding-top: 0" ng-init="profileid={{$user->id}}">
  <div class="row">
    <div class="col-md-12">
      @include('flash::message')
    </div>
    <img ng-if="user.cover" width="100%" height="300px" ng-style="{'background': 'url(/storage/' + user.cover + ')', 'background-size': 'cover', 'background-position': 'center center'}" alt="">
    <img ng-if="!user.cover" width="100%" height="300px" ng-style="{'background': 'url(/images/cover-default.jpg)', 'background-size': 'cover', 'background-position': 'center center'}" alt="">
  </div>
  <form>
    <div class="row upload-row" style="margin-top: -68px;">
      <div class="col-md-2">
        <img
        style="width: 150px; height: 120px" 
        class="img-responsive user-image img-circle" 
        ngf-thumbnail="file || fileAvatar" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12" style="text-align:center; margin: 1em 0 3em 0; font-size:20px; font-weight: 600">
        @{{user.fullname}}
      </div>
    </div>
    <div class="row">
       <!--  <div class="col-md-12" style="text-align: center; margin-bottom: 2em;" ng-cloak>
         <button ng-if="!isVoted" 
                 data-toggle="modal" data-target="#modalVotes"
                 class="btn btn-warning danger-alternative" 
                 style="padding: 1.5em 0; width: 200px;">VOTAR</button>
         <button ng-if="isVoted" disabled="disabled" class="btn btn-warning danger-alternative" style="padding: 1.5em 0; width: 200px;">
            VOTADO
         </button>
       </div> -->
     </div>
     <div class="row">
      <div class="col-md-12">
        <div class="form-inline inline-flex">
          <div class="col-md-2">
            <label>E-Mail</label>
          </div>
          <div class="col-md-5">
            @{{user.email}}
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="form-inline inline-flex">
          <div class="col-md-6">
            <label style="padding-left: 13.55em;padding-right: 3em;">Unidad </label>
            @{{user.unit.name}}
          </div>
          <div class="col-md-6">
            <label style="padding-right: 3em;">Sector </label>
            @{{user.sector.name}}
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
            @{{user.position}}
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="form-inline inline-flex">
          <div class="col-md-2">
            <label>Bio</label>
          </div>
          <div class="col-md-5">
            @{{user.bio}}
          </div>
        </div>
      </div>
    </div>
    <hr class="col-md-8 col-md-offset-2">
    <div class="col-md-8 col-md-offset-2 questions">
      <h1>Sobre mí</h1>
      <div class="questions-items">
        @include('partials.fields.questions-alt')
      </div>
    </div>
  </form>
  <hr class="col-md-8 col-md-offset-2">
  <div class="col-md-10 col-md-offset-1 questions slider-profile">
    <div class="my-slider">
      <ul>
        <li class="slider-item" ng-repeat="photos in user.photos">
          <img src="" width="100%" height="400px"
          ng-style="{'background': 'url(/storage/'+photos.file+')', 'background-position': 'center center', 'background-size': 'cover'}" alt="">
        </li>
      </ul>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div id="modalVotes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="modal-title">Votación</h1>
      </div>
      <div class="modal-body clearfix">
        <form action="/users/{{$user->id}}/vote" method="POST">
         {{csrf_field()}}

         <div class="form-group">
          <label for="">Motivo</label>
          <textarea name="comments" id="" 
          autofocus
          required
          placeholder="Ingrese el motivo de la votación"
          cols="30" rows="10" class="form-control"></textarea>
        </div>
        <button 
        class="btn btn-warning danger-alternative pull-right" 
        style="padding: 1.5em 0; width: 200px;">
        VOTAR
      </button>
    </form>
  </div>
</div>
</div>
</div>

@include('layouts.footer')
@stop