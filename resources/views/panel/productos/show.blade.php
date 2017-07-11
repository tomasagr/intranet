@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Productos
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('panel.productos.show_fields')
                    <a href="{!! route('panel.productos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
