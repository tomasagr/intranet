@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vacaciones
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vacaciones, ['route' => ['panel.vacaciones.update', $vacaciones->id], 'method' => 'patch']) !!}

                        @include('panel.vacaciones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection