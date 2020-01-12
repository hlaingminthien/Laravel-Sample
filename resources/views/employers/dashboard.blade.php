@extends('layouts.master')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Company Information</h3>
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
        <div class="inner-box my-resume">
              <div class="add-post-btn itm">
                <h3> Bacic Information </h3>
              </div>
              <div class="author-resume">
                  <div class="thumb">
                    <img src="/employerPhotos/{{$company_infos[0]->logo}}" id="update_img" alt="">
                      <form enctype="multipart/form-data" id="update_photo">
                        @csrf
                        <div class="p-image">
                            <i class="lni-camera size-sm upload-button"></i>
                            <input class="file-upload" type="file" name="file" id="file">
                        </div>
                      </form>
                    </div>
                  <div class="author-info">
                    <div class="row"> 
                         
                          <div class="col-lg-12 col-md-12 col-xs-12">

                              <p class="sub-title">{{$company_infos[0]->company_name}} <span><i class="fas fa-check-circle" style="color: #3578e5;"></i></span></p> 

                            </div>
                    </div>
                      <div class="row">

                          <div class="col-lg-4 col-md-4 col-xs-12">
                              <p>
                                <span class="address">
                                  <img src="https://img.icons8.com/carbon-copy/35/000000/important-mail.png">
                                    {{$company_infos[0]->email}}
                                </span>
                              </p>
                              <p>
                                <span>
                                  <img src="https://img.icons8.com/wired/30/000000/cell-phone.png">
                                  {{$company_infos[0]->phone}}
                                </span>
                              </p>

                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                              
                                <p><span class="address">
                                  <img src="https://img.icons8.com/ios/30/000000/gender.png">
                                   {{$company_infos[0]->gender}}
                                </span></p>
                                <p>
                                  <span class="address">
                                    <img src="https://img.icons8.com/wired/30/000000/hearts.png">
                                    {{$company_infos[0]->marital_status}}
                                  </span>
                                </p>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-xs-12">
                            </div>
                         </div>
                  </div>
              </div>
            <div class="about-me item">
            <div class="add-post-btn">
                      <h3> Company Information</h3>
                          <div class="float-right">
                              <a href="#" class="btn-added" id="edit_button_wexp" ng-click="editCompany()" data-toggle="modal" 
                              data-target="#EditCompanyModal"><i class="ti-plus"></i>Edit</a>
                          </div>
            </div>
            <div class="row basic_info">
                <div class="col-lg-4 col-md-3 col-xs-12">
                                  <h5>
                                      <span class="date">
                                        <img src="https://img.icons8.com/carbon-copy/30/000000/worldwide-location.png">
                                          {{$company_infos[0]->state_name}}
                                      </span>
                                  </h5>
                                  <h5> 
                                      <span class="date">
                                          <img src="https://img.icons8.com/wired/30/000000/company.png">
                                            {{$company_infos[0]->job_category}}
                                      </span>
                                  </h5>
                                  <h5> 
                                      <span class="date">
                                          <img src="https://img.icons8.com/ios/22/000000/date-from.png">
                                            {{$company_infos[0]->established_date}}
                                      </span>
                                  </h5>
                                  <h5>
                                    <span class="date">
                                          <img src="https://img.icons8.com/dotty/30/000000/place-marker.png">
                                          {{$company_infos[0]->company_type}}
                                    </span>
                                  </h5>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12">
                                      <h5>
                                        <span class="date">
                                             <img src="https://img.icons8.com/ios/30/000000/conference-background-selected.png">
                                             {{$company_infos[0]->man_power}}
                                        </span>
                                      </h5>

                                      <h5>
                                        <span class="date">
                                             <img src="https://img.icons8.com/dotty/30/000000/business-contact.png"> 
                                            {{$company_infos[0]->contact_name}}
                                        </span>
                                      </h5>

                                      <h5>
                                        <span class="date">
                                          <img src="https://img.icons8.com/ios/30/000000/ringing-phone.png">
                                            {{$company_infos[0]->contact_phone}}
                                        </span>
                                      </h5>
                                      <h5><span class="date">
                                     <img src="https://img.icons8.com/carbon-copy/35/000000/important-mail.png">
                                      {{$company_infos[0]->contact_email}}
                                </span></h5>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12">
                                <h5><span class="date">
                                     <img src="https://img.icons8.com/carbon-copy/35/000000/important-mail.png">
                                      {{$company_infos[0]->address}}
                                </span></h5>
                                <h5><span class="date">
                                      <img src="https://img.icons8.com/dotty/30/000000/type.png">
                                      {{$company_infos[0]->what_you_do}}
                                </span></h5>
                                <h5><span class="date">
                                        <img src="https://img.icons8.com/wired/28/000000/ask-question.png">
                                          {{$company_infos[0]->why_should_join}}
                                </span></h5>
                </div>  
            </div>
          </div>
            <div class="modal fade" id="EditCompanyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">Basic Company Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="company_form" name="EditCompanyForm">
              @csrf
              <div class="form-ad">
                <div class="form-group">
                  <label class="control-label">Contact Name</label>
                  <input type="text" name="contact_name" ng-model="contact_name" class="form-control" ng-pattern="/^[a-zA-Z\s]*$/" required>
                  <div style="color:red" ng-show="EditCompanyForm.contact_name.$dirty && EditCompanyForm.contact_name.$invalid">
                    <span ng-show="EditCompanyForm.contact_name.$error.pattern">Contact Name must contain only characters!</span>
                    <span ng-show="EditCompanyForm.contact_name.$error.required">Contact Name is required.</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Contact Email</label>
                  <input type="text" name="contact_email" ng-model="contact_email" class="form-control" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
                  <div style="color:red" ng-show="EditCompanyForm.contact_email.$dirty && EditCompanyForm.contact_email.$invalid">
                    <span ng-show="EditCompanyForm.contact_email.$error.pattern">Contact Email is invalid!</span>
                    <span ng-show="EditCompanyForm.contact_email.$error.required">Contact Email is required.</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Contact Phone</label>
                  <input type="text" name="contact_phone" ng-model="contact_phone" class="form-control" ng-pattern="/^([0-9\s\-\+\(\)]*)$/" required>
                  <div style="color:red" ng-show="EditCompanyForm.contact_phone.$dirty && EditCompanyForm.contact_phone.$invalid">
                    <span ng-show="EditCompanyForm.contact_phone.$error.pattern">Contact Phone is invalid!</span>
                    <span ng-show="EditCompanyForm.contact_phone.$error.required">Contact Phone is required.</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">What you do</label>
                  <textarea class="form-control" name="what_you_do" ng-model="what_you_do" class="form-control" rows="5" id="what"></textarea>
                  <div style="color:red" ng-show="EditCompanyForm.what_you_do.$dirty && EditCompanyForm.what_you_do.$invalid">
                    <span ng-show="EditCompanyForm.what_you_do.$error.required">What you do is required.</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Why you should join</label>
                  <textarea class="form-control" name="why_should_join" ng-model="why_should_join" class="form-control" rows="5" id="why"></textarea>
                  <div style="color:red" ng-show="EditCompanyForm.why_should_join.$dirty && EditCompanyForm.why_should_join.$invalid">
                    <span ng-show="EditCompanyForm.why_should_join.$error.required">Why you should join is required.</span>
                  </div>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" ng-click="UpdateCompany()" ng-disabled="EditCompanyForm.$invalid" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>




          
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="EditCompanyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">Basic Company Information</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="company_form" name="EditCompanyForm">
              @csrf
              <div class="form-ad">
                <div class="form-group">
                  <label class="control-label">Contact Name</label>
                  <input type="text" name="contact_name" ng-model="contact_name" class="form-control" ng-pattern="/^[a-zA-Z\s]*$/" required>
                  <div style="color:red" ng-show="EditCompanyForm.contact_name.$dirty && EditCompanyForm.contact_name.$invalid">
                    <span ng-show="EditCompanyForm.contact_name.$error.pattern">Contact Name must contain only characters!</span>
                    <span ng-show="EditCompanyForm.contact_name.$error.required">Contact Name is required.</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Contact Email</label>
                  <input type="text" name="contact_email" ng-model="contact_email" class="form-control" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
                  <div style="color:red" ng-show="EditCompanyForm.contact_email.$dirty && EditCompanyForm.contact_email.$invalid">
                    <span ng-show="EditCompanyForm.contact_email.$error.pattern">Contact Email is invalid!</span>
                    <span ng-show="EditCompanyForm.contact_email.$error.required">Contact Email is required.</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Contact Phone</label>
                  <input type="text" name="contact_phone" ng-model="contact_phone" class="form-control" ng-pattern="/^([0-9\s\-\+\(\)]*)$/" required>
                  <div style="color:red" ng-show="EditCompanyForm.contact_phone.$dirty && EditCompanyForm.contact_phone.$invalid">
                    <span ng-show="EditCompanyForm.contact_phone.$error.pattern">Contact Phone is invalid!</span>
                    <span ng-show="EditCompanyForm.contact_phone.$error.required">Contact Phone is required.</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">What you do</label>
                  <textarea class="form-control" name="what_you_do" ng-model="what_you_do" class="form-control" rows="5" id="what"></textarea>
                  <div style="color:red" ng-show="EditCompanyForm.what_you_do.$dirty && EditCompanyForm.what_you_do.$invalid">
                    <span ng-show="EditCompanyForm.what_you_do.$error.required">What you do is required.</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Why you should join</label>
                  <textarea class="form-control" name="why_should_join" ng-model="why_should_join" class="form-control" rows="5" id="why"></textarea>
                  <div style="color:red" ng-show="EditCompanyForm.why_should_join.$dirty && EditCompanyForm.why_should_join.$invalid">
                    <span ng-show="EditCompanyForm.why_should_join.$error.required">Why you should join is required.</span>
                  </div>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" ng-click="UpdateCompany()" ng-disabled="EditCompanyForm.$invalid" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>



