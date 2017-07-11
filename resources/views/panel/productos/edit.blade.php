@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{$productos->aplicaciones_titulo}}
            <a href="/panel/productos/{{$productos->id}}/archivos" class="btn btn-info pull-right">Archivos</a>
            <a href="/panel/productos/{{$productos->id}}/imagenes" class="btn btn-success pull-right">Imagenes</a>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productos, ['route' => ['panel.productos.update', $productos->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('panel.productos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection