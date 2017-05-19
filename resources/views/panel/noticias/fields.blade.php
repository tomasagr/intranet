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
    {!! Form::textarea('cuerpo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sector_id', 'Sector:') !!}
    {!! Form::select('sector_id',  $sectors->all()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('category_id', 'Categoria:') !!}
    {!! Form::select('category_id', $category->all()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
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
