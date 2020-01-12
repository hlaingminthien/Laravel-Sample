@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Company Register</h3>
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
					<h3 class="job-title">Register Company Basic Infromation</h3><br>
					<form class="form-ad" action="{{route('admin.level3.register_company_basic_save')}}" method="post" id="registerform">
						@csrf
						<div class="form-group">
							<label class="control-label">User Name</label>
							<input type="text" class="form-control" name="name" placeholder="Username">
						</div><br>
						<div class="form-group">
							<label class="control-label">Email Address</label>
							<input type="text" class="form-control" name="email" placeholder="Email Address">
						</div><br>
						<div class="form-group">
							<label class="control-label">Phone</label>
							<input type="text" class="form-control" name="phone" placeholder="Phone">
						</div><br>
						<div class="form-group">
							<label class="control-label">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div><br>
						<button type="submit" class="btn btn-common">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/js/jquery-min.js"></script>
{!! JsValidator::formRequest('App\Http\Requests\UserRequest','#registerform'); !!}

@notify_js
@notify_render
@endsection