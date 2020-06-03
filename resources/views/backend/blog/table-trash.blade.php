<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th width="120">Author</th>
        <th width="150">Category</th>
        <th width="180">Action</th>
        <th width="170">Date</th>

    </tr>
    </thead>


    <tbody>

    @foreach($posts as $post)

        <tr>

            <td>{{ $post->title }}</td>
            <td> {{ $post->author->name }} </td>
            <td>{{ $post->category->title }}</td>
            <td>
                <div class="btn-group">


                    {!! Form::open([ 'method' => 'PUT', 'route' => ['backend.blog.restore', $post->id]]) !!}
                    <button title="Restore" class="btn btn-sm btn-default">
                        <i class="fa fa-clock"></i>
                    </button>
                    {!! Form::close() !!}


                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['blog.force-destroy', $post->id]]) !!}
                    <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>

                    {!! Form::close() !!}


                </div>


            </td>


            <td>
                <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> |
                {!! $post->publicationLabel() !!}
            </td>

        </tr>

    @endforeach


    </tbody>


    <tfoot>
    <tr>
        <th>Title</th>
        <th width="120">Author</th>
        <th width="150">Category</th>
        <th width="180">Action</th>
        <th width="170">Date</th>

    </tr>
    </tfoot>

</table>