<!-- Fullname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fullname', 'Nombre:') !!}
    {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('position', 'Posición:') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('status', 'Estado:') !!}
    {!! Form::select('status', [1 => 'Activo', 0 => 'Inactivo'],  null,  ['class' => 'form-control']) !!}
</div>

<!-- Rol Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rol_id', 'Rol Id:') !!}
    {!! Form::select('rol_id', [], null,  ['class' => 'form-control']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-6">
    <div style="display:flex;">
    @if(isset($user)) 
     <div>
        @if ($user->avatar)
            <img style="width: 50px; height: 50px"
                class="img-responsive img-circle" src="{{asset('storage/'.$user->avatar)}}" alt="">
        @else
            <img style="width: 50px; height: 50px"
                 class="img-responsive img-circle" src="{{asset('images/default.svg')}}" alt="">
        @endif
     </div>
    @endif

   <div style="margin-left: 10px;">
        {!! Form::label('avatar', 'Avatar:') !!}
        {!! Form::file('file', null, ['class' => 'form-control']) !!}
    </div>
    </div>

</div>


<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
</div>





<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="pull-right">
        <a href="{!! route('panel.users.index') !!}" class="btn btn-default">Cancelar</a>
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary ']) !!}
    </div>
</div>
