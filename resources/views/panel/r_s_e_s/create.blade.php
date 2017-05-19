@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            RSE
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'panel.rSES.store']) !!}

                        @include('panel.r_s_e_s.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
