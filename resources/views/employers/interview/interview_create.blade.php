@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Decide Interview Marks</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

<div id="content" ng-app="myApp" ng-controller="myCtrl">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
@if(count($pivot_results) > 0)
        @foreach($pivot_results as $pivot_result)
                <div class="post-job box">
                    <h3 class="job-title">Interview Lists</h3>
                    <form class="form-ad" action="{{route('employers.interview_result')}}" method="post" id="interview_result_form">
                        @csrf
                        <input type="hidden" name="apply_id" value="{{$pivot_result->apply_id}}">
                        <input type="hidden" name="interview_id" value="{{$pivot_result->interview_id}}">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" name="user_name" class="form-control" value="{{$pivot_result->user_name}}">
                        </div><br>
                        <div class="form-group">
                            <label class="control-label">Job Position</label>
                            <input type="text" name="position_name" class="form-control" value="{{$pivot_result->position_name}}">
                        </div><br>
                        <div class="form-group">
                            <label class="control-label">Interview Name</label>
                            <input type="text" name="interview_name" class="form-control" value="{{$pivot_result->interview_name}}">
                        </div><br>
                         <div class="form-group">
                            <label class="control-label">Interview Mark</label>
                            <input type="text" name="interview_mark" class="form-control" value="{{$pivot_result->interview_mark}}">
                        </div><br>
                           <label class="control-label">Interview result</label>
                        <div class="form-group">

                  <div class="radio_center">
                    <label class="radio-inline">
                      <input type="radio" id="pass" value="pass" name="interview_result" {{($pivot_result->interview_result == 'pass') ? 'checked':''}}>
                      <label class="radio-inline__label" for="pass">Pass</label>
                    </label>
                    <label class="radio-inline">
                      <input type="radio" id="fail" value="fail" name="interview_result" {{($pivot_result->interview_result == 'fail') ? 'checked':''}}>
                      <label class="radio-inline__label" for="fail">Fail</label>
                    </label>
                  </div>
              </div>
              @if($pivot_result->finish == 0)
              <button type="submit" class="btn btn-common">Give Result</button>
              @else
              <button type="button" class="btn btn-common" disabled>Finish Result
              </button>
              @endif
                    </form>
                </div>

        @endforeach
@else

Empty

@endif
			</div>
		</div>   
	</div>
</div>

<script src="/js/jquery-min.js"></script>

@notify_js
@notify_render
@endsection