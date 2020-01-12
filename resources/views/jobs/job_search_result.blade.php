@extends('layouts.master')

<header id="home" class="hero-area">

@include('layouts.partials.search')


</header>

@section('content')

<!-- Featured Jobs Section Start -->  

<section id="job-listings" class="section ng-cloak">
        <div class="container">
        <div class="section-header">
        <h2 class="section-title"><img src="https://img.icons8.com/ultraviolet/40/000000/search-property.png"> Search Result </h2>
        </div>
        <div class="row" ng-if="search_results.length > 0">
        <div class="col-lg-6 col-md-12 col-xs-12" ng-repeat="z in search_results.slice(((currentPage-1)*itemsPerPage), ((currentPage)*itemsPerPage))">
            
        <a class="job-listings-featured" ng-click="job_detail(z.id,z.company_id)" style="cursor: pointer;">
        <div class="row">
        <div class="col-lg-7 col-md-6 col-xs-12">
        <div class="job-company-logo">
        <img src="/employerPhotos/<% z.company_logo %>" style="width: 50px;">
        </div>
        <div class="job-details">
        <h3><% z.position_name %></h3>
        <span class="company-neme"><i class="lni-restaurant"></i> <% z.company_name %></span>
        <span class="company-neme"><i class="lni-layers"></i> <% z.job_category_name %></span>
        <span class="company-neme"><i class="lni-map-marker"></i> <% z.state_name %></span>
        </div>
        </div>
        <div class="col-lg-5 col-md-6 col-xs-12 text-right">
        <div class="tag-type">
        <sapn class="heart-icon">
        <i class="lni-heart"></i>
        </sapn>
        <span class="full-time">Detail</span>
        </div>
        </div>
        </div>
        </a>
        </div>
       
        <div class="col-lg-12 col-md-12 col-xs-12">

          <pagination class="pagination" total-items="totalItems" ng-model="currentPage" items-per-page="itemsPerPage" previous-text="&lsaquo;" next-text="&rsaquo;"></pagination>

        </div>
        </div>
        </div>
          <div class="container cv_correct">
        <div class="row justify-content-center " ng-if="search_results.length == 0">
         <img src="https://cdn.dribbble.com/users/734476/screenshots/4020070/artboard_15.png"><br>
         <p id="p1" style="color: #596281;">Sorry,we couldn't find anything </p>
         <p id="p2" style="color: #41b5a7;">to match that request!</p> <br>
        </div>
</div>
</section>


    
    <br>
    <!-- Featured Jobs Section End -->  

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.11.0.js"></script>
<script>
 var states={!! json_encode($states) !!};
 var job_cates ={!! json_encode($job_cates) !!};
 var init_postion_name ={!! json_encode($position_name) !!};
 var init_state_id ={!! json_encode($state_id) !!};
 var init_job_cate_id = {!! json_encode($jobcategory_id) !!};

var app = angular.module('myApp', ['ui.bootstrap']);
app.config(function($interpolateProvider){
   $interpolateProvider.startSymbol('<%');
   $interpolateProvider.endSymbol('%>');
});

app.controller('myCtrl', function($scope,$http,$window,$filter) {

$scope.states = states;
$scope.job_cates = job_cates;
$scope.init_postion_name = init_postion_name;
$scope.init_state_id = init_state_id;
$scope.init_job_cate_id = init_job_cate_id;
// alert($scope.init_postion_name);
$scope.position_name=$scope.init_postion_name;
$scope.selectedState = $scope.init_state_id;
$scope.selectedCategory = $scope.init_job_cate_id;

$http.post('/api/v1/serach_positon',{
    position_name:$scope.init_postion_name,
    state_id:$scope.selectedState,
    jobcategory_id:$scope.selectedCategory
  }).then(function mySuccess(response) {

        $scope.results=response.data.data;
        var filtered = $filter('filter')($scope.results,{position_name: $scope.init_postion_name});
        console.log(filtered);
        $scope.search_results = filtered;
        $scope.viewby = 5;
        $scope.totalItems = $scope.search_results.length;
        $scope.currentPage = 1;
        $scope.itemsPerPage = $scope.viewby;


        }, function myError(response) {

          console.log(response);

        });


$scope.search = function(){
  $http.post('/api/v1/serach_positon',{
    position_name:$scope.position_name,
    state_id:$scope.selectedState,
    jobcategory_id:$scope.selectedCategory
  }).then(function mySuccess(response) {

        $scope.results=response.data.data;
        console.log($scope.results);
        // var filtered = $filter('filter')($scope.results,{position_name: $scope.position_name});
        //console.log(filtered);
        $scope.search_results = $scope.results;
        $scope.viewby = 6;
        $scope.totalItems = $scope.search_results.length;
        $scope.currentPage = 1;
        $scope.itemsPerPage = $scope.viewby;
        }, 
        function myError(response) {
          console.log(response);
        });
}

$scope.job_detail= function(id,company_id){

    // alert(company_id);
    window.location.href = window.location.origin + '/jobs/job_details?job_position_id=' + id +'&company_id=' +  company_id;
}


});
</script>  

@endsection