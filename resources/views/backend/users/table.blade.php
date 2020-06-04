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



                    @if($user->id == 7878787)
                        <button onclick="return false" type="submit" class="btn btn-sm btn-default disabled">
                            <i class="fa fa-times"></i>
                        </button>
                    @else

                        <a href="{{ route('users.confirm', $user->id)}}"  class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </a>

                    @endif


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