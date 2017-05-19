@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Información
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'panel.informacions.store']) !!}

                        @include('panel.informacions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
