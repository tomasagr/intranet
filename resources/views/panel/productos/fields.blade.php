@inject('categorias', 'Intranet\CategoryProduct')
<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', 'Logo:') !!}
    <div class="">
        @if (isset($productos))
            @if ($productos->logo)
                <img  width="100" src="{{asset('storage/'.$productos->logo)}}" alt="">
            @endif
        @endif
        <br>
    </div>
    {!! Form::file('logo') !!}
</div>
<div class="clearfix"></div>

<!-- Aplicaciones Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aplicaciones_titulo', 'Aplicaciones Titulo:') !!}
    {!! Form::text('aplicaciones_titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Aplicaciones Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('aplicaciones_descripcion', 'Aplicaciones Descripcion:') !!}
    {!! Form::textarea('aplicaciones_descripcion', null, ['class' => 'form-control edit-area']) !!}
</div>

<!-- Ventajas Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ventajas', 'Ventajas:') !!}
    {!! Form::textarea('ventajas', null, ['class' => 'form-control edit-area']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Categoria', 'Categoria:') !!}
    {!! Form::select('category_id', $categorias->all()->pluck('name', 'id'), null,  ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('panel.productos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
