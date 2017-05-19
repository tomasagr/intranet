@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contenido
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contenido, ['route' => ['panel.contenidos.update', $contenido->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('panel.contenidos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection