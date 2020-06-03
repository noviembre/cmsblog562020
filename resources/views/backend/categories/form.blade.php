<div class="row">
    <div class="col-md-6">
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
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif


                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    {{ $category->exists ? 'Update' : 'Save' }}
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-default">
                    Cancel
                </a>

            </div>
        </div>
        <!-- /.card -->
    </div>


</div>