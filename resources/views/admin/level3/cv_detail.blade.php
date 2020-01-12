@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>CV Form</h3>
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
						<h3> CV Information 
						<div class="float-right">
						<a href="" ng-click="cv_download('{{$edit_cv->id}}')"
							ng-class="{disabled:isDisabled}" class="btn btn-common download_animation">
						<span><i class="fas fa-download"></i> <b id="download">Download</b></span> 
						</a>
						</div>
						</h3>
					</div>
					<div class="author-resume">
						<div class="thumb">
							<img src="/photo/{{$edit_user->photo}}" 
						  	id="update_img" alt="">
						</div>
						<div class="author-info">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12">

								@if($edit_cv->cv_correct == 1)
									<h3>{{$edit_user->name}} <span><i class="fas fa-check-circle" style="color: #3578e5;"></i></span>
									</h3>
								@endif
							    </div>
							</div>
							
							<div class="row">
								<div class="col-lg-4 col-md-4 col-xs-12">
									<p class="sub-title">
										<img src="https://img.icons8.com/dotty/26/000000/new-job.png">
							  			{{$edit_cv->job_position}}
							  			
							  		</p>
									
									<p>
										<span class="address">
												<img src="https://img.icons8.com/dotty/26/000000/type.png">
													 {{$edit_cv->jobcate}}
										</span>
									</p>
									<p>
										<span>
										<img src="https://img.icons8.com/cotton/30/000000/conference-call.png">
										{{$edit_cv->explevel}}
										</span>
									</p>
						  		</div>
						  		<div class="col-lg-3 col-md-3 col-xs-12">
						  		
									<p class="sub-title">
										<img src="https://img.icons8.com/carbon-copy/32/000000/money-bag.png">
								  		{{$edit_cv->expected_salary}}MMK
								  	</p>
									<p>
										<span class="address">
											<img src="https://img.icons8.com/dotty/30/000000/graduation-cap.png">
											 {{$edit_cv->education}}
										</span>
									</p>
									<p><span>
										<img src="https://img.icons8.com/dotty/30/000000/property-with-timer.png">
										{{$edit_cv->employment_type}}
									</span></p>
						  		</div>
						  		<div class="col-lg-5 col-md-5 col-xs-12">
						  			
									<p class="sub-title">
										<img src="https://img.icons8.com/carbon-copy/30/000000/rescan-document.png">
							 				{{$edit_cv->bond_with_prev_company}}
							 				bond with previous company</p>
									<p>
										<span class="address">
											<img src="https://img.icons8.com/wired/30/000000/permanent-job.png">
											{{$edit_cv->limit_jobs_with_prev_company}}
											limit jobs with previous company
										</span>
									</p>
									<p><span class="address">
										<img src="https://img.icons8.com/dotty/30/000000/query-inner-join-left.png">
									 {{$edit_cv->employment_status}}
									</span></p>
						  		</div>
							</div>
						</div>
					</div>
					<div class="about-me item">
						<div class="add-post-btn">
							<h3> Basic Information</h3>
					    </div>
						 <div class="row basic_info">
	 						<div class="col-lg-3 col-md-3 col-xs-12">
								<h5>
									<span class="date">
									<img src="https://img.icons8.com/ios/25/000000/email-open.png">
									 <b ng-bind="email" id="shake" style="font-size: 13px;"></b></span>
								</h5>
								<h5> 
						    		<span class="date">
						    			<img src="https://img.icons8.com/dotty/28/000000/ringing-phone.png">

						    			 <b ng-bind="phone" id="shake" style="font-size: 13px;"></b></span>
								</h5>
								<h5><span class="date"><img src="https://img.icons8.com/ios/27/000000/identification-documents.png">   {{$edit_user->nrc}}</span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/ios/30/000000/drag-gender-neutral.png"> {{$edit_user->gender}}</span></h5>
						    </div>
						    <div class="col-lg-3 col-md-3 col-xs-12">
								<h5><span class="date"><img src="https://img.icons8.com/ios/28/000000/multicultural-people.png"> {{$edit_user->race}}</span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/ios/28/000000/pray.png">{{$edit_user->religious}}</span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/wired/30/000000/order-delivered.png">  {{$edit_user->native_town}}(native town)</span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/ios/26/000000/birth-date.png">   {{$edit_user->date_of_birth}}</span>
								</h5>
						    </div>
						    <div class="col-lg-3 col-md-3 col-xs-12">
								<h5><span class="date"><img src="https://img.icons8.com/ios/28/000000/scale.png">{{$edit_user->weight}}</span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/ios/28/000000/height.png">{{$edit_user->height}}</span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/wired/26/000000/like.png"> {{$edit_user->marital_status}}</span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/dotty/28/000000/health-book.png"> 
								{{$edit_user->health}}</span>
								</h5>
						    </div>	
						    <div class="col-lg-3 col-md-3 col-xs-12">
								<h5><span class="date"><img src="https://img.icons8.com/wired/28/000000/about-us-female.png"> <b ng-bind="emergency_contact_name" id="shake" style="font-size: 13px;"></b></span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/wired/28/000000/phone.png"> <b  ng-bind="emergency_phone" id="shake" style="font-size: 13px;"></b></span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/cotton/28/000000/family.png"> <b ng-bind="relation_with_econtact" id="shake" style="font-size: 13px;"></b></span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/dotty/30/000000/address-book-2.png">  
								<b ng-bind="address" id="shake" style="font-size: 13px;"></b></span></h5>
						    </div>
						 </div>
					</div>

					<div class="work-experence item">
						<div class="add-post-btn">
							<h3>Work Experience</h3>
					    </div>

						@foreach($work_exps as $work_exp)
							<div class="row">
								<div class="col-lg-6 col-md-6 col-xs-6">
									<h5>
										<span class="date" style="color: black;">
											<img src="https://img.icons8.com/dotty/30/000000/businesswoman.png">{{$work_exp->job_postion}}
										</span>
									</h5>
					    
									<h5>
										<span class="date">
											<img src="https://img.icons8.com/dotty/26/000000/type.png">{{$work_exp->job_cat_name}}
										</span>
									</h5>
									<h5>
										<span class="date">
											<img src="https://img.icons8.com/dotty/28/000000/permanent-job.png">{{$work_exp->job_exp_name}}
										</span>
									</h5>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-6">
									<h5>
										<span class="date">
											<img src="https://img.icons8.com/ios/28/000000/date-to.png">{{$work_exp->star_date}}
											<img src="https://img.icons8.com/carbon-copy/25/000000/long-arrow-right.png">{{$work_exp->end_date}}
										</span>
					    			</h5>
									<h5>
										<span class="date">
											<img src="https://img.icons8.com/wired/30/000000/medium-priority.png">
											<a href="#" data-toggle="tooltip" data-placement="right"
							 				title="{{$work_exp->left_reason}}" ng-bind="x.left_reason | limitTo:55" style="color: #9a9a9a;text-transform:none;">{{$work_exp->left_reason}}</a>
											<a href="#" data-toggle="tooltip" data-placement="right"
							 				title="{{$work_exp->left_reason}}" ng-if="x.left_reason.length > 55" style="color: #9a9a9a;text-transform:none;">{{$work_exp->left_reason}}</a>
					    				</span>
					    			</h5>
					    			<h5>
					    				<span class="date">
											<img src="https://img.icons8.com/carbon-copy/30/000000/document.png">
											<a href="#" data-toggle="tooltip" data-placement="right"
						 					title="{{$work_exp->proof}}" ng-bind="x.proof | limitTo:55" style="color: #9a9a9a;
						 					text-transform:none;">{{$work_exp->proof}}</a>
											<a href="#" data-toggle="tooltip" data-placement="right"
						 					title="{{$work_exp->proof}}" ng-if="x.proof.length > 55" style="color: #9a9a9a;text-transform:none;">{{$work_exp->proof}}</a>
					    				</span>
					    			</h5>
								</div>
							</div>
						@endforeach
					</div>

					<div class="education item">
						<div class="add-post-btn">
							<h3>Training Certificates</h3>
					    </div>
						@foreach($train_certis as $train_certi)

						<div class="row">
							<div class="col-lg-6 col-md-6 col-xs-6">
								<h5>
									<i class="lni-certificate size-sm"></i> 
									{{ $train_certi->name }} 
								</h5>
						    	<h5>
						    		<span class="date">
						    			<i class="lni-notepad size-sm"></i> 
						    			{{ $train_certi->university }}
						    		</span>
						    	</h5>
						    </div>
						    <div class="col-lg-6 col-md-6 col-xs-6">
						    	<h5>
						    		<span class="date">
						    			<i class="lni-notepad size-sm"></i> 
						    			{{ $train_certi->time_limit }}
						    		</span>
						    	</h5>
								<h5>
									<span class="date">
										<i class="lni-calendar size-sm"></i> 
										{{ $train_certi->start_date }}
										<i class="lni-arrows-horizontal"></i> 
										{{ $train_certi->end_date }} 
									</span>
								</h5>
							</div>

					    @endforeach
							
				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="/js/jquery-min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
