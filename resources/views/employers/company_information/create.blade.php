@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Create Your account </h3>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Page Header End --> 

    <!-- Content section Start --> 
<section id="content" class="section-padding" ng-app="myApp" ng-controller="myCtrl">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="post-job box">
                <h3 class="job-title">Create Company Information</h3><br>
                    <form class="form-ad" action="{{route('account.save_company_infor')}}" method="post" enctype="multipart/form-data" id="companyInformationform">
                    @csrf
                        <div class="form-group">
                            <label class="control-label">Company Name</label>
                            <input type="text" name="company_name" class="form-control" placeholder="Write company name">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Company Category</label>
                                    <select ng-model="selectedCategory" name="job_category_id" value="selectedCategory" ng-options="category.id as category.name for category in job_categories"  class="form-control" >
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">State</label>
                                    <select ng-model="selectedState" name="state_id" value="selectedState" ng-options="state.id as state.name for state in states"  class="form-control" >
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Man Power</label>
                                    <select ng-model="selectedManPower" name="man_power_id" value="selectedManPower" ng-options="manpower.id as manpower.name for manpower in menpower"  class="form-control" >
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Established Date </label>
                                    <input type="date" name="established_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Facebook Link</label>
                                    <input type="text" name="facebook_link" class="form-control">
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Wechat Link</label>
                                    <input type="text" name="wechat_link" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Contact Name</label>
                                    <input type="text" name="contact_name" class="form-control" min="0">
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Contact Phone</label>
                                    <input type="text" name="contact_phone" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Contact Email</label>
                                    <input type="text" name="contact_email" class="form-control" min="0">
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Company Type</label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" value="foreign" name="company_type" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">Foreign</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" value="local" name="company_type" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Local</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <label class="control-label">Address</label>
                                    <textarea class="form-control" name="address" rows="5" id="what"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">What you do</label>
                                    <textarea class="form-control" name="what_you_do" rows="5" id="what"></textarea>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Why you should</label>
                                    <textarea class="form-control" name="why_should_join" rows="5" id="why"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">Logo</label><br>
                                    <input type="file" name="logo" >
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <label class="control-label">License Photo</label><br>
                                    <input type="file" name="licensePhoto" >
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-common">Add</button>
                    </form>
                </div>
            </div>
        </div>        
    </div>
</section>
<!-- Content section End --> 
<script src="/js/jquery-min.js"></script>
  {!! JsValidator::formRequest('App\Http\Requests\Company_informationRequest','#companyInformationform'); !!} 

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

<script>
    var states={!! json_encode($states) !!};
    var menpower={!! json_encode($menpower) !!};
    var job_categories={!! json_encode($job_categories) !!};
    var user_id={!! json_encode($user_id) !!};

    var app = angular.module('myApp', []);
    app.config(function($interpolateProvider){
      $interpolateProvider.startSymbol('<%').endSymbol('%>');
    });

    app.controller('myCtrl', function($scope, $http) {

     $scope.states = states;
     $scope.menpower = menpower;
     $scope.job_categories = job_categories;
     $scope.selectedState = $scope.states[0].id;
     $scope.selectedManPower = $scope.menpower[0].id;
     $scope.selectedCategory = $scope.job_categories[0].id;
     $scope.user_id = user_id;
    });
</script>

@endsection