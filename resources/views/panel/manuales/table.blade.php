<table class="table table-responsive" id="manuales-table">
    <thead>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Tipo</th>
        <th>Sector</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($manuales as $manuales)
        <tr>
            <td>{!! $manuales->titulo !!}</td>
            <td>{!! $manuales->cuerpo !!}</td>
            <td>{!! $manuales->type !!}</td>
            <td>{!! $manuales->sector->name !!}</td>
            <td>
                {!! Form::open(['route' => ['panel.manuales.destroy', $manuales->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.manuales.edit', [$manuales->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @if ($manuales->type == 'PDF')
                        <a class="btn btn-info btn-xs" href="{{asset('storage/'.$manuales->file)}}" target="_blank"><i class="glyphicon glyphicon-download"></i></a>
                    @endif
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>