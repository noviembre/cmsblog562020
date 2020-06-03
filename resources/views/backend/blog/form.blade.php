<div class="row">
    <div class="col-md-9">
        <div class="card card-primary">
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

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-3">
        <div class="card card-primary">

            <div class="card-body">
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
                            <img src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : 'http://placehold.it/200x150&text=No+Image' }}" alt="...">
                        </div>
                        <br>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                        <div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('image') !!}</span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">

                <div class="pull-left">
                    <a id="draft-btn" class="btn btn-default">Save Draft</a>
                </div>
                <div class="pull-right">
                    {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
                </div>


            </div>

        </div>
    </div>

</div>