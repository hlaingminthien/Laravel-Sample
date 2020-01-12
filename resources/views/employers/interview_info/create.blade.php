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
					<h3 class="job-title">Create Interview</h3>
						<form class="form-ad" action="{{route('employeers.interview_infos.save')}}" method="post" id="interviewform">
						@csrf
							<div class="form-group">
								<label class="control-label">Name</label>
								<input type="text" name="name" class="form-control">
							</div><br>
							<div class="form-group">
								<label class="control-label">Time</label>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-xs-12">
										<input type="date" id="myDate" name="date" class="form-control">
									</div>
									<div class="col-lg-6 col-md-12 col-xs-12">
										<input type="time" id="myTime" name="time" class="form-control">
									</div>
								</div>
							</div><br>
							<div class="form-group">
								<label class="control-label">Requirement</label>
								<textarea class="form-control" name="interview_requirement" rows="5" id="comment"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Location</label>
								<input type="text" name="location" class="form-control">
							</div>
							
							<button type="submit" class="btn btn-common">Create</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="/js/jquery-min.js"></script>
{!! JsValidator::formRequest('App\Http\Requests\InterviewInfoRequest','#interviewform'); !!} 

<script src="/js/jquery-min.js"></script>
<script>
  $(document).ready(function () {
  	var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    document.getElementById("myDate").defaultValue = [year, month, day].join('-');


	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes();

	document.getElementById("myTime").defaultValue = time;
});
</script>

@notify_js
@notify_render
@endsection