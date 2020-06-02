@extends('layouts.backend.main')

@section('title', 'MyBlog | Create')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create a blog post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item">
                                <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                            <li class="active breadcrumb-item" >Create</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card card-primary">


                            <!-- /.card-header -->
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>

                            </div>
                            <!-- /.card-header -->

                            {!! Form::model($post, [
                               'method' => 'POST',
                               'route' => 'blog.store',
                               'files' => true
                           ]) !!}



                            <div class="card-body">

                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    {!! Form::label('title') !!}
                                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                                    @if($errors->has('title'))
                                        <span class="help-block">{{ $errors->first('title') }}</span>
                                    @endif

                                </div>


                                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                    {!! Form::label('slug') !!}
                                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}

                                    @if($errors->has('slug'))
                                        <span class="help-block">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {!! Form::label('excerpt') !!}
                                    {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                    {!! Form::label('body') !!}
                                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                                    @if($errors->has('body'))
                                        <span class="help-block">{{ $errors->first('body') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                                    {!! Form::label('published_at', 'Publish Date') !!}
                                    {!! Form::text('published_at', null, ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}

                                    @if($errors->has('published_at'))
                                        <span class="help-block">{{ $errors->first('published_at') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                    {!! Form::label('category_id', 'Category') !!}
                                    {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose category']) !!}

                                    @if($errors->has('category_id'))
                                        <span class="help-block">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                    {!! Form::label('image', 'Feature Image') !!}
                                    {!! Form::file('image') !!}

                                    @if($errors->has('image'))
                                        <span class="help-block">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <hr>


                            </div>
                            <!-- /.card-body -->



                            <div class="card-footer">

                                {!! Form::submit('Create new post', ['class' => 'btn btn-primary']) !!}
                                {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                            </div>
                            {{Form::close()}}


                        </div>
                        <!-- /.card -->
                    </div>


                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('style')

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('backend/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection
@section('script')

    <!-- DataTables -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->
    {{--<script src="../../dist/js/demo.js"></script>--}}
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection