@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Company List</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

@if(count($company_infos)>0)
  <div id="content">
    <div class="container">
      <div class="row justify-content-center">

        <a href="#" class="btn btn-common"  data-toggle="modal" data-target="#CompanyCheckModal" ><i class="lni-pointer"></i> Check</a>       
    
      </div>
      <div class="row justify-content-center">
      <div class="table-responsive-sm table-responsive-md">
      <table class="table table-bordered cmp_table" id="dtBasicExample">
             <thead>
            <tr>
               <th>Company Name</th>
               <th>Account</th>
               <th>Job Category</th>
               <th>No of Employee</th>
               <th>Contact Name</th>
               <th>Contact Phone</th>
               <th>Contact Email</th>
               <th>Location</th>
               <th>licensePhoto</th>
            </tr>
        </thead>
        <tbody>
        @foreach($company_infos as $company_info)
            <tr> 
              @if($company_info->company_correct == 0)
              <td>
                <input type="checkbox" id="{{$company_info->id}}" ng-model="selectedList['{{$company_info->id}}']"
               / checked="">
                <label for="{{$company_info->id}}" class="check">{{$company_info->company_name}} <span id="{{$company_info->id}}"></span></label>
              </td>
              @else
              <td>
                <label for="{{$company_info->id}}" class="check">{{$company_info->company_name}} <span>
                  <i class="fas fa-check-circle" style="color: #3578e5;"></i>
                </span></label>
              </td>
              @endif
                <td>{{$company_info->email}}</td>
                <td>{{$company_info->jobtype}}</td>
                <td>{{$company_info->no_of_employee}}</td>
                <td>{{$company_info->contact_name}}</td>
                <td>{{$company_info->contact_phone}}</td>
                <td>{{$company_info->contact_email}}</td>
                <td>{{$company_info->state_name}},{{$company_info->country_name}}</td>
                <td><img src="/employerPhotos/{{$company_info->licensePhoto}}" width="100" height="
                  100"></td>
            </tr>
       @endforeach
        </tbody>
      </table>
      </div>
      </div>
      </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="CompanyCheckModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Check Company</h4>
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
        <button type="button" class="btn btn-primary" ng-click="correct_company()">Yes</button>
      </div>
    </div>
  </div>
</div>
@else
  <div class="container uncheck_cv">
    <div class="row justify-content-center">
       <img src="https://cdn.dribbble.com/users/25514/screenshots/4276494/vyta_brand_llustration_goals_tracking.gif">
       <p id="p2"><b id="p1">You don't have </b> any company to check !</p> 
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

$('#CompanyCheckModal').on('hidden.bs.modal', function(e) {

        $("#massage").html(" ");
});

$scope.correct_company = function(){

if((Object.values(selectedList).length) <= 0){

    $('#massage').html("<b style='color:red;'> Wait,I think you didn't check anything!</b>");
}
else{

  console.log(selectedList);

  angular.forEach($scope.selectedList, function(selected,company_id) {

    if(selected == true){
        $http({
          method : "GET",
          url : "/api/v1/old_check_value?id="+company_id
        }).then(function mySuccess(response) {
         // console.log(response);
         if(response.data.data.company_correct == 0){

         $http.post('/api/v1/check_company',{

            id : response.data.data.id
      
        }).then(function mySuccess(response) {
    
          if(response.data.data.correct == 1){

            // Unchecks it
            $("#"+response.data.data.id).remove();
            $('#'+response.data.data.id).html('<i class="fas fa-check-circle" style="color: #3578e5;"></i>');
            $('#CompanyCheckModal').modal('hide');

          }
      
       }, function myError(response) {

          console.log(response);

       });


    }
          
          }, function myError(response) {

            console.log(response);
        });

  }
});

}
}
        

  

});
</script>
@notify_js
@notify_render
@endsection