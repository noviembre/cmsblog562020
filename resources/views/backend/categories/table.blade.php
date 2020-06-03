<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>name</th>
        <th width="100">Post count</th>
        <th width="180">Action</th>
    </tr>
    </thead>


    <tbody>

    @foreach($categories as $category)

        <tr>

            <td>{{ $category->title }}</td>
            <td> {{ $category->posts->count() }} </td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-info btn-sm" href=" {{ route('categories.edit', ['id' => $category->id ]) }}">                                    <i class="fas fa-edit"></i>
                    </a>

                    {!! Form::open([
                      'method' => 'DELETE',
                       'route' => ['categories.destroy', $category->id ]
                   ]) !!}

                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                    </button>

                    {{Form::close()}}


                </div>


            </td>




        </tr>

    @endforeach


    </tbody>


    <tfoot>
    <tr>
        <th>name</th>
        <th width="100">Post count</th>
        <th width="180">Action</th>
    </tr>
    </tfoot>

</table>