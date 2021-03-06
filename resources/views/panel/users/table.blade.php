<table class="table table-responsive" id="users-table">
    <thead>
        <th>Nombre</th>
        <th>Email</th>
        <th>Posición</th>
        <th>Unidad</th>
        <th>Sector</th>
        <th>Estado</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->fullname !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->position !!}</td>
            <td>{!! $user->unit->name !!}</td>
            <td>{!! $user->sector->name !!}</td>
            <td>
                @if ($user->status)
                    <a href="/panel/users/{{$user->id}}/toggle" class="btn btn-xs btn-danger">Desactivar</a>
                @else
                    <a href="/panel/users/{{$user->id}}/toggle" class="btn btn-xs btn-success">Activar</a>
                @endif
            </td>
            <td>
                {!! Form::open(['route' => ['panel.users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta seguro que quiere eliminar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>