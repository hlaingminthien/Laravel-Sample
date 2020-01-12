@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Experience Level</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

<div id="content" ng-app="myApp" ng-controller="myCtrl">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="post-job box">
          <h3 class="job-title">Add New Experience Level</h3>
          <form class="form-ad" action="{{route('employeers.experience_levels.save')}}" method="post" id="experience_levelform">
            @csrf
            <div class="form-group">
              <label class="control-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Write Experience Level">
            </div><br>
            
            <button type="submit" class="btn btn-common">Add</button>
          </form>
        </div>
      </div>
      <div class="col-lg-6 col-md-4 col-xs-3">
        <img src="https://www.kunden-gewinnung.info/images/2816/customer-service-working-18706.gif" class="img">
      </div>
    </div>
  </div>
</div>



@notify_js
@notify_render
@endsection