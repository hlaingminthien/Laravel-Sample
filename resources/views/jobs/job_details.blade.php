@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-8 col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper">
              <div class="img-wrapper">
                <img src="/employerPhotos/{{$job_details->logo}}" alt="" class="img image1 rounded">
              </div>
              <div class="content">
                <h3 class="product-title">{{$job_details->position_name}}</h3>
                <p class="brand">{{$job_details->company_name}}</p>
                <div class="tags">  
                  <span><i class="lni-map-marker"></i>{{$job_details->state_name}}</span>  
                  <span><i class="lni-calendar"></i> Posted 26 June, 2020</span>  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="month-price">
              <span class="year">Monthly</span>
              <div class="price">{{$job_details->salary}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Job Detail Section Start -->  
    <section class="job-detail section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-8 col-md-12 col-xs-12">
            <div class="content-area">  
              <h4>Job Description</h4>
              <p>{{$job_details->job_description}}</p>
              <h5>What You Need for this Position</h5>
              {{$job_details->job_requirement}}
              <h5>Benefits</h5>
              <p>{{$job_details->benefits}}</p>
              <a href="#" ng-click="Applyjob('{{$job_details->job_position_id}}','{{$job_details->company_id}}')" class="btn btn-common" ng-class="{disabled:isDisabled}"><b id="apply">Apply job</b></a> 
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-xs-12">
            <div class="sideber">
              <div class="widghet">
                <h3>Job Location</h3>
                <div class="maps">
                  <div id="map" class="map-full">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d405691.57240383344!2d-122.3212843181106!3d37.40247298383319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb68ad0cfc739%3A0x7eb356b66bd4b50e!2sSilicon+Valley%2C+CA%2C+USA!5e0!3m2!1sen!2sbd!4v1538319316724" allowfullscreen=""></iframe>
                  </div>
                </div>
              </div>
              <div class="widghet">
                <h3>Share This Job</h3>
                <div class="share-job">
                  <form method="post" class="subscribe-form">
                    <div class="form-group">
                      <input type="email" name="Email" class="form-control" placeholder="https://joburl.com" required="">
                      <button type="submit" name="subscribe" class="btn btn-common sub-btn"><i class="lni-files"></i></button>
                      <div class="clearfix"></div>
                    </div>
                  </form>
                  <ul class="mt-4 footer-social">
                    <li><a class="facebook" href="https://{{$job_details->facebook_link}}"><i class="lni-facebook-filled"></i></a></li>
                    <!-- <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li> -->
                    <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                  <div class="meta-tag">
                    <span class="meta-part"><a href="#"><i class="lni-star"></i> Write a Review</a></span>
                    <span class="meta-part"><a href="#"><i class="lni-warning"></i> Reports</a></span>
                    <span class="meta-part"><a href="#"><i class="lni-share"></i> Share</a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Job Detail Section End --> 
    
    <!-- Featured Section Start -->
    <section id="featured" class="section bg-gray pb-45">
      <div class="container">
        <h4 class="small-title text-left">Similar Jobs</h4>
        <div class="row">
          <div class="col-lg-6 col-md-12 col-xs-12">
            <a class="job-listings-featured" href="job-details.html">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <div class="job-company-logo">
                    <img src="/img/features/img1.png" alt="">
                  </div>
                  <div class="job-details">
                    <h3>Software Engineer</h3>
                    <span class="company-neme">MizTech</span>
                    <div class="tags">  
                      <span><i class="lni-map-marker"></i> New York</span>  
                      <span><i class="lni-user"></i>John Smith</span>   
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 text-right">
                  <div class="tag-type">
                    <sapn class="heart-icon">
                      <i class="lni-heart"></i>
                    </sapn>
                    <span class="full-time">Full Time</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <a class="job-listings-featured" href="job-details.html">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                  <div class="job-company-logo">
                    <img src="/img/features/img2.png" alt="">
                  </div>
                  <div class="job-details">
                    <h3>Graphic Designer</h3>
                    <span class="company-neme">Hunter Inc.</span>
                    <div class="tags">  
                      <span><i class="lni-map-marker"></i> New York</span>  
                      <span><i class="lni-user"></i>John Smith</span>   
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 text-right">
                  <div class="tag-type">
                    <sapn class="heart-icon">
                      <i class="lni-heart"></i>
                    </sapn>
                    <span class="part-time">Part Time</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>


<!-- Modal -->
<div class="modal fade" id="Jobapplyerror" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Alert</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p class="job_details">Please Register or Login first!</p>
      </div>
      <div class="modal-footer">
        <a type="button" href="{{route('account.register')}}" class="btn btn-primary">Register</a>
        <a type="button" href="{{route('account.login')}}" class="btn btn-primary">Login</a>
      </div>
    </div>
  </div>
</div>
    <!-- Featured Section End -->

<!-- Modal -->
<div class="modal fade" id="cverror" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Alert</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p class="job_details">Please check your cv form!</p>
      </div>
      <div class="modal-footer">
        <a type="button" href="{{route('cv.basic_create')}}" class="btn btn-primary">Update Cv</a>
      </div>
    </div>
  </div>
</div>

<!-- Featured Section End -->



<!-- cv_correct_error Modal -->
<div class="modal fade" id="cv_correct_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Alert</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p class="job_details">Please wait your cv form verification!</p>
      </div>
    </div>
  </div>
</div>

<!-- Featured Section End -->

<script src="/js/jquery-min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-2.5.0.js"></script>
<script>
  var job_details={!! json_encode($job_details) !!};
  var user_id ={!! json_encode($user_id) !!};
  var cv_id ={!! json_encode($cv_id) !!};
  var old_apply = {!! json_encode($old_apply) !!};
  var staff_resource_id ={!! json_encode($staff_resource_id) !!};   
  var cv_correct ={!! json_encode($cv_correct) !!};

  var app = angular.module('myApp', ['ui.bootstrap']);
  app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%').endSymbol('%>');
  });

  app.controller('myCtrl', function($scope, $http,$filter) {
  $scope.job_details = job_details;
  $scope.user_id = user_id;
  $scope.cv_id = cv_id;
  $scope.old_apply = old_apply;
  $scope.staff_resource_id = staff_resource_id;
  $scope.cv_correct =cv_correct;

if($scope.old_apply == null){

  $scope.isDisabled = false;

  }
  else{

    $('#apply').html('Applied Successfully!');
    $scope.isDisabled = true;

  }

$scope.Applyjob = function(job_pos_id,cmp_id){
 
   var date = new Date();
   $scope.apply_time = $filter('date')(new Date(), 'dd-MM-yyyy HH:mm:ss');

if($scope.user_id == null && $scope.cv_id == null){


      $('#Jobapplyerror').modal('show');

  }
else if($scope.user_id !== null && $scope.cv_id == null){


      $('#cverror').modal('show');

}
else if($scope.user_id !== null && $scope.cv_id !== null && $scope.cv_correct == 0){

     $('#cv_correct_error').modal('show');

}
else 
{

 $http.post('/api/v1/job_apply',{

      job_position_id:job_pos_id,
      company_id:cmp_id,
      user_id:$scope.user_id,
      cv_id :$scope.cv_id,
      apply_time : $scope.apply_time,
      staff_resource_id:$scope.staff_resource_id

  }).then(function mySuccess(response) {
      // console.log(response);
      if(response.status = 200){

       $('#apply').html('Applied Successfully!');
       $scope.isDisabled = true;

      }

    }, function myError(response) {

          console.log(response);

    });

}

}
  
  
});
</script>
@endsection