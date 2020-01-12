@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

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
@if(count($job_positions) > 0)
<div id="content" ng-app="myApp" ng-controller="myCtrl">
  <div class="container">
    <div class="row justify-content-center">
      <div class="table-responsive">
        <table class="table table-bordered cmp_table" id="dtBasicExample">
          <thead>
            <tr>
              <td>Job Category</td>
              <td>Position</td>
              <td>Gender</td>
              <td>Experience</td>
              <td>Salary</td> 
              <td>Employer Count</td>
              <td>Location</td>
              <td>Job Time</td>
              <td>Job Requirement</td>
              <td>Job Description</td>
              <td>Benefits</td>
              <td>Others</td>
              @if(count($job_positions) > 0 && $job_positions[0]->toppingCount > 0 && $job_positions[0]->usedTime > 0)
              <td>Topping</td>
              @endif

              @if(count($job_positions) > 0 && $job_positions[0]->refreshCount > 0 && $job_positions[0]->usedTime > 0)
              <td>Refresh</td>
              @endif
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
          @foreach($job_positions as $job_position)
            <tr>
              <td>{{$job_position->job_categoryName}}</td>
              <td>{{$job_position->position_name}}</td>
              <td>{{$job_position->gender}}</td>
              <td>{{$job_position->experienceLevel}}</td>
              <td>{{number_format($job_position->salary, 0)}} MMK</td>
              <td>{{$job_position->offer_employee_count}}</td>
              <td>{{$job_position->stateName}}</td>
              <td>{{$job_position->job_time}}</td>
              <td>{{str_limit($job_position->benefits, $limit = 50, $end = '...')}} </td>
              <td>{{str_limit($job_position->others, $limit = 50, $end = '...')}} </td>
              <td>{{str_limit($job_position->job_description, $limit = 50, $end = '...')}}</td>
              <td>{{str_limit($job_position->job_requirement, $limit = 50, $end = '...')}} </td>
              @if($job_position->toppingCount > 0 && $job_positions[0]->usedTime > 0)
              <td>
                @if($job_position->topping_time === null)
                  <a href="#" data-toggle="modal" 
                    data-target="#topping_confirm_modal_{{$job_position->id}}">
                    <i class="lni-star"></i>
                  </a>
                @else
                  <i class="lni-star-filled"></i>
                @endif
              </td>
              @endif

              @if($job_position->refreshCount > 0 && $job_positions[0]->usedTime > 0)
              <td>
                  <a href="#" ng-click="setRefresh('{{$job_position->id}}')" data-toggle="modal" 
                    data-target="#refresh_confirm_modal_{{$job_position->id}}">
                    <i class="lni-reload"></i>
                  </a>
              </td>
              @endif
              <td>
                <a href="{{ route('employeers.job_positions.edit',['id' => $job_position->id])}}" class="btn-added">
                  <i class="lni-pencil"></i>Edit</a>
                  <a href="#" data-toggle="modal" data-target="#delete_{{$job_position->id}}" class="btn-added">
                 <i class="lni-trash"></i>Delete</a>
              </td>
            </tr>
            @include('employers.partials.delete',['id'=>$job_position->id])

            <!-- topping confirmation modal -->
            <div class="modal fade" id="topping_confirm_modal_{{$job_position->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLongTitle">Confirmation</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form id="topping_confirm" name="topping_confirm_form">
                          @csrf
                          <span>Are you sure want to make topping?</span>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          <button type="button" ng-click="topping('{{$job_position->id}}')" class="btn btn-primary">Yes</button>
                      </div>
                  </div>
              </div>
            </div> 
            <!-- end of topping  -->

            <!-- refresh confirmation modal -->
            <div class="modal fade" id="refresh_confirm_modal_{{$job_position->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="topping_confirm" name="topping_confirm_form">
                    @csrf
                    <span>Are you sure want to make refresh?</span>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" ng-click="refresh('{{$job_position->id}}')" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>  
            <!-- end of refresh  -->
          @endforeach
          </tbody>
        </table>

        <form action="{{route('employeers.job_positions.destory')}}" 
        method="post" id="my_delete_hidden_form">
        @csrf
              <input type="hidden" name="id" id="delete_object_id">           
        </form>
      </div>   
    </div>
  </div>
</div>

@else
    <div class="row card_empty">
      <div class="col-lg-4 col-md-2 col-sm-12 col-xs-12">
      </div>
      <div class="col-lg-4 col-md-8 col-sm-12 col-xs-12">
        <span><i class="lni-emoji-sad size-lg"></i></span>
        <h2>Sorry, Empty Job Position!</h2>
      </div>
      <div class="col-lg-4 col-md-2 col-sm-12 col-xs-12">
      </div>
    </div><br><br>
@endif


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 

<script type="text/javascript">
  function onFormSubmit(id) {
    console.log(document.getElementById("my_delete_hidden_form"));
    document.getElementById("delete_object_id").value=id;
    document.getElementById("my_delete_hidden_form").submit();    
  }
</script>

<script>
  $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });

  var app = angular.module('myApp', []);

  app.controller('myCtrl', function($scope, $http, $window, $filter)  {

    $scope.topping = function(job_id)
    { 
      $http.post('/api/v1/seefirst', 
      {
        id:job_id
      }).
      then(function mySuccess(response)
      {
        $window.location.reload();
      }, 
      function myError(response) 
      {
        console.log(response);
      });
    }
    // end

    // set refresh
    $scope.refresh = function(job_id)
    {
      $http.post('/api/v1/refresh', 
      {
        id: job_id,
      }).
      then(function mySuccess(response)
      {
        $window.location.reload();
      }, 
      function myError(response) 
      {
        console.log(response);
      });
    }
    //end
  });
</script>

@notify_js
@notify_render
@endsection



