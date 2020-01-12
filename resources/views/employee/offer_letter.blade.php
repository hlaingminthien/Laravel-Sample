@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>Application</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 
@if(count($offers) > 0)
<div id="content">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="job-alerts-item bookmarked">
<h3 class="alerts-title"> <img src="https://img.icons8.com/dusk/40/000000/feedback.png"> Offer Letter Lists</h3>
@foreach($offers as $offer)
<a class="job-listings" href="#">
<div class="row">
<div class="col-lg-4 col-md-12 col-xs-12">
<div class="job-details">
<span><img src="https://img.icons8.com/clouds/40/000000/company.png"> {{$offer->company_name}}</span>
</div>
</div>
<div class="col-lg-3 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/bubbles/40/000000/find-user-male.png"> {{$offer->position_name}}</span>
</div>
<div class="col-lg-3 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/clouds/30/000000/date-time.png"> {{$offer->start_date}}</span>
</div>
<div class="col-lg-2 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/cotton/30/000000/task-planning.png"> {{$offer->salary}}</span>
</div>

</div>
</a>
@endforeach

</div>
</div>

</div>

</div>
</div>

@else
<br>
 <div class="container who_view">
    <div class="row justify-content-center">
       <img src="https://cdn.dribbble.com/users/879147/screenshots/5433437/code_house_2x.jpg"><br>
       <p id="p1" style="color: #5d80ea;">Sorry,you don't have any job,</p><p id="p2" style="color:#3c79fd;">offer letters!</p> 
    </div>
</div>
  <br>

@endif
@notify_js
@notify_render
@endsection

