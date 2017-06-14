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
                   {!! Form::model($curiosidades, ['route' => ['panel.curiosidades.update', $curiosidades->id], 'method' => 'patch', 'files' => true]) !!}
                    @include('panel.curiosidades.fields')
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection