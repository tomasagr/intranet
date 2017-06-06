@extends('layouts.master')
@section('content')
<?php \Carbon\Carbon::setLocale('es'); ?>
@include('layouts.header')
<div class="row">
	<div class="container" style="padding: 2em 0;">
		<div class="col-md-3">
			@include('forum.sidebar', ['foros' => $foros])
		</div>
		<div class="col-md-9">
			<div class="forum-header grey">
				CREAR TEMA
			</div>

			<div class="content-list" style="background: white; padding: 2em;" ng-controller="UserSelectorController">
				<form action="/topic" method="POST">
        {{csrf_field()}}
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <p>Título del tema (Máximo 80 caracteres)</p>
                <input name="nombre" type="text" class="form-control" maxlength="80" autofocus required>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <textarea 
                  name="cuerpo" 
                  id="" cols="30" rows="10" class="form-control edit-area" 
                  placeholder="Escriba aquí"
                  required></textarea>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <p>Seleccionar foro</p>
                <select name="foro_id" id="" class="form-control" required>
                  <option value="">Seleccionar</option>
                  @foreach($foros as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="form group" style="display: flex;">
                <p style="margin:0;margin-right: 2em;">
                  <input value="0" name="privado" value="0" type="radio" checked> Tema público</p>
                <p style="margin:0;">
                  <input type="radio" value="1" name="privado"> Tema privado</p>
              </div>
            </div>
          </div>
          <br>
          
          <div class="users" style="display:none">
            <div class="row" ng-repeat="item in fields">
              <div class="col-md-12">
                <div class="form-group" style="display:flex; align-items:center">
                  <input type="text" name="user_id[]" 
                         class="form-control" placeholder="Ingrese el nombre de usuario" 
                         style="width: 94%; margin-right: 1em;">
                
                  <a ng-show="!$last && !first" href="" ng-click="removeField($index)" class="orange" 
                    style="color: white; border-radius: 100%; padding: .5em .7em">
                    <i class="fa fa-minus"></i>
                  </a>

                  <a ng-show="$last" href="" ng-click="addField($index)" class="orange" 
                    style="color: white; border-radius: 100%; padding: .5em .7em">
                    <i class="fa fa-plus"></i>
                  </a>
                </div>
              </div>
             </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="button-send pull-right">
                <button type="submit" class="btn btn-warning danger-alternative orange-alt">ENVIAR</button>
              </div>
            </div>
          </div>
        </form>
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
@stop

