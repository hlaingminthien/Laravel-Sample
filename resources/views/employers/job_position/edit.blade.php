@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Job Position</h3>
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
					<h3 class="job-title">Edit Position</h3>
					<form class="form-ad" action="{{route('employeers.job_positions.update', ['id' => $edit_job_position->id])}}" method="post" id="job_positionform">
						@csrf
						<div class="form-group">
							<label class="control-label">Position Name</label>
							<input type="text" name="position_name" value="{{$edit_job_position->position_name}}" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Job Code</label>
							<input type="text" name="job_code_id" value="{{$edit_job_position->job_code_id}}" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Job Category</label>
							<select ng-model="selectedCategory" name="jobcategory_id" value="selectedCategory" ng-options="category.id as category.name for category in job_categories" class="form-control" >
					        </select>
						</div>
						<div class="form-group">
							<label class="control-label">Experience Level</label>
							<select ng-model="selectedExperLevel" name="exper_id" value="selectedExperLevel" ng-options="exper.id as exper.name for exper in experienceLevel" class="form-control" >
							</select><br>
						</div>
						<div class="form-group">
							<label for="job_requirement">Job Requirement</label>
							<textarea class="form-control" value="{{$edit_job_position->job_requirement}}" name="job_requirement" rows="5" id="job_requirement">{{$edit_job_position->job_requirement}}</textarea>
						</div>
						<div class="form-group">
							<label for="job_description">Job Description</label>
							<textarea class="form-control" value="{{$edit_job_position->job_description}}" name="job_description" rows="5" id="job_description">{{$edit_job_position->job_description}}</textarea>
						</div>
						<div class="form-group">
							<label for="salary">Salary</label>
							<input type="number" class="form-control" value="{{$edit_job_position->salary}}" name="salary" rows="5" id="salary">
						</div>
						<div class="form-group">
							<label for="salary">Employee Count</label>
							<input type="number" class="form-control" value="{{$edit_job_position->offer_employee_count}}" name="offer_employee_count" rows="5" id="offer_employee_count">
						</div>
						<div class="form-group">
							<label class="control-label">State</label>
							<select ng-model="selectedState" name="state_id" value="selectedState" ng-options="state.id as state.name for state in states" class="form-control" >
					        </select>
						</div>
						<div class="form-group">
							<label for="job_time">Job Time</label>
							<input class="form-control" value="{{$edit_job_position->job_time}}" name="job_time" id="job_time">
						</div>
						<div class="form-group">
							<label for="benefits">Job Benefits</label>
							<textarea class="form-control" name="benefits" rows="5" id="benefits">{{$edit_job_position->benefits}}</textarea>
						</div>
						<div class="form-group">
							<label for="others">Others</label>
							<textarea class="form-control" name="others" rows="5" id="others">{{$edit_job_position->others}}</textarea>
						</div>
						<div class="form-group">
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="customRadioInline1" value="male" name="gender" class="custom-control-input" {{($edit_job_position->gender=="male")? "checked":""}}>
							  <label class="custom-control-label" for="customRadioInline1">Male</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="customRadioInline2" value="female" name="gender" class="custom-control-input" {{($edit_job_position->gender=="female")? "checked":""}}>
							  <label class="custom-control-label" for="customRadioInline2">Female</label>
							</div>
						</div>
						<button type="submit" class="btn btn-common">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/js/jquery-min.js"></script>
{!! JsValidator::formRequest('App\Http\Requests\Job_positionRequest','#jobPositionform'); !!} 
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
 	var states={!! json_encode($states) !!};
 	var job_categories={!! json_encode($job_categories) !!};
 	var job_position={!! json_encode($edit_job_position) !!};
 	var experienceLevel={!! json_encode($experienceLevel) !!};

var app = angular.module('myApp', []);
app.config(function($interpolateProvider){
  $interpolateProvider.startSymbol('<%').endSymbol('%>');
});

app.controller('myCtrl', function($scope, $http) {

	$scope.states = states;
	$scope.job_categories = job_categories;
	$scope.experienceLevel=experienceLevel;
	$scope.selectedCategory = job_position.jobcategory_id;
	$scope.selectedState = job_position.state_id;
	$scope.selectedExperLevel = job_position.exper_id;
});
</script>
@notify_js
@notify_render
@endsection