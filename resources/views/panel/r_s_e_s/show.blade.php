@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            R S E
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('panel.r_s_e_s.show_fields')
                    <a href="{!! route('panel.rSES.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
