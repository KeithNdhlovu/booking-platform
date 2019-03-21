@extends('layouts.app')

@section('title', 'Showing User ' . $user->name)


@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">User Details</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/users') }}">Users</a></li>
                <li class="breadcrumb-item active">User Details</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row">

        <div class="col-lg-4 col-xlg-4 col-md-5">
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-xlg-4 col-md-5">
          <!-- Column -->
          <div class="card">
              <img class="card-img-top" src="{{ asset('theme/dashboard/assets/images/background/profile-bg.jpg') }}" alt="Card image cap">
              <div class="card-block little-profile text-center">
                  <div class="pro-img"><img src="{{ $user->profile_picture ? route('user.profile-picture', $user->id) : asset('theme/dashboard/assets/images/users/4.jpg') }}" alt="user" /></div>
                  <h3 class="m-b-0">{{ $user->name }}</h3>
                  
                  <p>{{ $user->isAdministrator() ? 'Administrator' : null }}</p>
                  <p>{{ $user->isUser() ? 'User' : null }}</p>
                  <p>{{ $user->isAirportAdmin() ? 'Airport Administrator' : null }}</p>
                  
                  <a href="mailto:{{ $user->email }}" target="_blank" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Contact</a>

                  <br/>
                  <br/>
                  <h3 class="m-b-0">{{ $user->id_number }}</h3>
                  <div class="row text-center m-t-20">
                      <div class="col-lg-6 col-md-6 m-t-20">
                          <h3 class="m-b-0 font-light">{{ $user->first_name }}</h3><small>First Name</small>
                      </div>
                      <div class="col-lg-6 col-md-6 m-t-20">
                          <h3 class="m-b-0 font-light">{{ $user->last_name }}</h3><small>Last Name</small>
                      </div>
                  </div>
                  <div class="row text-center m-t-20">
                      <div class="col-lg-6 col-md-6 m-t-20">
                          <h3 class="m-b-0 font-light">{{ $user->getGender() }}</h3><small>Gender</small>
                      </div>
                      <div class="col-lg-6 col-md-6 m-t-20">
                        <h3 class="m-b-0 font-light">{{ $user->getAge() }}</h3><small>Age</small>
                      </div>
                  </div>
                  <div class="row text-center m-t-20">
                      <div class="col-lg-6 col-md-6 m-t-20">
                          <h3 class="m-b-0 font-light">Joined</h3><small>{{ $user->created_at->format('Y-m-d') }}</small>
                      </div>
                      <div class="col-lg-4 col-md-4 m-t-20">
                          <h3 class="m-b-0 font-light">Updated</h3><small>{{ $user->updated_at->format('Y-m-d') }}</small>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

</div>
@endsection