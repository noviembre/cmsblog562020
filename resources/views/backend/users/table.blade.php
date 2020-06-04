<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>name</th>
        <th width="150">E-Mail</th>
        <th width="180">action</th>
        <th width="180">Role</th>
    </tr>
    </thead>


    <tbody>

    @foreach($users as $user)

        <tr>

            <td>{{ $user->name }}</td>
            <td> {{ $user->email }} </td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-info btn-sm" href=" {{ route('users.edit', ['id' => $user->id ]) }}">                                    <i class="fas fa-edit"></i>
                    </a>

                    {!! Form::open([
                      'method' => 'DELETE',
                       'route' => ['users.destroy', $user->id ]
                   ]) !!}

                    @if($user->id == config('cms.protected_user_id'))
                        <button onclick="return false" type="submit" class="btn btn-sm btn-default disabled">
                            <i class="fa fa-times"></i>
                        </button>
                    @else

                        <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </button>

                    @endif

                    {{Form::close()}}


                </div>


            </td>
            <td>role</td>




        </tr>

    @endforeach


    </tbody>


    <tfoot>
    <tr>
        <th>name</th>
        <th width="150">E-Mail</th>
        <th width="180">action</th>
        <th width="180">Role</th>
    </tr>
    </tfoot>

</table>