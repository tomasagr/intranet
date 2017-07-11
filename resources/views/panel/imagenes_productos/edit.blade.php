@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Imagenes Productos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($imagenesProductos, ['route' => ['panel.imagenesProductos.update', $imagenesProductos->id], 'method' => 'patch']) !!}

                        @include('panel.imagenes_productos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection