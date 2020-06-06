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
    <?php $request = request(); ?>

    @foreach($posts as $post)

        <tr>

            <td>{{ $post->title }}</td>
            <td> {{ $post->author->name }} </td>
            <td>{{ $post->category->title }}</td>
            <td>
                <div class="btn-group">


                    {!! Form::open([ 'method' => 'PUT', 'route' => ['backend.blog.restore', $post->id]]) !!}

                    @if (check_user_permissions($request, "Blog@restore", $post->id))
                        <button title="Restore" class="btn btn-sm btn-default">
                            <i class="fa fa-refresh"></i>
                        </button>
                    @else
                        <button title="Restore" onclick="return false;" class="btn btn-xs btn-default disabled">
                            <i class="fa fa-refresh"></i>
                        </button>
                    @endif


                    {!! Form::close() !!}


                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['blog.force-destroy', $post->id]]) !!}
                    

                    @if (check_user_permissions($request, "Blog@forceDestroy", $post->id))
                        <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-sm btn-danger">
                            <i class="fa fa-times"></i>
                        </button>
                    @else
                        <button title="Delete Permanent" onclick="return false;" type="submit" class="btn btn-sm btn-danger disabled">
                            <i class="fa fa-times"></i>
                        </button>
                    @endif

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