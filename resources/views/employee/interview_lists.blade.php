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
@if(count($ap_interviews) > 0)
<div id="content">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="job-alerts-item bookmarked">
<h3 class="alerts-title"> <img src="https://img.icons8.com/dusk/40/000000/bulleted-list.png"> Interview Details for {{ $position}} ({{$company_name}})</h3>
@foreach($ap_interviews as $ap_interview)
<a class="job-listings" href="{{route('employee.notification',['id'=>$ap_interview->noti_id])}}" >
<div class="row">
<div class="col-lg-3 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/bubbles/40/000000/find-user-male.png"> {{$ap_interview->name}}</span>
</div>
<div class="col-lg-3 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/clouds/40/000000/date-time.png"> {{$ap_interview->date}} {{$ap_interview->time}}</span>
</div>
<div class="col-lg-3 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/clouds/40/000000/place-marker.png"> {{$ap_interview->location}} </span>
</div>
<div class="col-lg-3 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/dusk/30/000000/check-file.png"> {{$ap_interview->interview_requirement}}</span>
</div>
<div class="arrow">
<img src="https://img.icons8.com/bubbles/40/000000/double-right.png">
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
       <img src="https://cdn.dribbble.com/users/2704931/screenshots/7048399/media/e9125c8957513a73a246798b8b21350d.png"><br>
       <p id="p1" style="color: #3e0e52;">You don't have any interview for {{$position}},</p><p id="p2" style="color:#262c78;">please wait for a while!</p> 
    </div>
</div>
  <br>

@endif
@notify_js
@notify_render
@endsection

