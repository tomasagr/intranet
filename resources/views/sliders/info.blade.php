@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Galerias Información</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('sliders.create') !!}">Crear Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    <form action="/galerias/informacion/1" method="POST">
                    {{csrf_field()}}
                      <h2>Summit Solidaria</h2>
                      <div class="form-group">
                        <label for="">Titulo</label>
                        <input type="text" name="titulo" value="{{$info[0]->titulo}}" class="form-control" required>
                        <br>
                        <label for="">Texto</label>
                        <input type="text" name="texto" value="{{$info[0]->texto}}" class="form-control" required>
                      </div>
                      <button class="btn btn-success" type="submit">Guardar</button>
                    </form>
                    <hr>
                    <form action="/galerias/informacion/2" method="POST">
                    {{csrf_field()}}
                      <h2>Regional</h2>
                      <div class="form-group">
                        <label for="">Titulo</label>
                        <input type="text" name="titulo" value="{{$info[1]->titulo}}" class="form-control" required>
                        <br>
                        <label for="">Texto</label>
                        <input type="text" name="texto" value="{{$info[1]->texto}}" class="form-control" required>
                      </div>
                      <button class="btn btn-success" type="submit">Guardar</button>
                    </form>
                    <hr>
                    <form action="/galerias/informacion/3" method="POST">
                    {{csrf_field()}}
                      <h2>BeeGreen</h2>
                      <div class="form-group">
                        <label for="">Titulo</label>
                        <input type="text" name="titulo" value="{{$info[2]->titulo}}" class="form-control" required>
                        <br>
                        <label for="">Texto</label>
                        <input type="text" name="texto" value="{{$info[2]->texto}}" class="form-control" required>
                      </div>
                      <button class="btn btn-success" type="submit">Guardar</button>
                    </form>
            </div>
        </div>
    </div>
@endsection

