@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Foro
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($foro, ['route' => ['foros.update', $foro->id], 'method' => 'patch']) !!}

                        @include('foros.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection