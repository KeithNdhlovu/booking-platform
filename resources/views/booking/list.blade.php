@extends('layouts.appCleanBookings')

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Available Flights</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('booking') }}">Booking Form</a></li>
                    <li class="breadcrumb-item active">Available Flights</li>
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
        <!-- Row -->
        <!-- <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('theme/dashboard/assets/images/background/profile-bg.jpg') }}" alt="Card image cap">
                    <div class="card-block little-profile text-center">
                        <div class="pro-img"><img src="{{ asset('theme/dashboard/assets/images/users/4.jpg') }}" alt="user" /></div>
                        <h3 class="m-b-0">Angela Dominic</h3>
                        <p>Web Designer &amp; Developer</p>
                        <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Follow</a>
                        <div class="row text-center m-t-20">
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light">1099</h3><small>Articles</small></div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light">23,469</h3><small>Followers</small></div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light">6035</h3><small>Following</small></div>
                        </div>
                    </div>
				</div>
			</div>
		</div> -->

		<div class="row" ng-app="bookingApp" ng-controller="bookingController">
            <!-- Column -->
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <!-- Column -->
                <div class="card">
                    <div class="card-block bg-info">
                        <h4 class="text-white card-title">Outbound Flights</h4>
                        <h6 class="card-subtitle text-white m-b-0 op-5">Depart Date: {{ $departDate }}</h6>
                    </div>
                    <div class="card-block">
                        <div class="message-box contact-box">
                            <!-- <h2 class="add-ct-btn"><button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></h2> -->
                            <div class="message-widget contact-widget">
								<!-- Message -->
								
                                <a ng-cloack ng-repeat="flight in outboundFlights" href="#">
                                    <div class="user-img"> 
										<img ng-src="/images/carriers/carrier-<% flight.airlineCode %>.png" alt="flight-icon" class="img-circle"> 
										<span class="profile-status online pull-right"></span> 
									</div>
									<div class="mail-contnet">
										<h5><% flight._origin.city + "(" + flight.origCode + ")" %> -> <% flight._destination.city + "(" + flight.destCode + ")" %></h5>
										<h5><% flight.departureDateTime %> -> <% flight.arrivalDateTime %></h5>
										<span class="mail-desc">Class: <% flight.cabinClass %></span>
										<span class="mail-desc">Duration: <% flight._duration %></span>
										<h5>R <% flight._pricing.amount %></h5>
									</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
@endsection
@section('scripts')
	@parent
	<script src="{{ asset('js/angular/angular.min.js') }}"></script>
	<script src="{{ asset('js/angular/angular-sanitize.min.js') }}"></script>
	<script src="{{ asset('js/underscore/underscore.min.js') }}"></script>
	<script src="{{ asset('js/moment/moment.js') }}"></script>

	<script>
    (function () {

            // Controller
            var bookingApp = angular.module('bookingApp', ['ngSanitize'], function($interpolateProvider) {
                $interpolateProvider.startSymbol('<%');
                $interpolateProvider.endSymbol('%>');
            });

            bookingApp.controller('bookingController', ['$scope','$http', '$window', '$filter','$timeout' , function($scope, $http, $window, $filter, $timeout) {
				
				$scope.data = {!! json_encode($data->response) !!};
				$scope.airports = {!! $airports !!};

				// When these two keys exist, then this data if for a return flight
				$scope.isReturn = $scope.data.hasOwnProperty('inboundItineraries') && $scope.data.hasOwnProperty('outboundItineraries')

				$scope.inboundFlights =[];
				$scope.outboundFlights =[];
				
				if ($scope.isReturn) {
					$scope.inboundFlights = _.map($scope.data.inboundItineraries, function(_data, i) {
						let flight = _data.odoList[0].segments[0]
						
						flight._origin = _.findWhere($scope.airports, {code: flight.origCode})
						flight._destination = _.findWhere($scope.airports, {code: flight.destCode})
						flight._duration = moment.duration(flight.duration).hours() + " h" + moment.duration(flight.duration).minutes() + "m"
						flight._pricing = {
							amount: _data.amount,
							currencyCode: _data.currencyCode,
							decimalPlaces: _data.decimalPlaces,
						};

						flight.departureDateTime = moment(flight.departureDateTime).format('LLL')
						flight.arrivalDateTime = moment(flight.arrivalDateTime).format('LLL')

						return flight;
					});


					// $scope.outboundFlights = $scope.data.outboundItineraries;
					$scope.outboundFlights = _.map($scope.data.outboundItineraries, function(_data, i) {
						let flight = _data.odoList[0].segments[0]
						
						flight._origin = _.findWhere($scope.airports, {code: flight.origCode})
						flight._destination = _.findWhere($scope.airports, {code: flight.destCode})
						flight._duration = moment.duration(flight.duration).hours() + " h" + moment.duration(flight.duration).minutes() + "m"
						flight._pricing = {
							amount: _data.amount,
							currencyCode: _data.currencyCode,
							decimalPlaces: _data.decimalPlaces,
						};

						flight.departureDateTime = moment(flight.departureDateTime).format('LLL')
						flight.arrivalDateTime = moment(flight.arrivalDateTime).format('LLL')

						return flight;
					});

				} else {
					$scope.outboundFlights = $scope.data.itineraries;
				}

            }]);
        })();
    </script>
@endsection