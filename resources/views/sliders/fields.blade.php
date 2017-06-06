<!-- Contenido Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contenido_id', 'Pagina:') !!}
    {!! Form::select('contenido_id', [
        '' => 'Seleccionar',
        '1' => 'Summit Solidaria',
        '2' => 'Regional',
        '3' => 'BeGreen',
        '4' => 'Nosotros'
    ], null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!! Form::file('imagen', ['required']) !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sliders.index') !!}" class="btn btn-default">Cancelar</a>
</div>
