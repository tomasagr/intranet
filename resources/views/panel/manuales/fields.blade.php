@inject('sectors', 'Intranet\Sector')
<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Cuerpo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('cuerpo', 'Cuerpo:') !!}
    {!! Form::textarea('cuerpo', null, ['class' => 'form-control']) !!}
</div>

<!-- Opcion1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opcion1', 'Opcion1:') !!}
    {!! Form::text('opcion1', null, ['class' => 'form-control']) !!}
</div>

<!-- Opcion2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opcion2', 'Opcion2:') !!}
    {!! Form::text('opcion2', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Tipo:') !!}
    {!! Form::select('type', ['Video' => 'Video', 'PDF' => 'PDF'], null, ['class' => 'form-control']) !!}
</div>

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sector_id', 'Sector:') !!}
    {!! Form::select('sector_id', $sectors->all()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'Codigo youtube:') !!}
    {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'mlJj0DVbVBY']) !!}
</div>

<!-- File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'PDF:') !!}
    {!! Form::file('file') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('panel.manuales.index') !!}" class="btn btn-default">Cancelar</a>
</div>
