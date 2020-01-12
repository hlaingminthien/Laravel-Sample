@extends('layouts.master')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Job Sub Category</h3>
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
					<h3 class="job-title">Edit Sub Category</h3>
					<form class="form-ad" action="{{route('employeers.job_sub_categories.update', ['id' => $edit_job_sub_category->id])}}" method="post" id="job_sub_categoryform">
						@csrf
						<div class="form-group">
							<label class="control-label">Name</label>
							<input type="text" name="name" class="form-control" value="{{$edit_job_sub_category->name}}" placeholder="Write job category">
						</div><br>
						<div class="form-group">
							<label class="control-label">Job Category</label>
							<select ng-model="selectedCategory" name="job_category_id" value="selectedCategory" ng-options="job_category.id as job_category.name for job_category in job_categories"  class="form-control" ></select><br>
						</div>
						<button type="submit" class="btn btn-common">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/js/jquery-min.js"></script>
{!!JsValidator::formRequest('App\Http\Requests\Job_sub_categoryRequest','#job_sub_categoryform');!!}

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
 	var job_categories={!! json_encode($job_categories) !!};
 	var edit_job_sub_category={!! json_encode($edit_job_sub_category) !!};

	var app = angular.module('myApp', []);
	app.config(function($interpolateProvider){
	  	$interpolateProvider.startSymbol('<%').endSymbol('%>');
	});

	app.controller('myCtrl', function($scope, $http) 
	{
		$scope.job_categories = job_categories;
		$scope.selectedCategory = edit_job_sub_category.job_category_id;
		console.log($scope.selectedCategory);
	});
</script>
@notify_js
@notify_render
@endsection
