@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Staff List</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

  <div id="content" ng-app="myApp" ng-controller="myCtrl">
    <div class="container">
@if(count($level2)>0)
      <div class="row justify-content-center">
      <h3 class="staff">Level2 Staff List</h3>
      <div class="table-responsive">
      <table class="table table-bordered cmp_table" id="dtBasicExample">
             <thead>
            <tr>
               <th>Photo</th>
               <th>Name</th>
               <th>Location</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Nrc</th>
               <th>Gender</th>
               <th>Race & Religious</th>
               <th>Native Town</th>
               <th>Date of birth</th>
               <th>Weight & Height</th>
               <th>Marital Status</th>
               <th>Health</th>
               <th>Emergency </th>
               <th>Address</th>
               <th>Active</th>
               <th>Action</th>

            </tr>
        </thead>
        <tbody>
        @foreach($level2 as $level2)
            <tr> 
                <td><img src="/photo/{{$level2->photo}}" style="width:70px;"></td>
                <td>{{$level2->name}}</td>
                <td>{{$level2->state_name}}</td>
                <td>{{$level2->email}}</td>
                <td>{{$level2->phone}}</td>
                <td>{{$level2->nrc}}</td>
                <td>{{$level2->gender}}</td>
                <td>{{$level2->race}}/{{$level2->religious}}</td>
                <td>{{$level2->native_town}}</td>
                <td>{{$level2->date_of_birth}}</td>
                <td>{{$level2->weight}}/{{$level2->height}}</td>
                <td>{{$level2->marital_status}}</td>
                <td>{{$level2->health}}</td>
                <td>{{$level2->emergency_contact_name}},{{$level2->emergency_phone}},{{$level2->relation_with_econtact}}</td>
                <td>{{$level2->address}}</td>
                <td>{{$level2->active}}</td>
                <td>
                  <a href="{{route('admin.staff.edit',['id'=>$level2->id,'role_name'=>'level2'])}}" class="btn-added">
                    <i class="lni-pencil"></i>Edit</a>
                  <a href="#" data-toggle="modal" data-target="#delete_{{$level2->id}}" class="btn-added">
                    <i class="lni-trash"></i>Delete</a>
                  @if($level2->staff_resource_id == NULl)
                  <a href="#" class="btn-added" ng-click="set('{{$level2->id}}')" data-toggle="modal" 
                  data-target="#setCvDownload_modal"><i class="lni-cart"></i>Set CV Download</a>
                  @else
                    <a href="#" class="btn-added" ng-click="edit('{{$level2->staff_resource_id}}')" data-toggle="modal" 
                  data-target="#updateCvDownload_modal"><i class="lni-cart"></i>Update CV Download</a>
                  @endif  
                </td>
            </tr>
            @include('admin.partials.delete',['id'=>$level2->id])

       @endforeach
        </tbody>
      </table>
        <!-- start of delete hidden form -->
          <form action="{{route('admin.staff.destory')}}" method="post" id="my_delete_hidden_form">
            @csrf
            @method('DELETE')            
            <input type="hidden" name="id" id="delete_object_id">           
          </form>
        <!-- end of delete hidden form -->
      </div>
    </div>
@else
  Empty
