@extends('layouts.master')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>CV Register</h3>
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
            <h3>Register CV Information</h3><br>
            <form action="{{route('admin.level3.register_cv_info_save')}}" method="post" id="cvbasicform">
            @csrf
              <div class="form-group">
                <label class="control-label">Job Position</label>
                <input type="text" name="job_position" class="form-control" placeholder="e.g. Accountact,Manager">
                <input type="hidden" name="user_id" value="{{$user_id}}">
              </div>
              <div class="form-group">
                <label class="control-label" for="job_category">Job Category:</label>
                <select class="form-control" id="job_category" name="jobcate_id">
                  @foreach($job_categories as $job_category)
                  <option value="{{$job_category->id}}">{{$job_category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="control-label" for="experlevel">Experience Level:</label>
                <select class="form-control" id="experlevel" name="experlevel_id">
                  @foreach($exper_levels as $exper_level)
                  <option value="{{$exper_level->id}}">{{$exper_level->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="control-label" for="location">Location:</label>
                <select class="form-control" id="location" name="state_id">
                  @foreach($states as $state)
                  <option value="{{$state->id}}">{{$state->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">Expected Salary</label>
                <input type="text" name="expected_salary" class="form-control" placeholder="e.g. 500000MMK">
              </div>
              <div class="form-group">
                <label class="control-label">Education/School Name</label>
                <input type="text" name="education" class="form-control" placeholder="e.g. BCSC,BEHS(10)">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label class="control-label">Bond with previous company</label>
                    <div class="radio_center">
                      <label class="radio-inline">
                        <input type="radio" id="have" value="have" name="bond_with_prev_company">
                        <label class="radio-inline__label" for="have">have</label>
                      </label>
                      <label class="radio-inline">
                        <input type="radio" id="no" value="no" name="bond_with_prev_company">
                        <label class="radio-inline__label" for="no">no</label>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label class="control-label">Limit jobs with previous company</label>
                    <br>
                    <div class="radio_center">
                      <label class="radio-inline">
                        <input type="radio" id="have" value="have" name="limit_jobs_with_prev_company">
                        <label class="radio-inline__label" for="have">have</label>
                      </label>
                      <label class="radio-inline">
                        <input type="radio" id="no" value="no" name="limit_jobs_with_prev_company">
                        <label class="radio-inline__label" for="no">no</label>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-common">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="/js/jquery-min.js"></script>
{!!JsValidator::formRequest('App\Http\Requests\CVBasicRequest','#cvbasicform'); !!}

@notify_js
@notify_render
@endsection
