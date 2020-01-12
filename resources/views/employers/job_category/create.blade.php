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

<div id="content" ng-app="myApp" ng-controller="myCtrl">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="post-job box">
					<h3 class="job-title">Add New Category</h3>
					<form class="form-ad" action="{{route('employeers.job_categories.save')}}" method="post" id="job_categoryform">
						@csrf
						<div class="form-group">
							<label class="control-label">Name</label>
							<input type="text" name="name" class="form-control" placeholder="Write job category">
						</div><br>
						<div class="form-group">
							<label class="control-label">Icon</label>
							<select ng-model="selectedIcon" name="icon_id" value="selectedIcon" ng-options="icon.id as icon.name for icon in icons"  class="form-control" ></select><br>
						</div>
						<button type="submit" class="btn btn-common">Add</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/js/jquery-min.js"></script>
 {!! JsValidator::formRequest('App\Http\Requests\Job_categoryRequest','#job_categoryform'); !!}

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
 	var icons={!! json_encode($icons) !!};

	var app = angular.module('myApp', []);
	app.config(function($interpolateProvider){
	  $interpolateProvider.startSymbol('<%').endSymbol('%>');
	});

	app.controller('myCtrl', function($scope, $http) {

	$scope.icons = icons;
	$scope.selectedIcon = $scope.icons[0].id;
});
</script>

@notify_js
@notify_render
@endsection