<script src="/js/jquery-min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
<script src="script.js"></script>

<script>
  var job_categories={!! json_encode($job_categories) !!};
  var states={!! json_encode($states) !!};
  // var countries={!! json_encode($countries) !!};
  var company_infos ={!! json_encode($company_infos) !!};

  var app = angular.module('myApp', []);
  app.config(function($interpolateProvider){
     $interpolateProvider.startSymbol('<%');
     $interpolateProvider.endSymbol('%>');
  });

  app.controller('myCtrl', function($scope, $http,$window) {
    $scope.job_categories = job_categories;
    $scope.company_infos = company_infos[0];
    $scope.user_id ="{{$company_infos[0]->user_id}}";

    $scope.editCompany = function(){
      $scope.id = $scope.company_infos.id;
      $scope.company_name = $scope.company_infos.company_name;
      $scope.job_category_id = $scope.company_infos.job_category_id;
      $scope.state_id = $scope.company_infos.state_id;
      $scope.contact_name = $scope.company_infos.contact_name;
      $scope.contact_phone = $scope.company_infos.contact_phone;
      $scope.contact_email = $scope.company_infos.contact_email;
      $scope.what_you_do = $scope.company_infos.what_you_do;
      $scope.why_should_join = $scope.company_infos.why_should_join;
      $scope.logo = $scope.company_infos.logo;
    }

    $scope.UpdateCompany = function()
    {
      $http.post('/api/v1/update_company_information', 
      {
          id: $scope.id,
          company_name:$scope.company_name,
          job_category_id: $scope.job_category_id,
          state_id: $scope.state_id,
          contact_name:$scope.contact_name,
          contact_phone: $scope.contact_phone,
          contact_email:$scope.contact_email,
          what_you_do: $scope.what_you_do,
          why_should_join: $scope.why_should_join,
          logo: $scope.logo,
      }).then(function mySuccess(response) 
      {
        console.log(response.data.data);
        if(response.data.data = 1)
        {
           $window.location.reload();
        }
      }, 
      function myError(response) 
      {
          console.log(response);
      });
    }
  });

  $(document).ready(function() {

  $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });

    $(".file-upload").on('change', function(){
    var id ="{{$company_infos[0]->id}}";
    var form_data = new FormData();
    var files = $('#file')[0].files[0];
    form_data.append('logo',files);
    form_data.append('id',id);

    // console.log(form_data);

        $.ajax({
            type: 'POST',
            url: '/api/v1/update_logo',
            data: form_data,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {

                // console.log(data.data.photo);
            $('#update_img').attr('src','/photo/'+data.data.logo);
            },
            error: function (data, textStatus, jqXHR) {
                console.log('Error:', data);
            }
        });
    });
});
</script>

@notify_js
@notify_render
@endsection