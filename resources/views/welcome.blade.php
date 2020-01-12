@extends('layouts.master')

<header id="home" class="hero-area" ng-app="myApp" ng-controller="myCtrl">

@include('layouts.partials.search')


</header>

@section('content')

<section class="category section bg-gray bgForCompany">
     <div class="container">
    <div class="section-header">  
      <h2 class="section-title">@lang('welcome.top_partner_company')</h2>      
    </div>
      <div class="row justify-content-center">    
      <div class="col-lg-3 col-md-6 col-xs-12 f-category-custom  ">
        <a href="#" >    
       <img src="https://stopcyberbullyingday.org/wp-content/uploads/2016/01/Telenor-logo-stop-cyberbullying-day-quote.jpg" alt="" class="img-fluid rounded image">
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12 f-category-custom  ">
        <a href="#" >    
       <img src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/032014/ooredoo.png?itok=RDeMCMXx" alt="" class="img-fluid rounded image" alt="">
        </a>
      </div>
       <div class="col-lg-3 col-md-6 col-xs-12 f-category-custom  ">
        <a href="#" >    
       <img src="https://static.apkmodmirror.com/images/cover/com.bit.kbz.png" alt="" class="img-fluid rounded image" alt="">
        </a>
      </div>

      <div class="col-lg-3 col-md-6 col-xs-12 f-category-custom  ">
        <a href="#" >    
       <img src="https://www.yangond2d.com/editable/images/site/Logo_Square.jpg" alt="" class="img-fluid rounded image" alt="">
        </a>
      </div>

      
    </div>

      <div class="row justify-content-center mt-3">    
     
      <div class="col-lg-3 col-md-6 col-xs-12 f-category-custom  ">
        <a href="#" >    
       <img src="https://res-4.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_256,w_256,f_auto,q_auto:eco/v1435407559/qvxqqazwstbdocifkseu.png" alt="">
        </a>
      </div>
       <div class="col-lg-3 col-md-6 col-xs-12 f-category-custom  ">
        <a href="#" >    
       <img src="https://pngimage.net/wp-content/uploads/2018/06/mcc-png-5.png" alt="" class="img-fluid rounded image" alt="">
        </a>
      </div>

      <div class="col-lg-3 col-md-6 col-xs-12 f-category-custom  ">
        <a href="#" >    
       <img src="https://enroll.strategyfirst.edu.mm/st.png" alt="" class="img-fluid rounded image" alt="">
        </a>
      </div>

       <div class="col-lg-3 col-md-6 col-xs-12 f-category-custom  ">
        <a href="#" >    
       <img src="https://cdn.freebiesupply.com/logos/large/2x/vivo-1-logo-png-transparent.png" alt="" class="img-fluid rounded image" alt="">
        </a>
      </div>
    </div>

    </div>
</section>
<!-- company list section end -->
<!-- Category Section Start -->
<section class="category section bg-gray aa">
  <div class="container">
    <div class="section-header">  
      <h2 class="section-title">@lang('welcome.browse_categories')</h2>
      <p>@lang('welcome.most_popular_categories')</p>
    </div>
    <div class="row">  
      @foreach($job_categories as $job_category) 
      <div class="col-lg-3 col-md-6 col-xs-12 f-category">
        <a href="{{route('jobs.job_categories_details',['jobcategory_id'=>$job_category->id])}}">
          <div class="icon bg-color-1">

          
            <img src = "{{$job_category->iconName}}" class="img">
          </div>
          <h3>{{$job_category->name}}</h3>
          @if($job_category->pos_count > 0)
          <p>({{$job_category->pos_count}} jobs)</p>
          @else
          <p>(0 jobs)</p>
          @endif
        </a>
      </div>
      @endForeach
      <div class="col-12 text-center mt-4">
        <a href="{{route('jobs.all_featured_job_category')}}" class="btn btn-common">
        @lang('welcome.browse_all_categories')</a>
      </div>
    </div>
  </div>
</section>
<!-- Category Section End -->  

<!-- See first Job Section Start -->
@if(count($topping_job_positions) > 0)
<section class="category section bg-gray aa">
  <div class="container">
    <div class="section-header">  
      <h2 class="section-title">@lang('welcome.featured_jobs')</h2>
    </div>
    <div class="row">  
      @foreach($topping_job_positions as $topping_job) 
        <div class="col-lg-6 col-md-12 col-xs-12">
          <a class="job-listings-featured" href="{{route('jobs.details',['job_position_id'=>$topping_job->id,
                'company_id'=>$topping_job->company_id])}}">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="job-company-logo">
                  <img src="/employerPhotos/{{$topping_job->logo}}" alt="" style="width: 50px;">
                </div>
                <div class="job-details">
                  <h3>{{$topping_job->position_name}}</h3>
                  <span class="company-neme">{{$topping_job->companyName}}</span>
                  <div class="tags">
                    <span><i class="lni-map-marker"></i>{{$topping_job->stateName}}</span>
                    <span><i class="lni-user"></i>{{$topping_job->contactName}}</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endForeach
      <div class="col-12 text-center mt-4">
        <a href="{{route('jobs.all_seefirst_jobs')}}" class="btn btn-common">
        @lang('welcome.browse_all_top_jobs')</a>
      </div>
    </div>
  </div>
</section>
@endif
<!-- See first Job Section End -->