@endif
<br>
@if(count($level3)>0) 
      <div class="row justify-content-center">
      <h3 class="staff">Level3 Staff List</h3>
      <div class="table-responsive">
      <table class="table table-bordered cmp_table" id="dtBasicExample2">
             <thead>
            <tr>
               <th>Photo</th>
               <th>Name</th>
               <th>Location</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Nrc</th>
               <th>Gender</th>
               <th>Race & Religious</th>
               <th>Native Town</th>
               <th>Date of birth</th>
               <th>Weight & Height</th>
               <th>Marital Status</th>
               <th>Health</th>
               <th>Emergency </th>
               <th>Address</th>
               <th>Active</th>
               <th>Action</th>

            </tr>
        </thead>
        <tbody>
        @foreach($level3 as $level3)
            <tr> 
                <td><img src="/photo/{{$level3->photo}}" style="width:70px;"></td>
                <td>{{$level3->name}}</td>
                <td>{{$level3->state_name}}</td>
                <td>{{$level3->email}}</td>
                <td>{{$level3->phone}}</td>
                <td>{{$level3->nrc}}</td>
                <td>{{$level3->gender}}</td>
                <td>{{$level3->race}}/{{$level3->religious}}</td>
                <td>{{$level3->native_town}}</td>
                <td>{{$level3->date_of_birth}}</td>
                <td>{{$level3->weight}}/{{$level3->height}}</td>
                <td>{{$level3->marital_status}}</td>
                <td>{{$level3->health}}</td>
                <td>{{$level3->emergency_contact_name}},{{$level3->emergency_phone}},{{$level3->relation_with_econtact}}</td>
                <td>{{$level3->address}}</td>
                <td>{{$level3->active}}</td>
                <td>
                  <a href="{{route('admin.staff.edit',['id'=>$level3->id,'role_name'=>'level3'])}}" class="btn-added">
                   <i class="lni-pencil"></i>Edit</a>
                  <a href="#" data-toggle="modal" data-target="#delete_{{$level3->id}}" class="btn-added">
                   <i class="lni-trash"></i>Delete</a>
                  @if($level3->staff_resource_id == NULl)
                  <a href="#" class="btn-added" ng-click="set('{{$level3->id}}')" data-toggle="modal" 
                  data-target="#setCvDownload_modal"><i class="lni-cart"></i>Set CV Download</a>
                  @else
                    <a href="#" class="btn-added" ng-click="edit('{{$level3->staff_resource_id}}')" data-toggle="modal" 
                  data-target="#updateCvDownload_modal"><i class="lni-cart"></i>Update CV Download</a>
                  @endif    
                </td>
            </tr>
            @include('admin.partials.delete',['id'=>$level3->id])

       @endforeach
        </tbody>
      </table>
        <!-- start of delete hidden form -->
        <form action="{{route('admin.staff.destory')}}" method="post" id="my_delete_hidden_form">
          @csrf
          @method('DELETE')            
          <input type="hidden" name="id" id="delete_object_id">           
        </form>
        <!-- end of delete hidden form -->
      </div>
    </div>
    @else
      Empty
    @endif
  </div>

  <div class="modal fade" id="setCvDownload_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLongTitle">Set CV Download</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <div class="modal-body">
              <form id="setCvDownload" name="cvDownload_form">
              @csrf
              <div class="form-ad">
                <div class="form-group">
                  <input type="number" name="used_cvused_cv" ng-model="used_cv" class="form-control" placeholder="Number of CV Download" required>
                </div>
              </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" ng-click="saveCVDownload()" class="btn btn-primary">Save</button>
            </div>
        </div>
      </div>
  </div>

  <div class="modal fade" id="updateCvDownload_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLongTitle">Update CV Download</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <div class="modal-body">
              <form id="updateCvDownload" name="cvDownload_form">
              @csrf
              <div class="form-ad">
                <div class="form-group">
                  <input type="number" name="used_cvused_cv" ng-model="used_cv" class="form-control" placeholder="Number of CV Download" required>
                  <input type="hidden" name="id" ng-model="id">
                  <input type="hidden" name="user_id" ng-model="user_id">
                  <input type="hidden" name="offered_employer" ng-model="offered_employer">
                  <input type="hidden" name="offered_employee" ng-model="offered_employee">
                </div>
              </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" ng-click="updateCVDownload()" class="btn btn-primary">Update</button>
            </div>
        </div>
      </div>
  </div>

</div>
<script src="/js/jquery-min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
<script src="script.js"></script>
<script>
  function onFormSubmit(id) {
      document.getElementById('delete_object_id').value=id;
      document.getElementById("my_delete_hidden_form").submit();    
  }
  $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('#dtBasicExample2').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });

  var app = angular.module('myApp', []);

  app.controller('myCtrl', function($scope, $http,$window,$rootScope) 
  {

    $scope.set = function(id)
    {
      $rootScope.id = id
    }

    $scope.saveCVDownload = function(){
      console.log($rootScope.id)
      $http.post('/api/v1/save_cv_download', 
      {
        user_id:$rootScope.id,
        offered_employer:null,
        offered_employee:null,
        used_cv:$scope.used_cv,
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

    $scope.edit = function(id){
        $http.get('/api/v1/edit_cv_download?id='+id).
            then(function mySuccess(response) 
              {
                $scope.edit = response.data.data;
                $scope.id = $scope.edit.id;
                $scope.used_cv = $scope.edit.used_cv;
                $scope.user_id = $scope.edit.user_id;
                $scope.offered_employer = $scope.edit.offered_employer;
                $scope.offered_employee = $scope.edit.offered_employee;
              }, 
            function myError(response) {
              console.log(response);
            }); 
      }

    $scope.updateCVDownload = function(){
      $http.post('/api/v1/update_cv_download', 
      {
        id:$scope.id,
        user_id:$scope.user_id,
        offered_employer:$scope.offered_employer,
        offered_employee:$scope.offered_employee,
        used_cv:$scope.used_cv,
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
  });
</script>
@notify_js
@notify_render
@endsection