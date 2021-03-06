@inject('sectors', 'Intranet\Sector')
@inject('category', 'Intranet\Category')
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

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sector_id', 'Sector:') !!}
    {!! Form::select('sector_id',  $sectors->all()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
</div>

@if (Request::is('panel/productos/*'))
{!! Form::hidden('category_id', 3) !!}
@else
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('category_id', 'Categoria:') !!}
    {!! Form::select('category_id', $category->all()->slice(0,2)->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
</div>
@endif

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('visibility', 'Mostrar en:') !!}
    {!! Form::select('visibility',
        [0 => 'No mostrar en home', 1 => 'Mostrar en slider principal', 2 => 'Mostrar en slider secundario'], null,
        ['class' => 'form-control'])
    !!}
</div>


<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('image', 'Imagen:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
    
    @if(isset($noticias))
    <br>
    <img width="100%" height="200" src="{{asset('storage/'.$noticias->image)}}" />
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('panel.noticias.index') !!}" class="btn btn-default">Cancelar</a>
</div>
