@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>Create your Employer Account </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Content section Start --> 
    <section id="content" class="section-padding">
    
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-6 col-xs-12">
            <div class="page-login-form box">
              <h3>
                Create your Employer Account 
              </h3>
              <form class="login-form" action="{{route('account.post_employeer_register')}}" method="post" id="registerform">
                @csrf
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="text" id="sender-email" class="form-control" name="name" placeholder="Username">
                  </div> 
                </div> 
                 <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-envelope"></i>
                    <input type="text" class="form-control" name="email" placeholder="Email Address">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-lock"></i>
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                  </div>
                </div> 
                  <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-lock"></i>
                    <input type="password" name="password" id="password-field" 
                    class="form-control forPassword" placeholder="@lang('login.password')">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password glyphicon"></span>
                  </div>

                </div> 
              <div class="form-group">
                   <input type="checkbox" id="term" name="terms_&_conditions" ng-model="terms_&_conditions">
                   <a href="{{route('employer_terms')}}" style="color:#00bcd4;">
                    Accept Terms & Conditions</a></li>
                </div>
                <button type="submit" class="btn btn-common log-btn">Register</button>
              </form>
              <ul class="form-links">
                <li class="text-center">Join as an employee<a href="{{route('account.register')}}" style="color:#00bcd4;">
                 Register as employee</a></li>
              </ul>
              <ul class="form-links">
                <li class="text-center">Already have an account? <a href="{{route('account.login')}}" style="color:#00bcd4;"> Sign In </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End --> 
    <script src="/js/jquery-min.js"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UserRequest','#registerform'); !!}
@notify_js
@notify_render
@endsection