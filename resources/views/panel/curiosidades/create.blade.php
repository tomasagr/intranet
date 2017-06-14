@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Curiosidades
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'panel.curiosidades.store', 'files' => true]) !!}

                        @include('panel.curiosidades.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
