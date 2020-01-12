@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Card Service Exchange</h3>
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

                <div class="post-job">
                   
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="card border-info  mb-3" >
                      <div class="card-body text-info">
                        <h5 class="card-title">About your current card</h5>
                        <ul class="icons">
                            <li><i class="lni-postcard"></i><span>{{$card->card_name}} </span> </li>
                            <li><i class="lni-radio-button"></i><span>Number of position = {{$cmp_resource->used_postion}} </span> </li>
                            <li><i class="lni-reload"></i><span>Number of refresh = {{$cmp_resource->used_refresh}} </span> </li>
                            <li><i class="lni-star-filled"></i><span>Number of topping = {{$cmp_resource->used_topping}} </span> </li>
                            <li><i class="lni-licencse"></i><span>Number of cv = {{$cmp_resource->used_cv}}</span> </li>
                            <li><i class="lni-customer"></i><span>Number of advice = {{$cmp_resource->used_advice}}</span> </li>
                            <li><i class="lni-timer"></i><span>Time you used = {{$cmp_resource->used_time}}</span> </li>
                            <li><i class="lni-investment"></i><span>Price = {{number_format($card->price, 0)}}</span> </li>
                        </ul>
                      </div>
                    </div>
                    </div>


                </div>

                </div>
                <br>
				<div class="post-job box">
				    <h3 class="job-title">Manage your card service</h3>
                    <form class="form-ad" action="{{route('employers.update_card_exchange_posit_to_all')}}" method="post" id="postion_to_all_form">
                        @csrf
                        <input type="hidden" name="cmp_resource_id" 
                         value="{{$cmp_resource->id}}">
                        <div class="row form-group">
                            <div class="col-lg-5 col-md-5 col-xs-12">

                            <label class="form-control">Number of Position</label><br>

                            <textarea name="used_postion" ng-model="used_postion" class="form-control" ng-change="textchange(used_postion)"></textarea>

                            </div>
                            <div class="col-lg-1 col-md-1 col-xs-12">

                                <i class="lni-arrow-right size-lg"></i>

                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">

                            <select ng-model="selecteddestination" name="selecteddestination" value="selecteddestination" ng-change="selectChangedestination()" ng-options="info.values as info.name for info in infos" class="form-control" >
                            </select>  <br>

                            <textarea name="destination_result" ng-model="destination_result" class="form-control" placeholder="Write job category" readonly="readonly"></textarea>

                            </div>                  
                        </div>
                        <button type="submit" class="btn btn-common">Change</button>
                    </form>

				</div>
<br>

                    <div class="post-job box">
                    <h3 class="job-title">Manage your card service</h3>
                    <form class="form-ad" action="{{route('employers.update_card_exchange_all_to_posit')}}" method="post" id="postion_to_all_form">
                        @csrf
                        <input type="hidden" name="cmp_resource_id" value="{{$cmp_resource->id}}">
                        <input type="hidden" name="add_to_source" id="add_to_source">

                        <div class="row form-group">
                            <div class="col-lg-5 col-md-5 col-xs-12">

                            <label class="form-control">Number of Position</label>
                            <br>
                            <textarea name="destination_postion" ng-model="destination_postion" class="form-control"
                             readonly="readonly"></textarea>

                            </div>
                            <div class="col-lg-1 col-md-1 col-xs-12">

                                <i class="lni-arrow-left size-lg"></i>

                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">

                            <select ng-model="selectedsource" name="selectedsource" value="selectedsource" ng-change="selectChangesource()" ng-options="info.values as info.name for info in infos" class="form-control" >
                            </select>
                            <br>
                            <textarea name="source_result" ng-model="source_result" class="form-control" ng-change="textsource(source_result)" placeholder="Write job category"></textarea>
                            

                            </div>                  
                        </div>
                        <button type="submit" class="btn btn-common">Change</button>
                    </form>

                </div>
			</div>
		</div>   
	</div>
</div>

<script src="/js/jquery-min.js"></script>
 

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js">
</script>
<script>
 	var cmp_resource={!! json_encode($cmp_resource) !!};

	var app = angular.module('myApp', []);
	app.config(function($interpolateProvider){
	  $interpolateProvider.startSymbol('<%').endSymbol('%>');
	});

	app.controller('myCtrl', function($scope, $http) {
	var infos = [];
	$scope.cmp_resource = cmp_resource;
	$scope.cmp_resource.used_refresh='used_refresh:'+$scope.cmp_resource.used_refresh;
	$scope.cmp_resource.used_topping='used_topping:'+$scope.cmp_resource.used_topping;
	$scope.cmp_resource.used_cv='used_cv:'+$scope.cmp_resource.used_cv;

	infos.push({'name':'Number of refresh','values':$scope.cmp_resource.used_refresh},
    {'name':'Number of topping','values':$scope.cmp_resource.used_topping},
    {'name':'Number of Cv Download','values':$scope.cmp_resource.used_cv});
    $scope.infos = infos;

//Position to resfresh,topping,cv_down
	$scope.used_postion = $scope.cmp_resource.used_postion;
    $scope.selecteddestination = $scope.infos[0].values;

    var split = $scope.selecteddestination.split(':');
    var name = split[0]; var value = split[1];
    if(name == "used_refresh"){

    	$scope.used_refresh = $scope.used_postion * 16;
    	$scope.destination_result = $scope.used_refresh;
    }
    else if(name == "used_topping"){

    	$scope.used_topping = $scope.used_postion * 1;
    	$scope.destination_result = $scope.used_topping;

    }else{

    	$scope.used_cv = $scope.used_postion * 4;
    	$scope.destination_result = $scope.used_cv;

    }

    $scope.selectChangedestination = function() {
    
    var split = $scope.selecteddestination.split(':');
    var name = split[0]; var value = split[1];
    if(name == "used_refresh"){

    	$scope.used_refresh = $scope.used_postion * 16;
    	$scope.destination_result = $scope.used_refresh;
    }
    else if(name == "used_topping"){

    	$scope.used_topping = $scope.used_postion * 1;
    	$scope.destination_result = $scope.used_topping;

    }else{

    	$scope.used_cv = $scope.used_postion * 4;
    	$scope.destination_result = $scope.used_cv;

    }

    }


    $scope.textchange = function(){

    $scope.change_used_postion = $scope.used_postion;
    // console.log($scope.change_used_postion);
    // console.log($scope.selecteddestination);

    var split = $scope.selecteddestination.split(':');
    var name = split[0]; var value = split[1];
    if(name == "used_refresh"){

    	$scope.used_refresh = $scope.change_used_postion * 16;
    	$scope.destination_result = $scope.used_refresh;
    }
    else if(name == "used_topping"){

    	$scope.used_topping = $scope.change_used_postion * 1;
    	$scope.destination_result = $scope.used_topping;

    }else{

    	$scope.used_cv = $scope.change_used_postion * 4;
    	$scope.destination_result = $scope.used_cv;

    }

    $scope.selectChangedestination = function() {
    
    var split = $scope.selecteddestination.split(':');
    var name = split[0]; var value = split[1];
    if(name == "used_refresh" ){

    	$scope.used_refresh = $scope.change_used_postion * 16;
    	$scope.destination_result = $scope.used_refresh;
    }
    else if(name == "used_topping"){

    	$scope.used_topping = $scope.change_used_postion * 1;
    	$scope.destination_result = $scope.used_topping;

    }else{

    	$scope.used_cv = $scope.change_used_postion * 4;
    	$scope.destination_result = $scope.used_cv;

    }

    }

 	} 

 	//end of postion to all

 	//all to postion


 	$scope.selectedsource = $scope.infos[0].values;

    var split = $scope.selectedsource.split(':');
    var name1 = split[1]; var value1 = split[2];

    if(name1 == "used_refresh"){

    	 $scope.source_result =value1;
    	 var r = Math.floor(value1/16);
    	 var modulus = value1 % 16;
         $('#add_to_source').val('used_refresh:'+modulus);
    	 $scope.destination_postion = r;
    }
    else if(name1 == "used_topping"){

    	 $scope.source_result =value1;
    	 var r = Math.floor(value1/1);
         var modulus = value1 % 1;
         $('#add_to_source').val('used_topping:'+modulus);
    	 $scope.destination_postion = r;

    }else{

    	 $scope.source_result =value1;
    	 var r = Math.floor(value1/4);
    	 var modulus = value1 % 4;
         $('#add_to_source').val('used_cv:'+modulus);
    	 $scope.destination_postion = r;

    }
 

    $scope.selectChangesource = function(){

    var split = $scope.selectedsource.split(':');
    var name1 = split[1]; var value1 = split[2];

    if(name1 == "used_refresh"){

    	 $scope.source_result =value1;
    	 var  r = Math.floor(value1/16);
    	 var modulus = value1 % 16;
    	 $('#add_to_source').val('used_refresh:'+modulus);
    	 $scope.destination_postion = r;
    }
    else if(name1 == "used_topping"){
   
		 $scope.source_result =value1;
    	 var r = Math.floor(value1/1);
         var modulus = value1 % 1;
         $('#add_to_source').val('used_topping:'+modulus);
    	 $scope.destination_postion = r;

    }else{

    	 $scope.source_result =value1;
    	 var r = Math.floor(value1/4);
    	 var modulus = value1 % 4;
    	 $('#add_to_source').val('used_cv:'+modulus);
    	 $scope.destination_postion = r;

    }

    }

    $scope.textsource = function(){

    	$scope.change_source_result = $scope.source_result;

    	var split = $scope.selectedsource.split(':');
    	var name1 = split[1]; var value1 = $scope.change_source_result;

    // console.log($scope.selectedsource);
    if(name1 == "used_refresh"){

    	 $scope.source_result =value1;
    	 var r = Math.floor(value1/16);
    	 var modulus = value1 % 16;
         $('#add_to_source').val('used_refresh:'+modulus);
    	 $scope.destination_postion = r;
    }
    else if(name1 == "used_topping"){

    	 $scope.source_result =value1;
    	 var r = Math.floor(value1/1);
         var modulus = value1 % 1;
         $('#add_to_source').val('used_topping:'+modulus);
    	 $scope.destination_postion = r;

    }else{

    	 $scope.source_result =value1;
    	 var r = Math.floor(value1/4);
    	 var modulus = value1 % 4;
         $('#add_to_source').val('used_cv:'+modulus);
    	 $scope.destination_postion = r;

    }
 		
 	$scope.selectChangesource = function(){

    $scope.change_source_result = $scope.source_result;
    var split = $scope.selectedsource.split(':');
    var name1 = split[1]; var value1 = $scope.change_source_result;

    if(name1 == "used_refresh"){

    	 $scope.source_result =value1;
    	 var  r = Math.floor(value1/16);
    	 var modulus = value1 % 16;
    	 $('#add_to_source').val('used_refresh:'+modulus);
    	 $scope.destination_postion = r;
    }
    else if(name1 == "used_topping"){
   
		 $scope.source_result =value1;
    	 var r = Math.floor(value1/1);
    	 var modulus = value1 % 1;
         $('#add_to_source').val('used_topping:'+modulus);
    	 $scope.destination_postion = r;

    }else{

    	 $scope.source_result =value1;
    	 var r = Math.floor(value1/4);
    	 var modulus = value1 % 4;
         $('#add_to_source').val('used_cv:'+modulus);
    	 $scope.destination_postion = r;

    }

    }


    }
 	//end of position

});
</script>

@notify_js
@notify_render
@endsection