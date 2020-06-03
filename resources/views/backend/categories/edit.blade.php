@extends('layouts.backend.main')

@section('title', 'MyBlog | Edit')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item">
                                <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">category</a></li>
                            <li class="active breadcrumb-item" >Edit</li>
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
                              'method' => 'PUT',
                              'route' => ['categories.update', $category->id],
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