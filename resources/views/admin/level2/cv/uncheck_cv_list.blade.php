@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- MDBootstrap Datatables  -->
<!-- <link href="/mdcss/addons/datatables.min.css" rel="stylesheet"> -->
 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>CV List</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 
@if(count($cv_infos)>0)
<div id="content">
      <div class="container">
      <div class="row justify-content-center">
        <a href="#" class="btn btn-common"  data-toggle="modal" data-target="#CVCheckModal"><i class="lni-pointer"></i> Check</a>     
      </div>
      <div class="row justify-content-center">
      <div class="table-responsive-sm table-responsive-md">
      <table class="table table-bordered cmp_table" id="dtBasicExample">
             <thead>
            <tr>
               <th>Employee Name</th>
               <th>Job Position</th>
               <th>Job Category</th>
               <th>Experience Level</th>
               <th>Location</th>
               <th>Expected Salary</th>
               <th>Education</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cv_infos as $cv_info)
            <tr>
              @if($cv_info->cv_correct == 0)
              <td>
                <input type="checkbox" id="{{$cv_info->id}}" ng-model="selectedList['{{$cv_info->id}}']"
                >
                <label for="{{$cv_info->id}}" class="check">{{$cv_info->name}} <span id="{{$cv_info->id}}"></span></label>
              </td>
              @else
              <td>
                <label for="{{$cv_info->id}}" class="check">{{$cv_info->name}} <span>
                  <i class="fas fa-check-circle" style="color: #3578e5;"></i>
                </span></label>
              </td>
              @endif
                <td>{{$cv_info->job_position}}</td>
                <td>{{$cv_info->jobcate}}</td>
                <td>{{$cv_info->explevel}}</td>
                <td>{{$cv_info->state_name}}</td>
                <td>{{number_format($cv_info->expected_salary, 0)}}</td>
                <td>{{$cv_info->education}}</td>
                <td>
                 <a href="{{ route('admin.unchek_cv_detail',['id'=>$cv_info->id])}}" class="btn-added">
                 <i class="lni-search"></i>View</a>
                   

                </td>
            </tr>
       @endforeach
        </tbody>
      </table>
      </div>
      </div>
      </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="CVCheckModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Check CV</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <p style="font-size: 15px;color: black;">Are you sure it is correct?</p>
         <p style="font-size: 15px;color: red;" id="massage"></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" ng-click="correct_cv()">Yes</button>
      </div>
    </div>
  </div>
</div>
  
@else

<div class="container uncheck_cv">
    <div class="row justify-content-center">
       <img src="https://cdn.dribbble.com/users/734476/screenshots/4020070/artboard_15.png">
        <p id="p1" style="color: #596281;">There is no cv form to check </p> <br>
        <p id="p2" style="color: #41b5a7;">at this moment!</p>
    </div>
</div>
  <br>

@endif
<script src="/js/jquery-min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
$(document).ready(function () {

    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });


var app = angular.module('myApp', []);
  app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%').endSymbol('%>');
  });

app.controller('myCtrl', function($scope,$http,$filter) {
const selectedList = {};
const filterList = {};
$scope.selectedList = selectedList;
$scope.filterList =filterList;

$('#CVCheckModal').on('hidden.bs.modal', function(e) {

        $("#massage").html(" ");
});


$scope.correct_cv = function(){

console.log($scope.selectedList);

if((Object.values(selectedList).length) <= 0){

    $('#massage').html("<b style='color:red;'> Wait,I think you didn't check anything!</b>");
}
else{

  $('#massage').html("");
angular.forEach($scope.selectedList,function(selected,cv_id) {

        $http({
          method : "GET",
          url : "/api/v1/old_check_cv_value?id="+cv_id
        }).then(function mySuccess(response) {
         // console.log(response);
         if(response.data.data.cv_correct == 0){

         $http.post('/api/v1/check_cv',{

            id : response.data.data.id
      
        }).then(function mySuccess(response) {
    
          if(response.data.data.correct == 1){

            // Unchecks it
            $("#"+response.data.data.id).remove();
            $('#'+response.data.data.id).html('<i class="fas fa-check-circle" style="color: #3578e5;"></i>');
            $('#CVCheckModal').modal('hide');
          }
      
       }, function myError(response) {

          console.log(response);

       });
    }         
          }, function myError(response) {

            console.log(response);
        });
  
});
  }    

  }

});
</script>
@notify_js
@notify_render
@endsection