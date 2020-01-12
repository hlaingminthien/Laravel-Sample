@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>Employee's Dashboard</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

<div id="content">
<div class="container">
@if(count($company_view_cv) > 0)

<div class="row justify-content-center">
<div class="col-lg-12 col-md-12 col-xs-12"></div>
<div class="job-alerts-item candidates">
<h3 class="alerts-title">Who Viewed Your Profile</h3>
@foreach($company_view_cv as $company)
<div class="manager-resumes-item">
<div class="manager-content">
<a href="resume.html"><img class="resume-thumb" src="/employerPhotos/{{$company->logo}}" alt=""></a>
<div class="manager-info">
<div class="manager-name">
<h4><a href="#" style="color: #00bcd4;">{{$company->company_name}}</a></h4>
<h5>{{$company->company_category_name}}</h5>
</div>
<div class="manager-meta">
<span class="location"><i class="lni-map-marker"></i> {{$company->state_name}}</span>
<span class="rate"><i class="fas fa-list-ol"></i> {{$company->no_of_employee}} employees</span>
</div>
</div>
</div>
<div class="update-date">
<p class="status">
<strong>View on:</strong> Feb 22, 2020
</p>
<div class="action-btn">
<a class="btn btn-xs btn-gray" href="#" style="color: #3b5998;font-weight: 500;">View Company</a>
<a class="btn btn-xs btn-gray" href="#" style="color: #3b5998;font-weight: 500;">View company jobs</a>
</div>
</div>
</div>
@endforeach
</div>
</div>
@else

<div class="container who_view">
    <div class="row justify-content-center">
       <img src="https://cdn.dribbble.com/users/879147/screenshots/4261237/untitled-2.jpg"><br>
       <p id="p2"><b id="p1">At this time,</b>You don't have any viewer!</p> 
    </div>
</div>
  <br>

@endif
</div>
</div>
</div>
@notify_js
@notify_render
@endsection

