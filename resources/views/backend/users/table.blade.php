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
    <?php $currentUser = Auth::user() ?>
    @foreach($users as $user)

        <tr>

            <td>{{ $user->name }}</td>
            <td> {{ $user->email }} </td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-info btn-sm" href=" {{ route('users.edit', ['id' => $user->id ]) }}">                                    <i class="fas fa-edit"></i>
                    </a>




                <!-- ahora estan protegido del lado del server y del cliente, ya lo confirme -->
                    @if($user->id == config('cms.default_user_id') || $user->id == $currentUser->id)
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