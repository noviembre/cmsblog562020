<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-body">

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::label('name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::label('email') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}

                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    {!! Form::label('password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}

                    @if($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>


                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    {!! Form::label('password_confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                    @if($errors->has('password_confirmation'))
                        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>




            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    {{ $user->exists ? 'Update' : 'Save' }}
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-default">
                    Cancel
                </a>

            </div>
        </div>
        <!-- /.card -->
    </div>


</div>