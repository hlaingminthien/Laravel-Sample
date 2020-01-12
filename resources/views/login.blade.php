@extends('layouts.master')

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3> @lang('nav.account')</h3> 
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
            @lang('login.login')
          </h3>
          <form class="login-form" method="post" action="{{route('account.post_login')}}" id="loginform">
            @csrf
            <div class="form-group">
              <div class="input-icon">
                <i class="lni-user"></i>
                <input type="text" id="sender-email" class="form-control" name="email" placeholder="@lang('login.email')">
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
              <div class="pretty p-icon p-smooth">
                  <input type="checkbox" name="terms_&_conditions"/>
                  <div class="state p-success">
                      <i class="icon fa fa-check"></i>
                      <label class="terms">@lang('login.accept_terms_conditions')</label>
                  </div>
              </div>
            </div>
            <button class="btn btn-common log-btn">@lang('login.submit')</button>
          </form>
          <ul class="form-links">
            <li class="text-center"><a href="{{route('account.register')}}">
            @lang('login.don_have_account')</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Content section End -->
<script src="/js/jquery-min.js">

  
 </script>
{!! JsValidator::formRequest('App\Http\Requests\UserRequest','#loginform'); !!} 
 <script type="text/javascript">
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script type="text/javascript">
  setTimeout( function() {
    document.getElementsByTagName( "input" )[0].click();
}, 1000 );
</script>



@endsection