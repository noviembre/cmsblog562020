@extends('layouts.backend.main')

@section('title', 'MyBlog | add new category')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create a category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item">
                                <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">category</a></li>
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
                {!! Form::model($category, [
                              'method' => 'POST',
                              'route' => 'categories.store',
                              'files' => true,
                               'id' => 'category-form'
                ]) !!}

                    @include('backend.categories.form')

                {{Form::close()}}

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection


@include('backend.categories.scripts')