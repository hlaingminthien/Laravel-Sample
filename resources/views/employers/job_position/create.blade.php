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
					<h3 class="job-title">Add New Position</h3>
						<form class="form-ad" action="{{route('employeers.job_positions.save')}}" method="post" id="jobPositionform">
						@csrf
							<div class="form-group">
								<label class="control-label">Position Name</label>
								<input type="text" name="position_name" class="form-control">
							</div><br>
							<div class="form-group">
								<!-- <div class="row">
	                                <div class="col-lg-6 col-md-12 col-xs-12"> -->
	                                    <label class="control-label">Job Category</label>
										<select ng-model="selectedCategory" name="jobcategory_id" value="selectedCategory" ng-options="category.id as category.name for category in job_categories"  class="form-control" ></select>
	                                <!-- </div>
	                                <div class="col-lg-6 col-md-12 col-xs-12">
	                                    <label class="control-label">Job Sub Category</label>
										<select ng-model="selectedSubCategory" name="job_sub_category_id" value="selectedSubCategory" ng-options="subCategory.id as subCategory.name for subCategory in job_sub_categories"  class="form-control"></select>
	                                </div>
                            	</div> -->
							</div><br>
							<div class="form-group">
								<label class="control-label">Experience Level</label>
								<select ng-model="selectedExperLevel" name="exper_id" value="selectedExperLevel" ng-options="exper.id as exper.name for exper in experienceLevel" class="form-control" >
								</select><br>
							</div>
							<div class="form-group">
								<label class="control-label">Age</label>
								<input type="text" name="age" class="form-control">
							</div><br>
							<section id="editor">
								<div class="form-group">
									<label>Job Requirement</label>
									<textarea class="form-control" name="job_requirement" rows="5"></textarea>
								</div>
								<div class="form-group">
									<label for="comment">Job Description</label>
									<textarea class="form-control" name="job_description" rows="5"></textarea>
								</div>
								<div class="form-group">
									<label >Salary</label>
									<input type="text" class="form-control" name="salary" >
								</div>
								<div class="form-group">
									<label for="offer_employee_count">Employee Count</label>
									<input type="number" class="form-control" name="offer_employee_count" id="offer_employee_count">
								</div>
								<div class="form-group">
									<label class="control-label">State</label>
									<select ng-model="selectedState" name="state_id" value="selectedState" ng-options="state.id as state.name for state in states" class="form-control" >
        							</select><br>
								</div>
								<div class="form-group">
									<label>Job Time</label>
									<input class="form-control" name="job_time" >
								</div>
								<div class="form-group">
									<label>Job Benefits</label>
									<textarea class="form-control" name="benefits" rows="5" ></textarea>
								</div>
								<div class="form-group">
									<label>Others</label>
									<textarea class="form-control" name="others" rows="5" id="comment"></textarea>
								</div>
								<div class="form-group">
									<div class="custom-control custom-radio custom-control-inline">
		  								<input type="radio" id="customRadioInline1" value="male" name="gender" class="custom-control-input">
		  								<label class="custom-control-label" for="customRadioInline1">Male</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
		  								<input type="radio" id="customRadioInline2" value="female" name="gender" class="custom-control-input">
		  								<label class="custom-control-label" for="customRadioInline2">Female</label>
									</div>
								</div>
							</section>
							<button type="submit" class="btn btn-common">Add</button>
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
 	var experienceLevel={!! json_encode($experienceLevel) !!};
 	var job_categories={!! json_encode($job_categories) !!};
 	var job_sub_categories={!! json_encode($job_sub_categories) !!};


	var app = angular.module('myApp', []);
	app.config(function($interpolateProvider){
	  $interpolateProvider.startSymbol('<%').endSymbol('%>');
	});

	app.controller('myCtrl', function($scope, $http) {

	$scope.states = states;
	$scope.experienceLevel = experienceLevel;
	$scope.job_categories = job_categories;
	$scope.job_sub_categories = job_sub_categories;
	$scope.selectedCategory = $scope.job_categories[0].id;
	$scope.selectedState = $scope.states[0].id;
	$scope.selectedExperLevel = $scope.experienceLevel[0].id;
	$scope.selectedSubCategory = $scope.job_sub_categories[0].id;
});
</script>
@notify_js
@notify_render
@endsection