@extends('layouts.app')

@section('content')
    <style>
        .card-weather .card-body:first-child {
            background-image: url(/images/dashboard-image.png);
            height: 500px;
        }
    </style>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <h4 class="card-title">Connect with us</h4>
                    <div class="template-demo">
                        <a target="_blank" href="http://facebook.com" class="btn social-btn btn-rounded btn-facebook">
                            <i class="mdi mdi-facebook"></i>
                        </a>
                        <a target="_blank" href="http://twitter.com" class="btn social-btn btn-rounded btn-twitter">
                            <i class="mdi mdi-twitter"></i>
                        </a>
                        <a target="_blank" href="http://dribble.com" class="btn social-btn btn-rounded btn-dribbble">
                            <i class="mdi mdi-dribbble"></i>
                        </a>
                        <a target="_blank" href="http://linkedin.com" class="btn social-btn btn-rounded btn-linkedin">
                            <i class="mdi mdi-linkedin"></i>
                        </a>
                        <a target="_blank" href="http://google.com" class="btn social-btn btn-rounded btn-google">
                            <i class="mdi mdi-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                <div class="float-left">
                    <i class="mdi mdi-cube text-danger icon-lg"></i>
                </div>
                <div class="float-right">
                    <p class="mb-0 text-right">Translations</p>
                    <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">{{ $allTranslations }}</h3>
                    </div>
                </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total translations
                </p>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Translations</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $weeklyTranslations }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Translations
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                <div class="float-left">
                    <i class="mdi mdi-account-location text-warning icon-lg"></i>
                </div>
                <div class="float-right">
                    <p class="mb-0 text-right">Users</p>
                    <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">{{  $weeklyUsers }}</h3>
                    </div>
                </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Registered users this week
                </p>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Users</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">{{ $allUsers }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> All users in system
                    </p>
                </div>
            </div>
        </div>

        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <!--weather card-->
                <div class="card card-weather">
                    <div class="card-body">
                        <br />
                    </div>
                </div>
                <!--weather card ends-->
            </div>
        </div>
        
        </div>
        </div>
    </div>
@endsection