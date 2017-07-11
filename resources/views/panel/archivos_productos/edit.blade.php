@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Archivos Productos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($archivosProductos,
                    ['url' => "/panel/productos/$producto->id/archivos/$archivosProductos->id" , 'method' => 'patch', 'files' => true]) !!}
                        @include('panel.archivos_productos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection