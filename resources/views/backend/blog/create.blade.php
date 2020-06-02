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
                                <div class="form-group excerpt">
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

                                    <div class='input-group date' id='datetimepicker1'>
                                        {!! Form::text('published_at', null, ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
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

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://placehold.it/200x150&text=No+Image" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('image') !!}</span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>

                                    
                                </div>

                                <hr>


                            </div>
                            <!-- /.card-body -->



                            <div class="card-footer">

                                {!! Form::submit('Create new post', ['class' => 'btn btn-primary']) !!}

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


@include('backend.blog.scripts')