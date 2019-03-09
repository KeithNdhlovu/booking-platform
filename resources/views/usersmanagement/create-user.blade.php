@extends('layouts.app')

@section('template_title')
  Create New User
@endsection

@section('template_fastload_css')
@endsection

@section('content')

  <div class="container">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="header">
              <h2>CREATE NEW USER</h2>
            </div>

            {!! Form::open(array('action' => 'UsersManagementController@store')) !!}

              <div class="form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
                {!! Form::label('email', trans('forms.create_user_label_email'), array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-12">
                  <div class="input-group">
                    {!! Form::text('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_email'))) !!}
                    <label class="input-group-addon" for="email"><i class="fa fa-fw {{ trans('forms.create_user_icon_email') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('email'))
                    <span class="help-block error">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
                {!! Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-12">
                  <div class="input-group">
                    {!! Form::text('first_name', old('first_name'), array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))) !!}
                    <label class="input-group-addon" for="name"><i class="fa fa-fw {{ trans('forms.create_user_icon_firstname') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('first_name'))
                    <span class="help-block error">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                {!! Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-12">
                  <div class="input-group">
                    {!! Form::text('last_name', old('last_name'), array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
                    <label class="input-group-addon" for="name"><i class="fa fa-fw {{ trans('forms.create_user_icon_lastname') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('last_name'))
                    <span class="help-block error">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback row {{ $errors->has('id_number') ? ' has-error ' : '' }}">
                {!! Form::label('id_number', 'ID Number', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-12">
                  <div class="input-group">
                    {!! Form::text('id_number', old('id_number'), array('id' => 'id_number', 'class' => 'form-control', 'placeholder' => 'ID Number')) !!}
                    <label class="input-group-addon" for="name"><i class="fa fa-fw {{ trans('forms.create_user_icon_lastname') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('id_number'))
                    <span class="help-block error">
                        <strong>{{ $errors->first('id_number') }}</strong>
                    </span>
                  @endif
                </div>
              </div>              

              <div class="form-group has-feedback row {{ $errors->has('role') ? ' has-error ' : '' }}">
                {!! Form::label('role', trans('forms.create_user_label_role'), array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-12">
                  <div class="input-group">
                    <select class="form-control" name="role" id="role">
                      <option value="">{{ trans('forms.create_user_ph_role') }}</option>
                      @if ($roles->count())
                        @foreach($roles as $role)
                          <option value="{{ $role->id }}">{{ $role->slug }}</option>
                        @endforeach
                      @endif
                    </select>
                    <label class="input-group-addon" for="name"><i class="fa fa-fw {{ trans('forms.create_user_icon_role') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('role'))
                    <span class="help-block error">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback row {{ $errors->has('password') ? ' has-error ' : '' }}">
                {!! Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-12">
                  <div class="input-group">
                    {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'))) !!}
                    <label class="input-group-addon" for="password"><i class="fa fa-fw {{ trans('forms.create_user_icon_password') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('password'))
                    <span class="help-block error">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group has-feedback row {{ $errors->has('password_confirmation') ? ' has-error ' : '' }}">
                {!! Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-12">
                  <div class="input-group">
                    {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))) !!}
                    <label class="input-group-addon" for="password_confirmation"><i class="fa fa-fw {{ trans('forms.create_user_icon_pw_confirmation') }}" aria-hidden="true"></i></label>
                  </div>
                  @if ($errors->has('password_confirmation'))
                    <span class="help-block error">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              {!! Form::button('Create User', array('class' => 'btn btn-primary waves-effect','type' => 'submit', )) !!}

            {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('footer_scripts')
@endsection
