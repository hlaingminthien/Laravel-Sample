@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>Job Category</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

	<div id="content" >
	<div class="container">
	<div class="row">

	<div class="col-lg-4 col-md-12 col-xs-12">
		
	 @include('admin.partials.sidebar')
	
	</div>

<div class="col-lg-8 col-md-12 col-xs-12">
	<div class="post-job box" ng-app="myApp" ng-controller="myCtrl">
		<h3 class="job-title">Add New Townships</h3>
		<form class="form-ad" action="{{route('admin.townships.save')}}" method="post" id="townshipform">
		<div class="form-group">
		<label class="control-label">State</label>

		<select ng-model="selectedState" name="state_id" value="selectedState" ng-change="selectChange()" ng-options="state.id as state.name for state in states" class="form-control" >
        </select>

		</div>
		<div class="form-group">
		<label class="control-label">City</label>

		<select ng-model="selectedCity" name="city_id" value="selectedCity"  ng-options="city.id as city.name for city in cities"  class="form-control" >
        </select>

		</div>
		<div class="form-group">
		<label class="control-label">Township Name</label>
		<input type="text" name="name" class="form-control" placeholder="Write Township Name">
		</div>
		<button type="submit" class="btn btn-common">Add</button>
		</form>
		</div>
	</div>
</div>  
</div>
</div>
<script src="/js/jquery-min.js"></script>
{!! JsValidator::formRequest('App\Http\Requests\TownshipRequest','#townshipform'); !!}
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
 	var states={!! json_encode($states) !!};
 	var cities={!! json_encode($cities) !!};

var app = angular.module('myApp', []);
app.config(function($interpolateProvider){
  $interpolateProvider.startSymbol('<%').endSymbol('%>');
});

app.controller('myCtrl', function($scope, $http) {

$scope.states = states;
$scope.cities = cities;
$scope.selectedState = $scope.states[0].id;

 	$http({
          method : "GET",
          url : "/api/v1/get_city?state_id="+$scope.selectedState
        }).then(function mySuccess(response) {
        	$scope.cities = response.data.data;
        	$scope.selectedCity = $scope.cities[0].id;
          
          }, function myError(response) {

          	console.log(response);
        });

$scope.selectChange = function(){

$http({
          method : "GET",
          url : "/api/v1/get_city?state_id="+$scope.selectedState
        }).then(function mySuccess(response) {
        	$scope.cities = response.data.data;
        	$scope.selectedCity = $scope.cities[0].id;
          
          }, function myError(response) {

          	console.log(response);
        });


 }


        
});
</script>

@endsection