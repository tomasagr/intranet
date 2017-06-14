<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Imagen', 'Imagen:') !!}
    {!! Form::file('imagen', null, ['class' => 'form-control']) !!}

    @if(isset($curiosidades))
        <br>
        @if ($curiosidades->imagen)
            <img width="100%" height="200" src="{{asset('storage/'.$curiosidades->imagen)}}" />
        @endif
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('panel.curiosidades.index') !!}" class="btn btn-default">Cancelar</a>
</div>
