<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-body">

                <div class="form-group">
                    {!! Form::label('title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}

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