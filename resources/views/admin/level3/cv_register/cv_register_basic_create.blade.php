@extends('layouts.master')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Register CV</h3>
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
            <h3 class="job-title">Register CV Basic Information</h3><br>
            <form class="form-ad" action="{{route('admin.level3.register_cv_basic_save')}}" method="post"
              enctype="multipart/form-data" id="updateuserinfoform">
              @csrf
              <div class="form-group">
                <label class="control-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Your@domain.com">
              </div>
              <div class="form-group">
                <label class="control-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="e.g. 09790000000">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label class="control-label">Nrc</label>
                    <input type="text" name="nrc" class="form-control" placeholder="e.g.13/layana(n)01233">
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <label class="control-label">Gender</label>
                    <br>
                    <div class="radio_center">
                    <label class="radio-inline">
                      <input type="radio" id="male" value="male" name="gender">
                      <label class="radio-inline__label" for="male">Male</label>
                    </label>
                    <label class="radio-inline">
                      <input type="radio" id="female" value="female" name="gender">
                      <label class="radio-inline__label" for="female">Female</label>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Race</label>
                  <input type="text" name="race" class="form-control" placeholder="e.g. Burmese">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Religious</label>
                  <input type="text" name="religious" class="form-control" placeholder="e.g. Buddha">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Native Town</label>
                  <input type="text" name="native_town" class="form-control" placeholder="e.g. Yangon">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Date of Birth</label>
                  <input type="text" name="date_of_birth" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Weight</label>
                  <input type="text" name="weight" class="form-control" placeholder="e.g.185lbs">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Height</label>
                  <input type="text" name="height" class="form-control" placeholder="e.g.5'8">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Marital Status</label>
                  <br>
                  <div class="radio_center">
                    <label class="radio-inline">
                      <input type="radio" name="marital_status" value="have_marriage"> have_marriage
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="marital_status" value="no_marriage"> no_marriage
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="marital_status" value="divorce"> divorce
                    </label>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Health</label>
                  <input type="text" name="health" class="form-control" placeholder="e.g. good/bad">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Emergency Contact Name</label>
              <input type="text" name="emergency_contact_name" class="form-control" placeholder="e.g. Su Su">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Emergency Phone</label>
                  <input type="text" name="emergency_phone" class="form-control" placeholder="e.g. 0978122222">
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <label class="control-label">Relation with emergency contact</label>
                  <input type="text" name="relation_with_econtact" class="form-control" placeholder="e.g. father/mother">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea class="form-control" name="address" rows="4" id="address"></textarea>
            </div><br>
            <div class="form-group">
              <input type="file" name="photo" >
            </div><br>
            <button type="submit" class="btn btn-common">Save</button>
          </form>
        </div>  
      </div>
    </div>
  </div>
</div>

<script src="/js/jquery-min.js"></script>
{!!JsValidator::formRequest('App\Http\Requests\UserInfoUpdateRequest','#updateuserinfoform'); !!}

@notify_js
@notify_render
@endsection

