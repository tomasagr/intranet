@extends('layouts.master')

@section('content')
<div class="container main-container" ng-app="app" ng-controller="UsersController">
    <div class="col-md-10 col-md-offset-1 logo-register">
        <img src="/images/logo.svg" class="img-responsive" alt="">
    </div>
    <div class="col-md-10 col-md-offset-1 card">
        <div class="row">
            <br>
            <h1 class="top-title">Registro</h1>
        </div>

        <form name="registerForm" novalidate ng-submit="store()">
            <div class="row upload-row">
                <div class="col-md-2">
                    <img class="img-responsive user-image img-circle" ngf-thumbnail="file ||'/images/default.svg'" alt="">
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text"
                        class="form-control" placeholder="Cargar imagen" readonly 
                                    ngf-select ng-model="file" 
                                    name="file" 
                                    ngf-pattern="'image/*'"
                                    ngf-accept="'image/*'"
                                    gf-resize="{width: 100, height: 100}">
                                    
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
                                    required
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
    </div>
</div>
@include('layouts.footer')
@endsection