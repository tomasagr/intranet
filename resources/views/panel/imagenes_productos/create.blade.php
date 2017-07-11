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
                    {!! Form::open(['url' => '/panel/productos/'.$producto->id.'/imagenes', 'files' => true]) !!}

                        @include('panel.imagenes_productos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
