@extends('layouts.app')

@section('content')
    <style>
        .landing-image {
            background-image: url(/images/dashboard-image.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
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
            <div class="col-lg-12 grid-margin stretch-card landing-image">
                
            </div>
        </div>
    </div>
@endsection