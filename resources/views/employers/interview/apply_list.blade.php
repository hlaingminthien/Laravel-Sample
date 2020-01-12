@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Apply List</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

@if(count($apply_lists)>0)
  <div id="content" ng-app="myApp" ng-controller="myCtrl">
    <div class="container">
      <div class="row justify-content-center">
        <div class="table-responsive-sm table-responsive-md">
          <table class="table table-bordered cmp_table" id="dtBasicExample">
            <thead>
              <tr>
                 <th>Interview</th>
                 <th>User Name</th>
                 <th>Job Position</th>
                 <th>Education</th>
                 <th>Expected Salary</th>
                 <th>State Name</th>
                 <th>Apply Time</th>
                 <th>By </th>
                 <th>Action</th>
              </tr>
            </thead>
          <tbody>
          @foreach($apply_lists as $apply_list)
            <tr>
              <td>
                {{ Form::checkbox('has_interview',1,$apply_list->has_interview) }} <a href="#" class="btn-added">
                  <span>Has interview</span></a>
              </td>
              <td>
                {{$apply_list->user_name}}</td>
              <td>{{$apply_list->position_name}}</td>
              <td>{{$apply_list->education}}</td>
              <td>{{number_format($apply_list->expected_salary, 0)}} MMK</td>
              <td>{{$apply_list->state_name}}</td>
              <td>{{$apply_list->apply_time}}</td>
              @if($apply_list->by_apply_this_cmp == 0)
              <td>employee</td>
              @else
              <td> downloaded and offer by your company </td>
              @endif
              <td>
                @if($apply_list->has_interview == 0 && $apply_list->finish == null)
                <a href="#" class="btn-added" data-toggle="modal" data-target="#set_interview_modal_{{$apply_list->id}}">
                   <i class="far fa-calendar"></i> <span>call_interview </span>
                </a>
                @elseif($apply_list->has_interview == 0 && $apply_list->finish == 1)
                @if($apply_list->offer_id == null)
                <a href="#" class="btn-added" data-toggle="modal" data-target="#set_interview_modal_{{$apply_list->id}}">
                  <i class="far fa-calendar"></i> <span>call_interview</span>
                </a>
                <br>
                <a href="{{route('employers.interview_result_create',['apply_id'=>$apply_list->id,'user_name'=>$apply_list->user_name,'position_name'=>$apply_list->position_name])}}">
                 <i class="fas fa-list-ul"></i>  Result  
                </a><br>
                <a href="#" data-toggle="modal" ng-click="setOffer('{{$apply_list->id}}')"
                  data-target="#OfferCvByCompany_{{$apply_list->id}}">
                 <i class="lni-timer"></i> Give offer-letter
                </a>
                @else
                <a href="{{route('employers.interview_result_create',['apply_id'=>$apply_list->id,'user_name'=>$apply_list->user_name,'position_name'=>$apply_list->position_name])}}">
                 <i class="fas fa-list-ul"></i>  Result  
                </a><br>
                <a href="#" data-toggle="modal" ng-click="displayOffer('{{$apply_list->id}}')" data-target="#OfferDetail_{{$apply_list->id}}">
                 <i class="fas fa-info-circle"></i> Offer Detail
                </a>
                @endif
                @else
                <a href="{{route('employers.interview_result_create',['apply_id'=>$apply_list->id,'user_name'=>$apply_list->user_name,'position_name'=>$apply_list->position_name])}}">
                 <i class="lni-timer"></i> Interview Detail  
                </a>
                @endif
              </td>
            </tr>


            <!-- Set Inerview Save Modal -->
            <div class="modal fade" id="set_interview_modal_{{$apply_list->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Call Interview</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form id="set_interview" name="set_interview_form" action="{{route('employers.call_interview')}}" method="post">
                  @csrf
                    <input type="hidden" name="apply_id" value="{{$apply_list->id}}">
                    <div class="modal-body">
                    <!-- start -->
                      <div class="form-ad">
                        <div class="form-group">
                          <label for="Interview">Choose Interview</label>
                          <select class="form-control" id="Interview" name="interview_id">
                            @foreach($interviews as $interview)
                            <option value="{{$interview->id}}">{{$interview->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    <!-- end -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Call Interview</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>  
            <!-- end modal  -->

            <!-- Set Offer Save Modal -->
            <div class="modal fade" id="OfferCvByCompany_{{$apply_list->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">New Offer Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="offer_form" name="offercv">
                  @csrf
                    <div class="form-ad">
                      <div class="form-group">
                        <label class="control-label">Cv's job position</label>
                        <input type="text" name="position_name" ng-model="position_name" class="form-control" disabled>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Cv's job category</label>
                        <input type="text" name="job_category_name" ng-model="job_category_name" class="form-control" disabled>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Job position on cv's job category</label>
                        <select ng-model="selectedposition" name="job_position_id" ng-options="job.id as job.position_name for job in jobs" class="form-control" ng-change="selectChange()">
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Salary</label>
                        <input type="text" name="salary" ng-model="salary" class="form-control" disabled>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Start Date</label>
                        <input type="date" name="start_date" ng-model="start_date" 
                        class="form-control" id="myDate" required>
                        <div style="color:red" ng-show="!offercv.start_date.$dirty && start_date==undefined" id="start_date_error">
                          <h5></h5>
                        </div>
                        <div style="color:red" ng-show="offercv.start_date.$dirty && offercv.start_date.$invalid">
                          <span ng-show="offercv.start_date.$error.required">Start Date is required.</span>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" ng-click="saveOffer('{{$apply_list->id}}')" class="btn btn-primary">save</button>
                </div>
              </div>
            </div>
            </div>
          <!-- endmodal -->

          <!-- offer detail -->
          <div class="modal fade bd-example-modal " id = "OfferDetail_{{$apply_list->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered-sm " role="document">
              <div class="modal-content customModal">
                <div class="modal-header">
                    <h6 class="modal-title " id="exampleModalLongTitle">
                      <img src="https://img.icons8.com/bubbles/50/000000/man-in-blue-jacket-information.png">
                     Offer Information</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row ">
                    <div class="col-lg-12  ">
                     <p><img src="https://img.icons8.com/cotton/30/000000/business-contact--v1.png"><span> Name -<i style = "color:black"><%position_name%></i></span></p>
                     
                    </div>
                  </div>
                    <div class="row">
                       <div class="col-lg-12 ">
                       </div>
                    </div>
                        <hr>
                    <div class="row">
                    <div class="col-lg-12">
                     <p><img src="https://img.icons8.com/cotton/30/000000/type.png"><span> Job Category -<i style = "color:black"><%job_category_name%></i></span></p>
                     
                    </div>
                  </div>
                   <hr>
              
                       <div class="row">
                       <div class="col-lg-12">
                       
                       </div>
                    </div>
                     <hr>
                    <div class="row">
                    <div class="col-lg-12  ">
                     <p><img src="https://img.icons8.com/cotton/30/000000/cash-in-hand.png"><span> Salary -<i style = "color:black"><%salary%></i></span></p>
                     
                    </div>
                  </div>
                  <hr>

                    <div class="row">
                       <div class="col-lg-10  ">
                       
                       </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-lg-12  ">
                     <p><img src="https://img.icons8.com/ultraviolet/30/000000/thursday.png"><span> Started Date -<i style = "color:black" ng-bind="start_date | date:'MM/dd/yyyy'"></i></span></p>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end -->
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@else
 <div class="container uncheck_cv">
    <div class="row justify-content-center">
       <img src="https://cdn.dribbble.com/users/879147/screenshots/5576622/deploy_audio_in_seconds_2x.jpg">
       <p id="p2" style="color:#24324a;"><b id="p2">Sorry,</b>you don't have apply list currently!</p> 
    </div>
</div>
  <br>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
<script src="/js/jquery-min.js"></script>
<script>
$(document).ready(function () {

    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>

<script>
  var app = angular.module('myApp', []);

app.config(function($interpolateProvider){
              $interpolateProvider.startSymbol('<%').endSymbol('%>');
            });



  app.controller('myCtrl', function($scope, $http, $window, $filter,$rootScope)  {

    // set offer
    $scope.setOffer = function(id)
    {
      $http.get('/api/v1/get_apply?id='+id).
      then(function mySuccess(response)
      {
        //console.log(response.data.data.category);
        $scope.jobs = response.data.data.category;
        $scope.selectedposition = $scope.jobs[0].id;
        $scope.position_name = response.data.data.apply[0].job_position;
        $scope.job_category_name = response.data.data.apply[0].cv_categoryName;
        $scope.salary = response.data.data.apply[0].salary;

        $rootScope.user_id = response.data.data.apply[0].user_id;
        $rootScope.company_id = response.data.data.apply[0].company_id;
        $rootScope.apply_id = id;
      }, 
      function myError(response) 
      {
        console.log(response);
      });
    }

    // save offer
    $scope.saveOffer = function()
    {
      var d;
      if($scope.start_date != undefined)
      {
          d = new Date($scope.start_date),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();

        if (month.length < 2) 
          month = '0' + month;
        if (day.length < 2) 
          day = '0' + day;

        var date = [year, month, day].join('-');
      }
      else
      {
        d = undefined;
      }
      
      if(date == undefined)
      {
        $("#start_date_error").html("Start Date is required");
      }
      if(date != undefined)
      {
        $http.post('/api/v1/save_offer', 
        {
          apply_id:$rootScope.apply_id,
          user_id:$rootScope.user_id,
          company_id:$rootScope.company_id,
          job_position_id: $scope.selectedposition,
          start_date:date,
        }).
        then(function mySuccess(response) {
          console.log(response.data.data);
          if(response.status = 200){
           $window.location.reload();
          }
        }, function myError(response) {
          console.log(response);
        });
      }
    }

    // edit offer
   $scope.editOffer = function(id)
    {
      $http.get('/api/v1/edit_offer?id='+id).

      then(function mySuccess(response)
      {
        $scope.jobs = response.data.data.category;
        $scope.selectedposition = response.data.data.apply[0].job_position_id;
        $scope.position_name = response.data.data.apply[0].job_position;
        $scope.job_category_name = response.data.data.apply[0].cv_categoryName;
        $scope.salary = response.data.data.apply[0].salary;
        $scope.start_date = new Date(response.data.data.apply[0].start_date);

        $rootScope.offer_id = response.data.data.apply[0].id;
        $rootScope.edit_user_id = response.data.data.apply[0].user_id;
        $rootScope.edit_company_id = response.data.data.apply[0].company_id;
        $rootScope.edit_apply_id = response.data.data.apply[0].apply_id;
        console.log($scope.position_name);
      }, 
      function myError(response) 
      {
        console.log(response);
      });
    }

     $scope.displayOffer = function(id)
    {
        $scope.id = id;
        $http({
        method: 'GET',
        url: '/api/v1/edit_offer?id='+id,
              job_position_id : $scope.job_position_id,
              job_position : $scope.job_position,
              cv_categoryName: $scope.cv_categoryName,
              salary: $scope.salary,
              start_date: $scope.start_date,
            }).then(function (response) {
        $scope.jobs = response.data.data.category;
        $scope.selectedposition = response.data.data.apply[0].job_position_id;
        $scope.position_name = response.data.data.apply[0].job_position;
        $scope.job_category_name = response.data.data.apply[0].cv_categoryName;
        $scope.salary = response.data.data.apply[0].salary;
        $scope.start_date = new Date(response.data.data.apply[0].start_date);

        $rootScope.offer_id = response.data.data.apply[0].id;
        $rootScope.edit_user_id = response.data.data.apply[0].user_id;
        $rootScope.edit_company_id = response.data.data.apply[0].company_id;
        $rootScope.edit_apply_id = response.data.data.apply[0].apply_id;
        console.log($scope.position_name);
              }, function (error) {
              console.log(error);    
      });

    }

    // Update offer
    $scope.updateOffer = function()
    {
      if($scope.start_date == undefined)
      {
        $("#start_date_error").html("Start Date is required");
      }
      if($scope.start_date != undefined)
      {
        $http.post('/api/v1/update_offer?id='+$rootScope.offer_id,{
          id:$rootScope.offer_id,
          apply_id:$rootScope.edit_apply_id,
          user_id:$rootScope.edit_user_id,
          company_id:$rootScope.edit_company_id,
          job_position_id: $scope.selectedposition,
          start_date:$scope.start_date,
        }).
        then(function mySuccess(response)
        {
          if(response.status = 200){
           $window.location.reload();
          }
        }, 
        function myError(response) 
        {
          console.log(response);
        });
      }
    }

    $scope.selectChange = function(){
      console.log($scope.selectedposition);
      $http({
          method : "GET",
          url : "/api/v1/get_salary?id="+$scope.selectedposition
        }).then(function mySuccess(response) {
           $scope.salary = response.data.data.salary;
        }, function myError(response) {
      });
    }
  });
</script>
@notify_js
@notify_render
@endsection