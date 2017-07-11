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
                    {!! Form::open(['url' => '/panel/productos/'.$producto->id.'/archivos', 'files' => true]) !!}

                        @include('panel.archivos_productos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
