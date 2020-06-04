@extends('layouts.backend.main')

@section('title', 'MyBlog | delete confirmation')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">delete confirmation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item">
                                <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">user</a></li>
                            <li class="active breadcrumb-item" >delete confirmation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                {!! Form::model($user, [
                          'method' => 'DELETE',
                          'route' => ['users.destroy', $user->id]

                ]) !!}



                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <p>You have specified this user for deletion:</p>

                                <p>ID #{{ $user->id }}: {{ $user->name }}</p>

                                <p>What should be done with content own by this user?</p>

                                <p><input type="radio" name="delete_option" value="delete" checked>Delete All Content</p>

                                <p>
                                    <input type="radio" name="delete_option" value="attribute">
                                    Attribute content to:
                                    {!! Form::select('selected_user', $list_users_except_current, null) !!}

                                </p>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger">
                                        Confirm Deletion
                                    </button>
                                    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                {{Form::close()}}

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection