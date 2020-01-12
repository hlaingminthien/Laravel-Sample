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
@if(count($apply_informations) > 0)
<div id="content">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="job-alerts-item bookmarked">
<h3 class="alerts-title"> <img src="https://img.icons8.com/officel/40/000000/thinking-male.png"> Offer Jobs By Companies</h3>
@foreach($apply_informations as $apply_information)
<a class="job-listings" href="{{route('employee.interview_list',['apply_id'=>$apply_information->id,'job_position'=>$apply_information->position_name,'company_name'=>$apply_information->company_name])}}" >
<div class="row">
<div class="col-lg-2 col-md-12 col-xs-12">
<div class="job-details">
<h3><img src="https://img.icons8.com/officel/25/000000/fireman-male.png"> {{$apply_information->position_name}}</h3>
<span class="company-name"> <img src="https://img.icons8.com/clouds/30/000000/company.png">{{$apply_information->company_name}}
</span>
</div>
</div>
<div class="col-lg-3 col-md-12 col-xs-12 ">
@if($apply_information->offer_employee_count == 0)
<span class="btn-full-time"><img src="https://img.icons8.com/bubbles/40/000000/find-user-male.png"> They got employee </span>
@else
<span class="btn-full-time"><img src="https://img.icons8.com/bubbles/40/000000/find-user-male.png"> They're still finding </span>
@endif
</div>
<div class="col-lg-3 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/clouds/30/000000/date-time.png"> {{$apply_information->time}}</span>
</div>
<div class="col-lg-2 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/cotton/30/000000/task-planning.png"> {{$apply_information->job_time}}</span>
</div>
<div class="col-lg-2 col-md-12 col-xs-12 ">
<span class="btn-full-time"><img src="https://img.icons8.com/clouds/40/000000/todo-list.png"> Interview List</span>
</div>
</div>
</a>
@endforeach
  {{ $apply_informations->links() }}

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
       <p id="p1" style="color: #5d80ea;">You don't have any job applied,</p><p id="p2" style="color:#3c79fd;">please apply jobs!</p> 
    </div>
</div>
  <br>

@endif
@notify_js
@notify_render
@endsection

