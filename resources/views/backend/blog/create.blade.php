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
                {!! Form::model($post, [
                              'method' => 'POST',
                              'route' => 'blog.store',
                              'files' => true,
                               'id' => 'post-form'
                          ]) !!}

                  @include('backend.blog.form')

                {{Form::close()}}

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection


@include('backend.blog.scripts')