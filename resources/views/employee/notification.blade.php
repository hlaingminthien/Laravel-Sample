@extends('layouts.master')

@section('content')

<br><br><br><br><br>

<div class="container">
<div class="row justify-content-center">

<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" id="bottom">
<img class="over" src="https://i.pinimg.com/originals/50/ea/e6/50eae65aa1b3d9ea135ece2a38191b0f.gif" width="30%">
<img class="under" src="https://image-store.slidesharecdn.com/7e5da1ad-0b86-435c-b98a-0e68ce8df4fc-large.jpeg" width="100%">
</div>
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<br>
<div class="job-alerts-item" id="top">
<div class="row">
<img src="https://img.icons8.com/ultraviolet/40/000000/new-company.png">
<b id="custom_address">Company Name</b> <b id="custom_address"> {{$interviews->company_name}} </b>
</div><br>
<div class="row">
<img src="https://img.icons8.com/dusk/40/000000/permanent-job.png">
<b id="custom_address">Job Position</b> <b id="custom_address"> {{$interviews->position_name}} </b>
</div><br>
<div class="row">
<img src="https://img.icons8.com/officel/40/000000/thinking-male.png">
<b id="custom_address">Interview</b> <b id="custom_address"> {{$interviews->interview_name}} </b>
</div><br>
<div class="row">
<img src="https://img.icons8.com/dusk/40/000000/planner.png"><b id="custom_address">Date</b>
<b id="custom_address"> {{ $interviews->interview_info->date}} {{ $interviews->interview_info->time}}</b> 
</div><br>
<div class="row">
<img src="https://img.icons8.com/color/40/000000/property-time.png"><b id="custom_address">Time</b>
<b id="custom_address"> {{ $interviews->interview_info->time}}</b> 
</div><br>
<div class="row">
<img src="https://img.icons8.com/ultraviolet/40/000000/marker.png"><b id="custom_address">Location</b>
<b id="custom_address"> {{ $interviews->interview_info->location}}</b> 
</div><br>
<div class="row">
<img src="https://img.icons8.com/ultraviolet/40/000000/send-job-list.png"><b id="custom_address">Requirement</b>
<b id="custom_address"> {{ $interviews->interview_info->interview_requirement}}</b> 
</div>

</div>
</div>
</div>
</div>
<br><br><br><br>
@notify_js
@notify_render
@endsection

