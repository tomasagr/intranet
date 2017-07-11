<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $productos->id !!}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo', 'Logo:') !!}
    <p>{!! $productos->logo !!}</p>
</div>

<!-- Aplicaciones Titulo Field -->
<div class="form-group">
    {!! Form::label('aplicaciones_titulo', 'Aplicaciones Titulo:') !!}
    <p>{!! $productos->aplicaciones_titulo !!}</p>
</div>

<!-- Aplicaciones Descripcion Field -->
<div class="form-group">
    {!! Form::label('aplicaciones_descripcion', 'Aplicaciones Descripcion:') !!}
    <p>{!! $productos->aplicaciones_descripcion !!}</p>
</div>

<!-- Ventajas Field -->
<div class="form-group">
    {!! Form::label('ventajas', 'Ventajas:') !!}
    <p>{!! $productos->ventajas !!}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{!! $productos->category_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $productos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $productos->updated_at !!}</p>
</div>

