@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Interview Info</h3>
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
				<div class="post-job box">
					<h3 class="job-title">Edit Interview Info</h3>
					<form class="form-ad" action="{{route('employeers.interview_infos.update', ['id' => $edit_interview->id])}}" method="post" id="interviewform">
						@csrf
						<div class="form-group">
							<label class="control-label">Name</label>
							<input type="text" name="name" class="form-control" value="{{$edit_interview->name}}">
						</div><br>
						<div class="form-group">
							<label class="control-label">Time</label>
							<div class="row">
								<div class="col-lg-6 col-md-12 col-xs-12">
									<input type="date" name="date" class="form-control" value="{{$edit_interview->date}}">
								</div>
								<div class="col-lg-6 col-md-12 col-xs-12">
									<input type="time" name="time" class="form-control" value="{{$edit_interview->time}}">
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<label class="control-label">Requirement</label>
							<textarea class="form-control" name="interview_requirement" rows="5" id="comment">{{$edit_interview->interview_requirement}}</textarea>
						</div>
						<div class="form-group">
							<label class="control-label">Location</label>
							<input type="text" name="location" class="form-control" value="{{$edit_interview->location}}">
						</div>

						<button type="submit" class="btn btn-common">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/js/jquery-min.js"></script>
 {!! JsValidator::formRequest('App\Http\Requests\InterviewInfoRequest','#interviewform'); !!}

@notify_js
@notify_render
@endsection