var staff_id={!! json_encode($staff_id) !!};
var cv_down_old_results={!! json_encode($cv_down_old_results) !!};
var edit_user ={!! json_encode($edit_user) !!};
var edit_cv = {!! json_encode($edit_cv) !!};

var app = angular.module('myApp', []);
app.config(function($interpolateProvider){
  $interpolateProvider.startSymbol('<%').endSymbol('%>');
});

app.controller('myCtrl', function($scope, $http ,$filter) {

$scope.staff_id = staff_id;
$scope.cv_down_old_results = cv_down_old_results;
$scope.edit_user = edit_user;
$scope.edit_cv = edit_cv;


if($scope.cv_down_old_results == null){


    $scope.isDisabled = false;

    $scope.phone = 'Download to view';
 	$scope.email = 'Download to view';
    $scope.address = 'Download to view';
    $scope.emergency_contact_name = 'Download to view';
    $scope.emergency_phone = 'Download to view';
    $scope.relation_with_econtact = 'Download to view';


}
else{

    $('#download').html('Downloaded');
    $scope.isDisabled = true;

    $scope.phone =$scope.edit_user.phone;
    $scope.email =$scope.edit_user.email;
    $scope.address = $scope.edit_user.address;
    $scope.emergency_contact_name = $scope.edit_user.emergency_contact_name;
    $scope.emergency_phone = $scope.edit_user.emergency_phone;
    $scope.relation_with_econtact = $scope.edit_user.relation_with_econtact;

}


$scope.cv_download = function(cv_id){

// console.log(cv_id);
// console.log('cmp_id'+ $scope.company_id);
    $http.post('/api/v1/cv_download_by_staff',{

      staff_id: $scope.staff_id,
      cv_id :cv_id

    }).then(function mySuccess(response) {
      // console.log(response.data.data);
      if(response.data.data > 0 ){

       $('#download').html('Downloaded');
       $scope.isDisabled = true;
       $scope.phone =$scope.edit_user.phone;
       $scope.email =$scope.edit_user.email;
       $scope.address = $scope.edit_user.address;
       $scope.emergency_contact_name = $scope.edit_user.emergency_contact_name;
       $scope.emergency_phone = $scope.edit_user.emergency_phone;
       $scope.relation_with_econtact = $scope.edit_user.relation_with_econtact;

      } 
      else{

      		$('#download').html('Number of download that you can is zero');
       		 $scope.isDisabled = true;

      }

      }, function myError(response) {

      		console.log(response);
      });

 }
        
});

$('.date #shake').click(function () {

	
    el = $('.download_animation');
    el.addClass('shake');
    el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
    function (e) {
        el.removeClass('shake');
    });

});


</script>

@endsection