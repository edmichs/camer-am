<table class="table table-responsive" id="affections-table">
    <thead>
        <th>Code</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($affections as $affection)
        <tr>
            <td>{!! $affection->code !!}</td>
            <td>{!! $affection->description !!}</td>
            <td>
                {!! Form::open(['route' => ['affections.destroy', $affection->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('affections.show', [$affection->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('affections.edit', [$affection->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>