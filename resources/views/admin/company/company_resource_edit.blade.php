@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Company Resources</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div uib-alert ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" 
						      close="closeAlert($index)"><% alert.msg %></div>
				<div class="post-job box">
					<h3 class="job-title">Manage Card Service</h3>
					<form class="form-ad" action="{{route('admin.update_company_listresource')}}" method="post" id="companyresourceeditform">
						@csrf
						<input type="hidden" name="id" value="{{$edit_comp_resources->id}}">
						<input type="hidden" name="company_id" value="{{$comp_user_info->company_id}}">
						<input type="hidden" name="user_id" value="{{$comp_user_info->user_id}}">
						<div class="form-group">
							<label class="control-label">Account Name</label>
							<input type="text" name="name" class="form-control" value="{{$comp_user_info->user_name}}" disabled>
						</div><br>
						<div class="form-group">
							<label class="control-label">Company Name</label>
							<input type="text" name="name" class="form-control" value="{{$comp_user_info->company_name}}" disabled>
						</div><br>
						<div class="form-group">
							<label class="control-label">Card Type</label>
							<select ng-model="selectedcard" name="card_id" value="selectedcard" ng-change="selectCardEdit()"  ng-options="card.id as card.card_name for card in cards"  class="form-control" ></select><br>
						</div><br>
						<div class="form-group">
							<div class="row">
							<div class="col-lg-6 col-md-12 col-xs-12">
							<label class="control-label">Number of position that you can use</label>
							<input type="text" name="used_postion" ng-model="used_postion" class="form-control" disabled>
							</div>
							<div class="col-lg-6 col-md-12 col-xs-12">
							<label class="control-label">Number of refresh that you can use</label>
							<input type="text" name="used_refresh" ng-model="used_refresh" class="form-control" disabled>
							</div>
							</div>
						</div><br>
						<div class="form-group">
							<div class="row">
							<div class="col-lg-6 col-md-12 col-xs-12">
							<label class="control-label">Number of topping that you can use(See first)</label>
							<input type="text" name="used_topping" ng-model="used_topping" class="form-control" disabled>
							</div>
							<div class="col-lg-6 col-md-12 col-xs-12">
							<label class="control-label">Number of advice that you can use</label>
							<input type="text" name="used_advice" ng-model="used_advice" class="form-control" disabled>
							</div>
							</div>
						</div><br>
						<div class="form-group">
							<label class="control-label">Number of cv that you can download</label>
							<input type="text" name="used_cv" ng-model="used_cv" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label class="control-label">Limited Time</label>
							<input type="text" name="limit_time" ng-model="limit_time" class="form-control" disabled>
						</div><br>
						<div class="form-group">
							<label class="control-label">Price</label>
							<input type="text" name="price" ng-model="price" class="form-control" disabled>
						</div><br>
						<div class="form-group">
							<label class="control-label">Check by</label>
							<input type="text" name="checkby" class="form-control" value="{{\Auth::user()->name}}" disabled>
						</div>

						<div class="form-group">
						<div class="form-check form-check-inline">
				  		{{ Form::checkbox('active',1,$comp_user_info->active,['class'=>'form-check-input','id'=>'inlineCheckbox1']) }}
  						<label class="form-check-label" for="inlineCheckbox1">Active</label>
						</div>
						</div>
						<button type="button" class="btn btn-common" ng-click="Updateornotcompanyres()">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/js/jquery-min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-2.5.0.js"></script>
<script>
 	var cards={!! json_encode($cards) !!};
 	var edit_comp_resources = {!! json_encode($edit_comp_resources) !!};

	var app = angular.module('myApp', ['ui.bootstrap']);
	app.config(function($interpolateProvider){
	  $interpolateProvider.startSymbol('<%').endSymbol('%>');
	});

	app.controller('myCtrl', function($scope, $http) {

	$scope.cards = cards;
	$scope.edit_comp_resources = edit_comp_resources;
    $scope.selectedcard = $scope.edit_comp_resources.card_id;

    $scope.Updateornotcompanyres = function() {

    if($scope.edit_comp_resources.used_time != 0){
     $scope.alerts=[{type: 'danger',msg: "Company's previous card service is not over expire date!"}];
    }
    else{

    	$('#companyresourceeditform').submit();
    }
    };

    $scope.closeAlert = function(index) {
     $scope.alerts.splice(index, 1);
    };

	
	$http({
          method : "GET",
          url : "/api/v1/get_card_info?card_id="+$scope.selectedcard
     }).then(function mySuccess(response) {

        $scope.card = response.data.data;
        if($scope.card[0].num_of_postion == null) $scope.card[0].num_of_postion = 0;
        if($scope.card[0].num_of_refresh == null) $scope.card[0].num_of_refresh = 0;
        if($scope.card[0].num_of_topping == null) $scope.card[0].num_of_topping = 0;
        if($scope.card[0].num_of_advice == null) $scope.card[0].num_of_advice = 0;
        if($scope.card[0].num_of_cv == null) $scope.card[0].num_of_cv = 0;
        // console.log($scope.card[0].num_of_refresh);

        $scope.used_postion = $scope.card[0].num_of_postion;
        $scope.used_refresh = $scope.card[0].num_of_refresh;
        $scope.used_topping = $scope.card[0].num_of_topping;
        $scope.used_advice = $scope.card[0].num_of_advice;
        $scope.used_cv = $scope.card[0].num_of_cv;
        $scope.limit_time = $scope.card[0].limit_time;
        $scope.price = $scope.card[0].price;
          
      }, function myError(response) {

          console.log(response);

      });	
	



     $scope.selectCardEdit = function(){

     	$http({
          method : "GET",
          url : "/api/v1/get_card_info?card_id="+$scope.selectedcard
     }).then(function mySuccess(response) {

        $scope.card = response.data.data;
        if($scope.card[0].num_of_postion == null) $scope.card[0].num_of_postion = 0;
        if($scope.card[0].num_of_refresh == null) $scope.card[0].num_of_refresh = 0;
        if($scope.card[0].num_of_topping == null) $scope.card[0].num_of_topping = 0;
        if($scope.card[0].num_of_advice == null) $scope.card[0].num_of_advice = 0;
        if($scope.card[0].num_of_cv == null) $scope.card[0].num_of_cv = 0;
        // console.log($scope.card[0].num_of_refresh);
        
        $scope.used_postion = $scope.card[0].num_of_postion;
        $scope.used_refresh = $scope.card[0].num_of_refresh;
        $scope.used_topping = $scope.card[0].num_of_topping;
        $scope.used_advice = $scope.card[0].num_of_advice;
        $scope.used_cv = $scope.card[0].num_of_cv;
        $scope.limit_time = $scope.card[0].limit_time;
        $scope.price = $scope.card[0].price;
      }, function myError(response) {

          console.log(response);

      });

     }

	
});
</script>
@notify_js
@notify_render
@endsection