@extends('layouts.backend.main')

@section('title', 'MyBlog | Index')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">display all blog posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item">
                                <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                            <li class="active breadcrumb-item" >All Posts</li>
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
                    <div class="col-12">

                        <div class="card">


                            <!-- /.card-header -->
                            <div class="card-body">

                                @include('backend.blog.message')


                            @if (!$posts->count())
                                    <div class="alert alert-danger">
                                        <strong>No record found</strong>
                                    </div>
                                @else

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

                                @endif

                            </div>
                            <!-- /.card-body -->


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