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
                    <a class="btn btn-info btn-sm" href=" {{ route('blog.edit', ['id' => $post->id ]) }}">                                    <i class="fas fa-edit"></i>
                    </a>

                    {!! Form::open([
                      'method' => 'DELETE',
                       'route' => ['blog.destroy', $post->id ]
                   ]) !!}

                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                    </button>

                    {{Form::close()}}


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