<!-- refresh Job Section Start -->
@if(count($job_positions) > 0)
<section class="category section bg-gray aa">
  <div class="container">
    <div class="section-header">  
      <h2 class="section-title">@lang('welcome.updated_jobs')</h2>
    </div>
    <div class="row">  
      @foreach($job_positions as $job_pos) 
        <div class="col-lg-6 col-md-12 col-xs-12">
          <a class="job-listings-featured" href="{{route('jobs.details',['job_position_id'=>$job_pos->id,
                'company_id'=>$job_pos->company_id])}}">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="job-company-logo">
                  <img src="/employerPhotos/{{$job_pos->logo}}" alt="" style="width: 50px;">
                </div>
                <div class="job-details">
                  <h3>{{$job_pos->position_name}}</h3>
                  <span class="company-neme">{{$job_pos->companyName}}</span>
                  <div class="tags">
                    <span><i class="lni-map-marker"></i>{{$job_pos->stateName}}</span>
                    <span><i class="lni-user"></i>{{$job_pos->contactName}}</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
      <div class="col-12 text-center mt-4">
        <a href="{{route('jobs.all_featured_job')}}" class="btn btn-common">
        @lang('welcome.browse_all_refresh_jobs')</a>
      </div>
    </div>
  </div>
</section>
@endif
<!-- refresh Job Section End -->

<!-- Browse jobs Section Start -->
  <div id="browse-jobs" class="section bg-gray aa">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="text-wrapper">
            <div>
              <h3>7,000+ Browse Jobs</h3>
              <p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide. The right job is out there.</p>
              <a class="btn btn-common" href="#">Search jobs</a>
            </div>
          </div>
        </div>
         <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="img-thumb">
            <img class="img-fluid" src="/img/search.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Browse jobs Section End -->   

  <!-- How It Work Section Start -->
  <section class="how-it-works section aa">
    <div class="container">
      <div class="section-header">  
        <h2 class="section-title">How It Works?</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus effici turac fringilla lorem facilisis.</p>      
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="work-process">
            <span class="process-icon">
              <i class="lni-user"></i>
            </span>
            <h4>Create an Account</h4>
            <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="work-process step-2">
            <span class="process-icon">
              <i class="lni-search"></i>
            </span>
            <h4>Search Jobs</h4>
            <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="work-process step-3">
            <span class="process-icon">
              <i class="lni-cup"></i>
            </span>
            <h4>Apply</h4>
            <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- How It Work Section End -->

  <!-- Latest Section Start -->
@if(count($latest_jobs) > 0)
  <section id="latest-jobs" class="section bg-gray aa">
    <div class="container">
      <div class="section-header">  
        <h2 class="section-title">@lang('welcome.latest_jobs')</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus effici turac fringilla lorem facilisis.</p>       
      </div>
      <div class="row">
        @foreach($latest_jobs as $latest_job) 
        <div class="col-lg-6 col-md-12 col-xs-12">
          <div class="jobs-latest">
            <div class="img-thumb">
              <img src="/employerPhotos/{{$latest_job->logo}}" alt="" 
              style="width:100%;">
            </div>
            <div class="content">
              <h3><a href="{{route('jobs.details',['job_position_id'=>$latest_job->id,
                'company_id'=>$latest_job->company_id])}}">{{$latest_job->position_name}}</a></h3>
              <p class="brand">{{$latest_job->companyName}}</p>
              <div class="tags">  
                <span><i class="lni-map-marker"></i> {{$latest_job->stateName}}</span>  
                <span><i class="lni-user"></i> {{$latest_job->contactName}}</span> 
              </div>
              <div class="tag mb-3"><i class="lni-tag"></i>
                {!! str_limit($latest_job->job_requirement,120) !!} </div>
                <span class="full-time">{{$latest_job->job_time}}</span> 
            </div>
          </div>
        </div>
        @endForeach
      </div>
    </div>   
  </section>
  @endif
  <!-- Latest Section End -->

  <!-- download Section Start -->
  <section id="download" class="section bg-gray aa">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-8 col-xs-12">
          <div class="download-wrapper">
            <div>
              <div class="download-text">
                <h4>Download Our Best Apps</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et metus effici turac fringilla lorem facilisis, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
              <div class="app-button">
              <a href="#" class="btn btn-border"><i class="lni-apple"></i>Download <br> <span>From App Store</span></a>
              <a href="#" class="btn btn-common btn-effect"><i class="lni-android"></i> Download <br> <span>From Play Store</span></a>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-4 col-xs-12">            
          <div class="download-thumb">
            <img class="img-fluid" src="/img/app.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- download Section Start -->

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script>
 var states={!! json_encode($states) !!};
 var job_cates ={!! json_encode($job_cates) !!};

var app = angular.module('myApp', []);
app.config(function($interpolateProvider){
   $interpolateProvider.startSymbol('<%');
   $interpolateProvider.endSymbol('%>');
});

app.controller('myCtrl', function($scope,$http,$window) {
var k =  "a";
$scope.states = states;
$scope.job_cates = job_cates;
$scope.selectedState = $scope.states[0].id;
$scope.selectedCategory = $scope.job_cates[0].id;
$scope.default_key = k;
$scope.search = function(){

   if(!$scope.position_name){
    
       $scope.key_word = $scope.default_key;

   }
   else{

       $scope.key_word = $scope.position_name;

   }
   // alert($scope.key_word);
   var base_route ='{{ route("jobs.search_result") }}';
   window.location.href = base_route +'?position_name=' + $scope.key_word + '&state_id=' + $scope.selectedState + '&jobcategory_id=' + $scope.selectedCategory;

}

});
</script>  

@notify_js
@notify_render
@endsection