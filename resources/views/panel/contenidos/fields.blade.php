<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Cuerpo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('cuerpo', 'Cuerpo:') !!}
    {!! Form::textarea('cuerpo', null, ['class' => 'form-control edit-area']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}

     @if(isset($contenido))
    <br>
        <img width="100%" height="200" src="{{asset('storage/'.$contenido->image)}}" />
    @endif
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('panel.contenidos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
