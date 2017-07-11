@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sectores
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sectores, ['route' => ['sectores.update', $sectores->id], 'method' => 'patch']) !!}

                        @include('sectores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection