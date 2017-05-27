@extends('layouts.master')
@section('content')
@include('layouts.header')
<div class="container main-container"  ng-app="app" 
     ng-controller="UsersProfileController" ng-init="authid={{Auth::user()->id}}">
	<br><br>
	<div class="col-md-10 col-md-offset-1 card" ng-init="profileid={{$user->id}}">
		<div class="row">
				<div class="col-md-12">
								@include('flash::message')
							</div>
			
			<br>
			
			<h1 class="top-title">Mi Perfil</h1>
			
		</div>

		 <form>
            <div class="row upload-row">
                <div class="col-md-2">
                    <img
                        style="width: 150px; height: 120px" 
                        class="img-responsive user-image img-circle" 
                        ngf-thumbnail="file || fileAvatar" alt="">
                </div>
            </div>

						<div class="row">
							<div class="col-md-12" style="text-align:center; margin-bottom: 1.5em; font-size:16px;">
								@{{user.fullname}}
							</div>
							
						</div>

						<div class="row">
							<div class="col-md-12" style="text-align: center; margin-bottom: 2em;" ng-cloak>
								<button ng-if="!isVoted" class="btn btn-warning danger-alternative" style="padding: 1.5em 0; width: 200px;">
									<a href="/users/@{{user.id}}/vote" style="color: white; display:block;">VOTAR</a>
								</button>
								<button ng-if="isVoted" disabled="disabled" class="btn btn-warning danger-alternative" style="padding: 1.5em 0; width: 200px;">
									VOTADO
								</button>
							</div>
						
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
		<hr>
	</div>
</div>

@include('layouts.footer')
@stop