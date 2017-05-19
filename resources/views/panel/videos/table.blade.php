<table class="table table-responsive" id="videos-table">
    <thead>
        <th>Titulo</th>
        <th>Link</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($videos as $videos)
        <tr>
            <td>{!! $videos->titulo !!}</td>
            <td>{!! $videos->link !!}</td>
            <td>
                {!! Form::open(['route' => ['panel.videos.destroy', $videos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('panel.videos.edit', [$videos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>