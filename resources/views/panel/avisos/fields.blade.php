

<!-- Submit Field -->
<div class="form-group col-sm-12">
  
    {!! Form::label('titulo', 'Titulo:') !!}
        {!! Form::textarea('titulo', null, ['class' => 'form-control', 'rows' => 2, 'maxlength' => 142]) !!}
    <br>  
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('panel.avisos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
