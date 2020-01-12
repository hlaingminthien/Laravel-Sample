@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Position Level</h3>
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
					<h3 class="job-title">Edit Position Level</h3>
					<form class="form-ad" action="{{route('employeers.position_levels.update',['id' => $edit_position_level->id])}}" method="post" id="position_levelform">
						@csrf
						<div class="form-group">
							<label class="control-label">Name</label>
							<input type="text" name="name" class="form-control" value="{{$edit_position_level->name}}" placeholder="Write Position Level">
						</div><br>
						
						<button type="submit" class="btn btn-common">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/js/jquery-min.js"></script>
 {!! JsValidator::formRequest('App\Http\Requests\Position_levelRequest','#position_levelform'); !!}

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
 	
 	var edit_position_level={!! json_encode($edit_position_level) !!};

	var app = angular.module('myApp', []);
	app.config(function($interpolateProvider){
	  $interpolateProvider.startSymbol('<%').endSymbol('%>');
	});

	app.controller('myCtrl', function($scope, $http) {

	
});
</script>
@notify_js
@notify_render
@endsection
