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
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30"> <img src="{{ route('public.profile-picture') }}" class="img-circle" width="150">
                        <h4 class="card-title m-t-10">{{ Auth::user()->first_name .' '. Auth::user()->last_name }}</h4>
                        <h6 class="card-subtitle">{{ Auth::user()->isAdministrator() ? 'Administrator' : 'User' }}</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    {!! Form::model($user, array('class'=>"form-horizontal form-material", 'action' => array('UsersManagementController@update', $user->id), 'method' => 'PUT')) !!}
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-12">E mail</label>
                            <div class="col-md-12">
                                {!! Form::text('email', old('email'), array('id' => 'email', 'class' => 'form-control form-control-line', 'placeholder' => 'Email')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">First Name</label>
                            <div class="col-md-12">
                              {!! Form::text('first_name', old('first_name'), array('id' => 'first_name', 'class' => 'form-control form-control-line', 'placeholder' => 'First Name')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Last Name</label>
                            <div class="col-md-12">
                              {!! Form::text('last_name', old('last_name'), array('id' => 'last_name', 'class' => 'form-control form-control-line', 'placeholder' => 'Last Name')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">ID Number</label>
                            <div class="col-md-12">
                              {!! Form::text('id_number', old('id_number'), array('disabled'=>'', 'id' => 'id_number', 'class' => 'form-control form-control-line', 'placeholder' => 'ID Number')) !!}
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Message</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Select Country</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line">
                                    <option>London</option>
                                    <option>India</option>
                                    <option>Usa</option>
                                    <option>Canada</option>
                                    <option>Thailand</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update Profile</button>
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
@endsection