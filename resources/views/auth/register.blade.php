@extends('layouts.appClean')

@section('content')
<div ng-app="registerApp" ng-controller="registerController" class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
    <div class="row w-100">
        <div class="col-sm-6 col-lg-4 mx-auto">
            <!-- <h2 class="text-center mb-4">Register</h2> -->
            <div class="auto-form-wrapper">
                <div class="logo-wrapper">
                    <img class="logo" src="{{ asset('images/logo.png') }}" />
                    <br/><br/>
                </div>
                {!! Form::open(['route' => 'register', 'novalidate'=>'novalidate', 'id'=>'sign_up', 'role' => 'form', 'method' => 'POST', 'enctype' => 'multipart/form-data'] ) !!}
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="form-group">
                            @foreach ($errors->all() as $error)
                                <span class="help-block">
                                    <label class="error">{{ $error }}</label>
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <div ng-if="passwordError" class="form-group">
                        <span class="help-block">
                            <label class="error"><% passwordError %></label>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="id_number"
                            ng-model="id_number" 
                            ng-change="stripID(id_number)"
                            placeholder="ID Number" 
                            required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Gender</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio" style="pointer-events: none">
                                    <label class="form-check-label">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        name="membershipRadios" 
                                        id="membershipRadios1" 
                                        ng-checked="isMale == true"> Male
                                    <i class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-radio" style="pointer-events: none">
                                    <label class="form-check-label">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        name="membershipRadios" 
                                        id="membershipRadios2" 
                                        ng-checked="isMale == false"> Female
                                    <i class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                        <input 
                            type="password" 
                            class="form-control" 
                            name="password" 
                            placeholder="Password"
                            ng-model="password"
                            ng-change="onChangePassword(password)"
                            required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <input 
                            type="password" 
                            class="form-control" 
                            name="password_confirmation" 
                            placeholder="Confirm Password" 
                            ng-model="password_confirmation"
                            ng-change="onChangePassword(password_confirmation)"
                            required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Profile Picture</label>
                      <div class="input-group">
                        <input type="file" name="profile_picture" class="form-control file-upload-info" placeholder="Upload Image">
                      </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary submit-btn btn-block">Register</button>
                    </div>
                    <div class="text-block text-center my-3">
                        <span class="text-small font-weight-semibold">Already have and account ?</span>
                        <a href="{{ url('/login') }}" class="text-black text-small">Login</a>
                    </div>
                {!! Form::close() !!}
            </div>
            <ul class="auth-footer"></ul>
            <p class="footer-text text-center" style="color: black;">© 2018 blasczykowski.io</p>
        </div>
    </div>
</div>
@endsection

@section('script')
    
    <script src="{{ asset('js/angular/angular.min.js') }}"></script>
    <script src="{{ asset('js/angular/angular-sanitize.min.js') }}"></script>
    <script src="{{ asset('js/underscore/underscore.min.js') }}"></script>

    <script>
    (function () {

            // Controller
            var registerApp = angular.module('registerApp', ['ngSanitize'], function($interpolateProvider) {
                $interpolateProvider.startSymbol('<%');
                $interpolateProvider.endSymbol('%>');
            });

            registerApp.controller('registerController', ['$scope','$http', '$window', '$filter','$timeout' , function($scope, $http, $window, $filter, $timeout) {

                $scope.passLength = 0
                $scope.passLengthT = 0;

                $scope.stripID = function(idNumber) {
                    
                    if (idNumber == "") {
                        $scope.student_gender = null;
                        return;
                    }

                    var gender = idNumber.substr(6, 4),
                        dob    = idNumber.substr(0, 6),
                        isMale = null
                        
                    if (gender >= 0000 && gender <= 4999) {
                        isMale = false;
                    } else if (gender >= 5000 && gender <= 9999) {
                        isMale = true;
                    }

                    var data = {
                        dob: dob,
                        gender: isMale ? 'Male' : 'Female'
                    };

                    $scope.isMale = isMale;
                }

                $scope.onChangeTrigger = function(trigger) {
                    console.log("onChangeTrigger", trigger)
                    $timeout(()=> $('#register-death_trigger_id').selectpicker('refresh'));
                };

                $scope.onChangePassword = function(password) {
                    console.log(password)
                    if (password.length < 6) {
                        $scope.passwordError = 'Please enter password with at least 6 characters or more'
                    } else {
                        $scope.passwordError = null
                    }
                };

                $scope.updateQualification = function() {
                    console.log("updateQualification", $scope.qualification)
                };

            }]);
        })();
    </script>
@endsection