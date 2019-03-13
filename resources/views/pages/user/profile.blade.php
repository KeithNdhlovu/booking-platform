@extends('layouts.app')

@section('title', 'Showing User ' . $user->name)


@section('content')

  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    @if(Session::has('success'))
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body bg-success">
                    <div class="col-12">
                        <br/>
                        <h2 class="text-white">
                            {{ Session::get('success') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body bg-danger">
                    <div class="col-12">
                        <br/>
                        @foreach ($errors->all() as $error)
                            <p class="text-white">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30"> <img src="{{ route('public.profile-picture') }}" class="img-circle" width="150">
                        <h4 class="card-title m-t-10">{{ Auth::user()->first_name .' '. Auth::user()->last_name }}</h4>
                        <h6 class="card-subtitle">{{ Auth::user()->isAdministrator() ? 'Administrator' : 'User' }}</h6>
                        <!-- <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div> -->
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    {!! Form::model($user, array('action' => array('UsersManagementController@update', $user->id), 'method' => 'PUT')) !!}

                        {!! csrf_field() !!}

                        <div class="form-group {{ $errors->has('email') ? ' has-error ' : '' }}">
                            {!! Form::label('email', 'E-mail' , array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-xs-12">
                                <div class="form-line">
                                    {!! Form::text('email', old('email'), array('autocomplete' => 'off', 'id' => 'email', 'class' => 'form-control form-control-line', 'placeholder' => trans('forms.ph-useremail'))) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('first_name') ? ' has-error ' : '' }}">
                            {!! Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-xs-12">
                            <div class="form-line">
                                {!! Form::text('first_name', NULL, array('autocomplete' => 'off', 'id' => 'first_name', 'class' => 'form-control form-control-line', 'placeholder' => trans('forms.create_user_ph_firstname'))) !!}
                            </div>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                            {!! Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-xs-12">
                            <div class="form-line">
                                {!! Form::text('last_name', NULL, array('autocomplete' => 'off', 'id' => 'last_name', 'class' => 'form-control form-control-line', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
                            </div>
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('id_number') ? ' has-error ' : '' }}">
                            {!! Form::label('id_number', 'ID Number', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-xs-12">
                            <div class="form-line">
                                {!! Form::text('id_number', NULL, array('id' => 'id_number', 'class' => 'form-control form-control-line', 'placeholder' => 'ID Number')) !!}
                            </div>
                            @if ($errors->has('id_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_number') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="pw-change-container">
                            <div class="form-group">
                            {!! Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-xs-12">
                                <div class="form-line">
                                {!! Form::password('password', array('autocomplete' => 'off', 'id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'))) !!}
                                </div>
                            </div>
                            </div>

                            <div class="form-group">
                            {!! Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-xs-12">
                                <div class="form-line">
                                {!! Form::password('password_confirmation', array('autocomplete' => 'off', 'id' => 'password_confirmation', 'class' => 'form-control form-control-line', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))) !!}
                                
                                </div>
                            </div>
                            </div>
                        </div>
                                            
                        <div class="form-group">
                            {!! Form::label('', '', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-xs-12">
                            {!! Form::button('<i class="fa fa-fw fa-save" aria-hidden="true"></i> Save Changes', array('class' => 'btn btn-success btn-block margin-bottom-1 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => trans('modals.edit_user__modal_text_confirm_title'), 'data-message' => trans('modals.edit_user__modal_text_confirm_message'))) !!}
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
  </div>

  @include('modals.modal-save')
  @include('modals.modal-delete')
@endsection

@section('scripts')

  @include('scripts.save-modal-script')

@endsection