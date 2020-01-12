@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>Admin's Dashboard</h3>
            </div>
          </div>
        </div>
      </div>
</div>
    <!-- Page Header End --> 

<div id="content">
<div class="container">
<div class="row">
<div class="col-lg-2 col-md-2 col-xs-2"></div>
<div class="col-lg-10 col-md-10 col-xs-10">
<div class="add-resume box">
<form class="form-ad" action="{{route('admin.staff.update')}}" method="post" enctype="multipart/form-data" id="staffcreateform">
	@csrf
<input type="hidden" name="edit_id" value="{{$edit_staff->id}}">
<h3>Edit staff</h3><br>
<div class="form-group">
<label class="control-label" >For Location (State):</label>
    <select ng-model="selectedState" name="state_id" value="selectedState"  ng-options="state.id as state.name for state in states" class="form-control" >
    </select>
</div>
<!-- <div class="form-group">
<label class="control-label" >For Location (City):</label>
   <select ng-model="selectedCity" name="city_id" value="selectedCity"  ng-options="city.id as city.name for city in cities"  class="form-control" >
   </select>
</div> -->
<div class="form-group">
<label class="control-label">Name</label>
<input type="text" name="name" class="form-control" placeholder="Name" value="{{$edit_staff->name}}">
</div>
<div class="form-group">
<label class="control-label">Select Role</label>
<select name="role" class="form-control">
  @foreach($roles as $key=>$value)
  <option value="{{$value}}" {{$edit_staff->role_name == $value ? 'selected':''}}>{{$value}}</option>
  @endforeach
</select>
</div>
<div class="form-group">
<label class="control-label">Email</label>
<input type="text" name="email" class="form-control" placeholder="Your@domain.com" value="{{$edit_staff->email}}">
</div>
<div class="form-group">
<label class="control-label">Phone Number</label>
<input type="text" name="phone" class="form-control" placeholder="e.g.09790000000" value="{{$edit_staff->phone}}">
</div>
<div class="form-group">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
 <label class="control-label">Nrc</label>
<input type="text" name="nrc" class="form-control" placeholder="e.g.13/layana(n)01233" value="{{$edit_staff->nrc}}">
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Gender</label>
<br>
<div class="radio_center">
<label class="radio-inline">
<input type="radio" id="male" value="male" name="gender" {{($edit_staff->gender =="male") ? "checked":""}}>
<label class="radio-inline__label" for="male">Male</label>
</label>
<label class="radio-inline">
<input type="radio" id="female" value="female" name="gender" {{($edit_staff->gender =="female") ? "checked":""}}>
<label class="radio-inline__label" for="female">Female</label>
</label>
</div>
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Race</label>
<input type="text" name="race" class="form-control" placeholder="e.g. Burmese" value="{{$edit_staff->race}}">
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Religious</label>
<input type="text" name="religious" class="form-control" placeholder="e.g. Buddha" value="{{$edit_staff->religious}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Native Town</label>
<input type="text" name="native_town" class="form-control" placeholder="e.g. Yangon" value="{{$edit_staff->native_town}}">
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Date of Birth</label>
<input type="text" name="date_of_birth" class="form-control" value="{{$edit_staff->date_of_birth}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Weight</label>
<input type="text" name="weight" class="form-control" placeholder="e.g.185lbs" value="{{$edit_staff->weight}}">
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Height</label>
<input type="text" name="height" class="form-control" placeholder="e.g.5'8" value="{{$edit_staff->height}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Marital Status</label>
<br>
<div class="radio_center">
<label class="radio-inline">
<input type="radio" name="marital_status" value="have_marriage" {{($edit_staff->marital_status=="have_marriage")? "checked":""}}> have_marriage
</label>
<label class="radio-inline">
<input type="radio" name="marital_status" value="no_marriage" {{($edit_staff->marital_status=="no_marriage")? "checked":""}}> no_marriage
<label class="radio-inline">
<input type="radio" name="marital_status" value="divorce" {{($edit_staff->marital_status=="divorce")? "checked":""}}> divorce
</label>
</div>
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Health</label>
<input type="text" name="health" class="form-control" placeholder="e.g. good/bad" value="{{$edit_staff->health}}">
</div>
</div>
</div>
<div class="form-group">

<label class="control-label">Emergency Contact Name</label>
<input type="textarea" name="emergency_contact_name" class="form-control" placeholder="e.g. Su Su" value="{{$edit_staff->emergency_contact_name}}">

</div>
<div class="form-group">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Emergency Phone</label>
<input type="text" name="emergency_phone" class="form-control" placeholder="e.g. 0978122222" value="{{$edit_staff->emergency_phone}}">
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<label class="control-label">Relation with emergency contact</label>
<input type="text" name="relation_with_econtact" class="form-control" placeholder="e.g. father/mother" value="{{$edit_staff->relation_with_econtact}}">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-lg-8 col-md-8 col-xs-12">
<input type="file" name="photo">
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
<div class="form-check form-check-inline">
{{ Form::checkbox('active',1,$edit_staff->active,['class'=>'form-check-input','id'=>'inlineCheckbox1']) }}
<label class="form-check-label" for="inlineCheckbox1">Active</label>
</div>
</div>
</div>
</div>
<div class="form-group">
<label for="address">Address</label>
<textarea class="form-control" name="address" rows="4" id="address" ng-model="address"></textarea>
</div><br>
<button type="submit" class="btn btn-common">Update</button>
</form>
</div>	
</div>
</div>
</div>
</div>
<script src="/js/jquery-min.js"></script>
{!! JsValidator::formRequest('App\Http\Requests\StaffCreateRequest','#staffcreateform'); !!}
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
  var states={!! json_encode($states) !!};
  // var cities={!! json_encode($cities) !!};
  var edit_staff = {!! json_encode($edit_staff) !!}

var app = angular.module('myApp', []);
app.config(function($interpolateProvider){
  $interpolateProvider.startSymbol('<%').endSymbol('%>');
});

app.controller('myCtrl', function($scope, $http) {

$scope.states = states;
// $scope.cities = cities;
$scope.edit_staff = edit_staff;
$scope.selectedState = $scope.edit_staff.state_id;
// $scope.selectedCity=$scope.edit_staff.city_id;
$scope.address = $scope.edit_staff.address;

//   $http({
//           method : "GET",
//           url : "/api/v1/get_city?state_id="+$scope.selectedState
//         }).then(function mySuccess(response) {
//           $scope.cities = response.data.data;
//           $scope.selectedCity = $scope.cities[0].id;
          
//           }, function myError(response) {

//             console.log(response);
//         });

       
// $scope.selectChange = function(){

// $http({
//           method : "GET",
//           url : "/api/v1/get_city?state_id="+$scope.selectedState
//         }).then(function mySuccess(response) {
//           $scope.cities = response.data.data;
//           $scope.selectedCity = $scope.cities[0].id;
          
//           }, function myError(response) {

//             console.log(response);
//         });
 


//  }


       // ng-change="selectChange()" 
});
</script>
@notify_js
@notify_render
@endsection

