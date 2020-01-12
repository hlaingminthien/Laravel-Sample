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
@if($user_infos[0]->cv_correct == 1)
<div id="content" ng-app="myApp" ng-controller="myCtrl">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="inner-box my-resume">
					<div class="add-post-btn itm">
						<h3> CV Information 
							<div class="float-right">
								<a href="#" class="btn-added" id="edit_button_wexp" ng-click="editcv()" data-toggle="modal" 
								data-target="#EditCVModal"><i class="ti-plus"></i>Edit</a>
								<input type="hidden" name="user_id" value="{{$user_id}}">
							</div>
						</h3>
					</div>
					<div class="author-resume">
						<div class="thumb">
							<img src="/photo/{{$user_infos[0]->photo}}" 
						  	id="update_img" alt="">
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
								<div class="col-lg-4 col-md-4 col-xs-12">
									<h3>{{$user_infos[0]->name}}  
                					<span><i class="fas fa-check-circle" style="color: #3578e5;"></i></span>
									</h3>
									<p class="sub-title">
										<img src="https://img.icons8.com/dotty/26/000000/new-job.png"> 
							  			{{$user_infos[0]->job_position}}</p>
									<p><span class="address">
										<img src="https://img.icons8.com/dotty/26/000000/type.png">  {{$user_infos[0]->job_category}}</span></p>
									<p><span>
										<img src="https://img.icons8.com/cotton/30/000000/conference-call.png">
										{{$user_infos[0]->experlevel}}
									</span></p>
						  		</div>
						  		<div class="col-lg-4 col-md-4 col-xs-12">
						  			<br>
									<p class="sub-title">
										<img src="https://img.icons8.com/carbon-copy/32/000000/money-bag.png">
							  		{{$user_infos[0]->expected_salary}}MMK</p>
									<p><span class="address">
										<img src="https://img.icons8.com/dotty/30/000000/graduation-cap.png">
										 {{$user_infos[0]->education}}</span></p>
									<p><span>
										<img src="https://img.icons8.com/dotty/30/000000/property-with-timer.png">
										{{$user_infos[0]->employment_type}}
									</span></p>
						  		</div>
						  	<div class="col-lg-5 col-md-5 col-xs-12">
						  			
									<p class="sub-title">
										<img src="https://img.icons8.com/carbon-copy/30/000000/rescan-document.png">
							 				{{$user_infos[0]->bond_with_prev_company}}
							 				bond with previous company</p>
									<p>
										<span class="address">
											<img src="https://img.icons8.com/wired/30/000000/permanent-job.png">
											{{$user_infos[0]->limit_jobs_with_prev_company}}
											limit jobs with previous company
										</span>
									</p>
									<p><span class="address">
										<img src="https://img.icons8.com/dotty/30/000000/query-inner-join-left.png">
									 {{$user_infos[0]->employment_status}}
									</span></p>
						  		</div>
							</div>
						</div>
					</div>
					<div class="about-me item">
						<div class="add-post-btn">
							<h3> Basic Information 
								<div class="float-right">
									<a href="#" class="btn-added" id="edit_button_wexp" ng-click="editbasicuser()" data-toggle="modal" 
									data-target="#EditUserBasicModal"><i class="ti-plus"></i>Edit</a>
								</div>
							</h3>
					    </div>
						 <div class="row basic_info">
	 						<div class="col-lg-3 col-md-3 col-xs-12">
								<h5>
									<span class="date">
										<img src="https://img.icons8.com/ios/25/000000/email-open.png">
										{{$user_infos[0]->email}}</span>
								</h5>
								<h5> 
						    		<span class="date">
						    			<img src="https://img.icons8.com/dotty/28/000000/ringing-phone.png">  {{$user_infos[0]->phone}}
						    		</span>
								</h5>
								<h5><span class="date">
								<img src="https://img.icons8.com/ios/27/000000/identification-documents.png">
								 {{$user_infos[0]->nrc}}
								</span></h5>
								<h5><span class="date">
									<img src="https://img.icons8.com/ios/30/000000/drag-gender-neutral.png">
									{{$user_infos[0]->gender}}
								</span></h5>
						    </div>
						    <div class="col-lg-3 col-md-3 col-xs-12">
								<h5><span class="date">
									<img src="https://img.icons8.com/ios/28/000000/multicultural-people.png">
									{{$user_infos[0]->race}}
								</span></h5>
								<h5><span class="date">
									<img src="https://img.icons8.com/ios/28/000000/pray.png">
									{{$user_infos[0]->religious}}
								</span></h5>
								<h5><span class="date">
									<img src="https://img.icons8.com/wired/30/000000/order-delivered.png"> 
									 {{$user_infos[0]->native_town}}
								</span></h5>
								<h5><span class="date">
									<img src="https://img.icons8.com/ios/26/000000/birth-date.png">  
									{{$user_infos[0]->date_of_birth}}</span>
								</h5>
						    </div>
						    <div class="col-lg-3 col-md-3 col-xs-12">
								<h5><span class="date">
									<img src="https://img.icons8.com/ios/28/000000/scale.png">{{$user_infos[0]->weight}}
								</span></h5>
								<h5><span class="date">
									<img src="https://img.icons8.com/ios/28/000000/height.png">{{$user_infos[0]->height}}
								</span></h5>
								<h5><span class="date">
									<img src="https://img.icons8.com/wired/26/000000/like.png">
									{{$user_infos[0]->marital_status}}</span></h5>
								<h5><span class="date">
									<img src="https://img.icons8.com/dotty/28/000000/health-book.png">  
								{{$user_infos[0]->health}}</span>
								</h5>
						    </div>	
						    <div class="col-lg-3 col-md-3 col-xs-12">
								<h5><span class="date">
									<img src="https://img.icons8.com/wired/28/000000/about-us-female.png">
									{{$user_infos[0]->emergency_contact_name}}
								</span></h5>
								<h5><span class="date">
									<img src="https://img.icons8.com/wired/28/000000/phone.png">
									{{$user_infos[0]->emergency_phone}}
								</span></h5>
								<h5><span class="date">
									<img src="https://img.icons8.com/cotton/28/000000/family.png">
									 {{$user_infos[0]->relation_with_econtact}}
									</span></h5>
								<h5><span class="date"><img src="https://img.icons8.com/dotty/30/000000/address-book-2.png">  
								{{$user_infos[0]->address}}</span></h5>
						    </div>
						 </div>
					</div>

					<div class="work-experence item">
						<div class="add-post-btn">
							<h3>Work Experience
								<div class="float-right">
									<a href="#" class="btn-added" data-toggle="modal" data-target="#workexpModalCenter">Add</a>
								</div>
							</h3>
					    </div>

						<div ng-repeat="x in work_exps" ng-if="work_exps !== null">
							<input type="hidden" id="wexp_id" value="<% x.id %>">
							<div class="add-post-btn">
								<div class="float-right">
									<a href="#" class="btn-added" id="edit_button_wexp" ng-click="edit(x.id)" data-toggle="modal" 
									data-target="#EditWexp"><i class="ti-plus"></i>Edit</a>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-xs-6">
									<h5><span class="date" style="color: black;">
										<img src="https://img.icons8.com/dotty/30/000000/businesswoman.png">
									<% x.job_postion %>
								</span></h5>
					    
									<h5><span class="date">
										<img src="https://img.icons8.com/dotty/26/000000/type.png"> <% x.job_cat_name %>
									</span></h5>

									<h5><span class="date">
										<img src="https://img.icons8.com/dotty/28/000000/permanent-job.png"> <% x.job_exp_name %>
									</span></h5>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-6">
									<h5><span class="date">
										<img src="https://img.icons8.com/ios/28/000000/date-to.png"> <% x.star_date %> <img src="https://img.icons8.com/carbon-copy/25/000000/long-arrow-right.png"> <% x.end_date %>
										</span>
					    			</h5>
									<h5>
										<span class="date">
											<img src="https://img.icons8.com/wired/30/000000/medium-priority.png">
											<a href="#" data-toggle="tooltip" data-placement="right"
							 				title="<% x.left_reason %>" ng-bind="x.left_reason | limitTo:55" style="color: #9a9a9a;text-transform:none;"></a>
											<a href="#" data-toggle="tooltip" data-placement="right"
							 				title="<% x.left_reason %>" ng-if="x.left_reason.length > 55" style="color: #9a9a9a;text-transform:none;">....</a>
					    				</span>
					    			</h5>
					    			<h5>
					    				<span class="date">
											<img src="https://img.icons8.com/carbon-copy/30/000000/document.png">
											<a href="#" data-toggle="tooltip" data-placement="right"
						 					title="<% x.proof %>" ng-bind="x.proof | limitTo:55" style="color: #9a9a9a;
						 					text-transform:none;"></a>
											<a href="#" data-toggle="tooltip" data-placement="right"
						 					title="<% x.proof %>" ng-if="x.proof.length > 55" style="color: #9a9a9a;text-transform:none;">....</a>
					    				</span>
					    			</h5>
								</div>
							</div>
				    	</div>
					</div>

					<div class="education item">
						<div class="add-post-btn">
							<h3>Training Certificates
								<div class="float-right">
									<a href="#" class="btn-added" data-toggle="modal" data-target="#train_certi_modal">
									Add</a>
								</div>
							</h3>
					    </div>
						<div ng-repeat="y in train_certs">
							<div class="add-post-btn">
								<div class="float-right">
									<a href="#" class="btn-train" id="edit_button_wexp" ng-click="Edit_Traing(y.id)" data-toggle="modal" 
									data-target="#EditTraing"><i class="ti-plus"></i>Edit</a>
								</div>
					    	</div>


							<div class="row">
								<div class="col-lg-6 col-md-6 col-xs-6">
									<h5>
										<img src="https://img.icons8.com/wired/30/000000/document.png"> <% y.name %>
									</h5>
					    			<h5>
					    				<span class="date">
					    					<img src="https://img.icons8.com/cotton/30/000000/type.png">
					    	 				<% y.university %>
					    	 			</span>
					    	 		</h5>
					    	 	</div>
					    	 	<div class="col-lg-6 col-md-6 col-xs-6">
					    	 		<h5>
					    	 			<span class="date">
					    					<img src="https://img.icons8.com/cotton/30/000000/type.png">
					    	 				<% y.time_limit %>
					    	 			</span>
					    	 		</h5>
									<h5>
										<span class="date"><img src="https://img.icons8.com/ios/28/000000/date-to.png"> <% y.start_date %> 
											<img src="https://img.icons8.com/carbon-copy/25/000000/long-arrow-right.png"> <% y.end_date %>
										</span>
									</h5>
					    		</div>
					    	</div>

					    </div>
					</div>
			
				</div>   <!-- end of box -->

			</div>
		</div>
	</div>

	<!-- Wexp Save Modal -->
	<div class="modal fade" id="workexpModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  		<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h4 class="modal-title" id="exampleModalLongTitle">Working Experience</h4>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		       <!-- start -->
			       	<form id="save_workexpform" name="workexpForm" novalidate >
			        @csrf
		       			<div class="form-ad">
		    				<div class="form-group">
		    					<input type="text" name="job_postion" ng-model="job_postion" class="form-control" placeholder="Job Position" ng-pattern="/^[a-zA-Z\s]*$/" required>
		    					<div style="color:red" ng-show="!workexpForm.job_postion.$dirty && job_postion==undefined" id="jobPosition_error">
			  						<h5></h5>
			  					</div>
		    					<div style="color:red" ng-show="workexpForm.job_postion.$dirty && workexpForm.job_postion.$invalid">
		    						<span ng-show="workexpForm.job_postion.$error.pattern">Job Position must contain only characters!</span>
			  						<span ng-show="workexpForm.job_postion.$error.required">Job Position is required.</span>
			  					</div>
		    				</div>
		    				<div class="form-group">
		    					<select ng-model="selectedjobcat" name="job_category" value="selectedjobcat" ng-options="job_category.id as job_category.name for job_category in job_categories" class="form-control" >
		        				</select>
		    				</div>
		    				<div class="form-group">
							    <select ng-model="selectedexperlevel" name="experlevel" value="selectedexperlevel" ng-options="exper_level.id as exper_level.name for exper_level in exper_levels" class="form-control" >
							    </select>
		    				</div>
		    				<div class="form-group">
		    					<input type="date" name="star_date" ng-model="star_date" class="form-control" placeholder="Start date" required>
		    					<div style="color:red" ng-show="!workexpForm.star_date.$dirty && star_date==undefined" id="startDate_error">
			  						<h5></h5>
			  					</div>
		    					<div style="color:red" ng-show="workexpForm.star_date.$dirty && workexpForm.star_date.$invalid">
			  						<span ng-show="workexpForm.star_date.$error.required">Start date is required.</span>
			  					</div>
		    				</div>
		    				<div class="form-group">
		    					<input type="date" name="end_date" ng-model="end_date" class="form-control" placeholder="End date" required>
		    					<div style="color:red" ng-show="workexpForm.end_date.$dirty && workexpForm.end_date.$invalid">
			  						<span ng-show="workexpForm.end_date.$error.required">End date is required.</span>
			  					</div>
			  					<div style="color:red" ng-show="!workexpForm.end_date.$dirty && end_date==undefined" id="endDate_error">
			  						<h5></h5>
			  					</div>
		    				</div>
		    				<div class="form-group">
		    					<textarea class="form-control" name="left_reason" 
		    					ng-model="left_reason" rows="3" id="address" placeholder="Reason why you left"></textarea>
		    				</div>
		    				<div class="form-group">
		    					<input type="text" name="proof" ng-model="proof" class="form-control" placeholder="Proof">
		    				</div>
		    			</div>
	       			<!-- end -->
	       			</form>
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        			<button type="submit" ng-click="SaveWorkExp()" class="btn btn-primary">Save</button>
        			<!--  ng-disabled="workexpForm.$invalid" -->
      			</div>
    		</div>
  		</div>
	</div>  
	<!-- end modal  -->

	<!-- Wexp Edit Modal -->
	<div class="modal fade" id="EditWexp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	  	
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h4 class="modal-title" id="exampleModalLongTitle">Working Experience</h4>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		       		<!-- start -->
		       		<form id="edit_workexpform" name="EditWexpForm">
		       		@csrf
		       			<input type="hidden" name="edit_id" ng-model="edit_id">
		       			<div class="form-ad">
							<div class="form-group">
								<input type="text" name="job_postion" ng-model="job_postion" class="form-control" placeholder="Job Position" ng-pattern="/^[a-zA-Z\s]*$/" required>
								<div style="color:red" ng-show="EditWexpForm.job_postion.$dirty && EditWexpForm.job_postion.$invalid">
									<span ng-show="EditWexpForm.job_postion.$error.pattern">Job Position must contain only characters!</span>
			  						<span ng-show="EditWexpForm.job_postion.$error.required">Job Position is required.</span>
			  					</div>
			  					<div style="color:red" ng-show="!EditWexpForm.job_postion.$dirty && job_postion==undefined" id="editJobPosition_error">
			  						<h5></h5>
			  					</div>
							</div>
							<div class="form-group">
								<select ng-model="selectedjobcat" name="job_category" value="selectedjobcat" ng-options="job_category.id as job_category.name for job_category in job_categories" class="form-control" >
			        			</select>
							</div>
							<div class="form-group">
								<select ng-model="selectedexperlevel" name="experlevel" value="selectedexperlevel" ng-options="exper_level.id as exper_level.name for exper_level in exper_levels" class="form-control" >
			        			</select>
							</div>
							<div class="form-group">
								<input type="date" name="start_date"  ng-model="start_date" class="form-control" placeholder="Start date" required>
								<div style="color:red" ng-show="EditWexpForm.start_date.$dirty && EditWexpForm.start_date.$invalid">
			  						<span ng-show="EditWexpForm.start_date.$error.required">Start date is required.</span>
			  					</div>
			  					<div style="color:red" ng-show="!EditWexpForm.start_date.$dirty && start_date==undefined" id="editStartDate_error">
			  						<h5></h5>
			  					</div>
							</div>
							<div class="form-group">
								<input type="date" name="end_date"  ng-model="end_date" class="form-control" placeholder="End date" required>
								<div style="color:red" ng-show="EditWexpForm.end_date.$dirty && EditWexpForm.end_date.$invalid">
			  						<span ng-show="EditWexpForm.end_date.$error.required">End date is required.</span>
			  					</div>
			  					<div style="color:red" ng-show="!EditWexpForm.end_date.$dirty && end_date==undefined" id="editEndDate_error">
			  						<h5></h5>
			  					</div>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="left_reason" 
								ng-model="left_reason" rows="3" id="address" placeholder="Reason why you left"></textarea>
							</div>
							<div class="form-group">
								<input type="text" name="proof" ng-model="proof" class="form-control" placeholder="Proof">
							</div>
						</div>
		       			<!-- end -->
		       		</form>
		      	</div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
			        <button type="button" ng-click="UpdateWorkExp()" class="btn btn-primary">Update</button>
			    </div>
		    </div>
		</div>
	</div>	
	<!-- end modal  -->

	<!-- Train_Certificate Save Modal -->
	<div class="modal fade" id="train_certi_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h4 class="modal-title" id="exampleModalLongTitle">Training Certificates</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
    			</div>
      			<div class="modal-body">
       			<!-- start -->
       				<form id="save_certi" name="train_certi_form">
        			@csrf
	    				<div class="form-ad">
	    					<div class="form-group">
	    						<input type="text" name="name" ng-model="name" class="form-control" placeholder="Name" ng-pattern="/^[a-zA-Z\s]*$/" required>
	    						<div style="color:red" ng-show="!train_certi_form.name.$dirty && name==undefined" id="name_error">
			  						<h5></h5>
			  					</div>
	    						<div style="color:red" ng-show="train_certi_form.name.$dirty && train_certi_form.name.$invalid">
	    							<span ng-show="train_certi_form.name.$error.pattern">Name must contain only characters!</span>
			  						<span ng-show="train_certi_form.name.$error.required">Name is required.</span>
			  					</div>
	    					</div>
	    					<div class="form-group">
	    						<input type="text" name="university" ng-model="university" class="form-control" placeholder="University" ng-pattern="/^[a-zA-Z\s]*$/" required>
	    						<div style="color:red" ng-show="!train_certi_form.university.$dirty && university==undefined" id="university_error">
			  						<h5></h5>
			  					</div>
	    						<div style="color:red" ng-show="train_certi_form.university.$dirty && train_certi_form.university.$invalid">
	    							<span ng-show="train_certi_form.university.$error.pattern">University must contain only characters!</span>
			  						<span ng-show="train_certi_form.university.$error.required">University is required.</span>
			  					</div>
	    					</div>
	    					<div class="form-group">
	    						<input type="text" name="time_limit" ng-model="time_limit" class="form-control" placeholder="Time Limit" required>
	    						<div style="color:red" ng-show="!train_certi_form.time_limit.$dirty && time_limit==undefined" id="timelimit_error">
			  						<h5></h5>
			  					</div>
	    						<div style="color:red" ng-show="train_certi_form.time_limit.$dirty && train_certi_form.time_limit.$invalid">
			  						<span ng-show="train_certi_form.time_limit.$error.required">Time Limit is required.</span>
			  					</div>
	    					</div>
	    					<div class="form-group">
	    						<input type="date" name="start_date" ng-model="start_date" class="form-control" placeholder="Start date" required>

	    						<div style="color:red" ng-show="!train_certi_form.start_date.$dirty && start_date==undefined" id="train_startDate_error">
			  						<h5></h5>
			  					</div>
	    						<div style="color:red" ng-show="train_certi_form.start_date.$dirty && train_certi_form.start_date.$invalid">
			  						<span ng-show="train_certi_form.start_date.$error.required">
			  							Start date is required.
			  						</span>
			  					</div>
	    					</div>
	    					<div class="form-group">
	    						<input type="date" name="end_date" ng-model="end_date" class="form-control" placeholder="End date" required>
	    						<div style="color:red" ng-show="!train_certi_form.end_date.$dirty && end_date==undefined" id="train_endDate_error">
			  						<h5></h5>
			  					</div>
	    						<div style="color:red" ng-show="train_certi_form.end_date.$dirty && train_certi_form.end_date.$invalid">
			  						<span ng-show="train_certi_form.end_date.$error.required">
			  						End date is required.</span>
			  					</div>
	    					</div>
	    				</div>
       					<!-- end -->
       				</form>
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        			<button type="button" ng-click="SaveTrainType()" class="btn btn-primary">Save</button>
      			</div>
    		</div>
  		</div>
	</div>  

	<!-- end modal  -->

	<!-- Edit Train_Certificate Modal -->
	<div class="modal fade" id="EditTraing" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    
		    <div class="modal-content">
			    <div class="modal-header">
			        <h4 class="modal-title" id="exampleModalLongTitle">Training Certificates</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
		      	<div class="modal-body">
		       <!-- start -->
			       	<form id="edit_certi" name="EditTraingForm">
			        @csrf
				       	<input type="hidden" name="edit_train_id" ng-model="edit_train_id">

					    <div class="form-ad">
					    	<div class="form-group">
					    		<input type="text" name="name" ng-model="name" class="form-control" placeholder="Name" ng-pattern="/^[a-zA-Z\s]*$/" required>
					    		<div style="color:red" ng-show="EditTraingForm.name.$dirty && EditTraingForm.name.$invalid">
					    			<span ng-show="EditTraingForm.name.$error.pattern">Name must contain only characters!</span>
				  					<span ng-show="EditTraingForm.name.$error.required">Name is required.</span>
				  				</div>
					    	</div>
					    	<div class="form-group">
					    		<input type="text" name="university" ng-model="university" class="form-control" placeholder="University" ng-pattern="/^[a-zA-Z\s]*$/" required>
					    		<div style="color:red" ng-show="EditTraingForm.university.$dirty && EditTraingForm.university.$invalid">
					    			<span ng-show="EditTraingForm.university.$error.pattern">University must contain only characters!</span>
				  					<span ng-show="EditTraingForm.university.$error.required">University is required.</span>
				  				</div>
					    	</div>
					    	<div class="form-group">
					    		<input type="text" name="time_limit" ng-model="time_limit" class="form-control" placeholder="Time Limit" required>
					    		<div style="color:red" ng-show="EditTraingForm.time_limit.$dirty && EditTraingForm.time_limit.$invalid">
				  					<span ng-show="EditTraingForm.time_limit.$error.required">Time Limit is required.</span>
				  				</div>
					    	</div>
					    	<div class="form-group">
					    		<input type="date" name="start_date" ng-model="start_date" class="form-control" placeholder="Start date" required>
					    		<div style="color:red" ng-show="EditTraingForm.start_date.$dirty && EditTraingForm.start_date.$invalid">
				  					<span ng-show="EditTraingForm.start_date.$error.required">Start date is required.</span>
				  				</div>
					    	</div>
					    	<div class="form-group">
					    		<input type="date" name="end_date" ng-model="end_date" class="form-control" placeholder="End date" required>
					    		<div style="color:red" ng-show="EditTraingForm.end_date.$dirty && EditTraingForm.end_date.$invalid">
				  					<span ng-show="EditTraingForm.end_date.$error.required">End date is required.</span>
				  				</div>
					    	</div>
					    </div>
			       <!-- end -->
			       	</form>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        	<button type="button" ng-click="UpdateTrainType()" class="btn btn-primary">Update</button>
		      	</div>
		    </div>
	  	</div>
	</div>  
	<!-- end modal  -->

	<!-- Edit Job Basic Info Modal -->
	<div class="modal fade" id="EditCVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h4 class="modal-title" id="exampleModalLongTitle">Basic CV Information</h4>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
	      		</div>
	      		<div class="modal-body">
			        <form id="basic_cv_form" name= "myForm">
			            @csrf
			          	<div class="form-ad">
				          	<div class="form-group">
				          		<label class="control-label">Job Position</label>
				          		<input type="text" name="job_position" ng-model="job_position" class="form-control" placeholder="e.g. Accountact,Manager" ng-pattern="/^[a-zA-Z\s]*$/" required>
				          		<div style="color:red" ng-show="myForm.job_position.$dirty && myForm.job_position.$invalid">
				          			<span ng-show="myForm.job_position.$error.pattern">Job Position must contain only characters!</span>
		  							<span ng-show="myForm.job_position.$error.required">Job Position is required.</span>
		  						</div>
				          	</div>
			          		<div class="form-group">
			          			<label class="control-label" for="job_category">Job Category:</label>
			          			<select class="form-control" id="job_category" name="jobcate_id" ng-model="jobcate_id">
					            @foreach($job_categories as $job_category)
					            <option value="{{$job_category->id}}">{{$job_category->name}}</option>
					            @endforeach
					          	</select>
			          		</div>
			          		<div class="form-group">
			          			<label class="control-label" for="experlevel">Experience Level:</label>
					          	<select class="form-control" id="experlevel" name="experlevel_id" ng-model="experlevel_id">
					            @foreach($exper_levels as $exper_level)
					            <option value="{{$exper_level->id}}">{{$exper_level->name}}</option>
					            @endforeach
					          	</select>
			          		</div>
		          			<div class="form-group">
					          	<label class="control-label" for="location">Location:</label>
					          	<select class="form-control" id="location" name="state_id" ng-model="state_id">
					            @foreach($states as $state)
					            <option value="{{$state->id}}">{{$state->name}}</option>
					            @endforeach
					          	</select>
		          			</div>
		          			<div class="form-group">
					          	<label class="control-label">Expected Salary</label>
					          	<input type="text" name="expected_salary" ng-model="expected_salary" class="form-control" placeholder="e.g. 500000MMK" required>
					          	<div style="color:red" ng-show="myForm.expected_salary.$dirty && myForm.expected_salary.$invalid">
		  							<span ng-show="myForm.expected_salary.$error.required">Expected Salary is required.</span>
		  						</div>
		          			</div>
		          			<div class="form-group">
					          	<label class="control-label">Education/School Name</label>
					          	<input type="text" name="education" ng-model="education" class="form-control" placeholder="e.g. BCSC,BEHS(10)" required>
					          	<div style="color:red" ng-show="myForm.education.$dirty && myForm.education.$invalid">
		  							<span ng-show="myForm.education.$error.required">Education/School Name is required.</span>
		  						</div>
		          			</div>
		          			<div class="form-group">
		          				<div class="row">
		          					<div class="col-lg-6 col-md-6 col-xs-12">
		          						<label class="control-label">Bond with previous<br>company</label>
		      							<div class="radio_center">
		      								<label class="radio-inline">
		          								<input type="radio" id="have" value="have" name="bond_with_prev_company" ng-model="bond_with_prev_company">
		          								<label class="radio-inline__label" for="have">have</label>
		      								</label>
		      								<label class="radio-inline">
		          								<input type="radio" id="no" value="no" name="bond_with_prev_company" ng-model="bond_with_prev_company">
		          								<label class="radio-inline__label" for="no">no</label>
		      								</label>
		      							</div>
		            				</div>
		          					<div class="col-lg-6 col-md-6 col-xs-12">
		          						<label class="control-label">Limitation with previous company</label>
		          						<br>
		          						<div class="radio_center">
									        <label class="radio-inline">
										        <input type="radio" id="have" value="have" name="limit_jobs_with_prev_company" ng-model="limit_jobs_with_prev_company">
			          							<label class="radio-inline__label" for="have">have</label>
		          							</label>
		          							<label class="radio-inline">
									          	<input type="radio" id="no" value="no" name="limit_jobs_with_prev_company" ng-model="limit_jobs_with_prev_company">
									          	<label class="radio-inline__label" for="no">no</label>
		          							</label>
		          						</div>
		          					</div>
		          				</div>
		          			</div>
		          		</div>
		        	</form>
	      		</div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" ng-click="UpdateCV()" ng-disabled="myForm.$invalid" class="btn btn-primary">Update</button>
			    </div>
	    	</div>
	  	</div>
	</div>
	<!-- end modal  -->

	<!-- Edit User Basic Info Modal -->
	<div class="modal fade" id="EditUserBasicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
		      	<div class="modal-header">
			        <h4 class="modal-title" id="exampleModalLongTitle">Basic CV Information</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
				<div class="modal-body">
					<form class="form-ad" id="Edit_UserBasic" name="EditUserBasicForm" enctype="multipart/form-data">
	  				@csrf
						<div class="form-group">
							<label class="control-label">Name</label>
							<input type="text" name="name" ng-model="name" class="form-control" placeholder="Name" disabled>
						</div>
						<div class="form-group">
							<label class="control-label">Email</label>
							<input type="text" name="email" ng-model="email" class="form-control" placeholder="Your@domain.com" disabled>
						</div>
						<div class="form-group">
							<label class="control-label">Phone Number</label>
							<input type="text" name="phone" ng-model="phone" class="form-control" placeholder="e.g. 09790000000"  disabled>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-xs-12">
		 							<label class="control-label">Nrc</label>
									<input type="text" name="nrc" ng-model="nrc" class="form-control" placeholder="e.g.13/layana(n)01233" required>
									<div style="color:red" ng-show="EditUserBasicForm.nrc.$dirty && EditUserBasicForm.nrc.$invalid">
					  					<span ng-show="EditUserBasicForm.nrc.$error.required">Nrc is required.</span>
					  				</div>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-12">
									<label class="control-label">Gender</label>
									<br>
									<div class="radio_center">
										<label class="radio-inline">
											<input type="radio" id="male" value="male" name="gender" 
											ng-model="gender">
											<label class="radio-inline__label" for="male">Male</label>
										</label>
										<label class="radio-inline">
											<input type="radio" id="female" value="female" name="gender" 
											ng-model="gender">
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
									<input type="text" name="race" ng-model="race" class="form-control" placeholder="e.g. Burmese" ng-pattern="/^[a-zA-Z\s]*$/" required>
									<div style="color:red" ng-show="EditUserBasicForm.race.$dirty && EditUserBasicForm.race.$invalid" >
										<span ng-show="EditUserBasicForm.race.$error.pattern">Race must contain only characters!</span>
					  					<span ng-show="EditUserBasicForm.race.$error.required">Race is required.</span>
					  				</div>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-12">
									<label class="control-label">Religious</label>
									<input type="text" name="religious" ng-model="religious" class="form-control" placeholder="e.g. Buddha" ng-pattern="/^[a-zA-Z\s]*$/" required>
									<div style="color:red" ng-show="EditUserBasicForm.religious.$dirty && EditUserBasicForm.religious.$invalid">
										<span ng-show="EditUserBasicForm.religious.$error.pattern">Religious must contain only characters!</span>
					  					<span ng-show="EditUserBasicForm.religious.$error.required">Religious is required.</span>
					  				</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-xs-12">
									<label class="control-label">Native Town</label>
									<input type="text" name="native_town" ng-model="native_town" class="form-control" placeholder="e.g. Yangon" ng-pattern="/^[a-zA-Z\s]*$/" required>
									<div style="color:red" ng-show="EditUserBasicForm.native_town.$dirty && EditUserBasicForm.native_town.$invalid">
										<span ng-show="EditUserBasicForm.native_town.$error.pattern">Native Town must contain only characters!</span>
					  					<span ng-show="EditUserBasicForm.native_town.$error.required">Native Town is required.</span>
					  				</div>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-12">
									<label class="control-label">Date of Birth</label>
									<input type="text" name="date_of_birth" ng-model="date_of_birth" class="form-control" placeholder="e.g. 12/1/1994" required>
									<div style="color:red" ng-show="EditUserBasicForm.date_of_birth.$dirty && EditUserBasicForm.date_of_birth.$invalid">
					  					<span ng-show="EditUserBasicForm.date_of_birth.$error.required">Date of Birth is required.</span>
					  				</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-xs-12">
									<label class="control-label">Weight</label>
									<input type="text" name="weight" ng-model="weight" class="form-control" placeholder="e.g.185lbs" required>
									<div style="color:red" ng-show="EditUserBasicForm.weight.$dirty && EditUserBasicForm.weight.$invalid">
					  					<span ng-show="EditUserBasicForm.weight.$error.required">Weight is required.</span>
					  				</div>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-12">
									<label class="control-label">Height</label>
									<input type="text" name="height" ng-model="height" class="form-control">
									<div style="color:red" ng-show="EditUserBasicForm.height.$dirty && EditUserBasicForm.height.$invalid">
					  					<span ng-show="EditUserBasicForm.height.$error.required">Height is required.</span>
					  				</div>
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
											<input type="radio" name="marital_status" value="have_marriage" ng-model="marital_status"> have_marriage
										</label>
										<label class="radio-inline">
											<input type="radio" name="marital_status" value="no_marriage"
											ng-model="marital_status"> no_marriage
										</label>
										<label class="radio-inline">
											<input type="radio" name="marital_status" value="divorce" ng-model="marital_status"> divorce
										</label>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-12">
									<label class="control-label">Health</label>
									<input type="text" name="health" ng-model="health" class="form-control" placeholder="e.g. good/bad" ng-pattern="/^[a-zA-Z\s]*$/" required>
									<div style="color:red" ng-show="EditUserBasicForm.health.$dirty && EditUserBasicForm.health.$invalid">
										<span ng-show="EditUserBasicForm.health.$error.pattern">Health must contain only characters!</span>
					  					<span ng-show="EditUserBasicForm.health.$error.required">Health is required.</span>
					  				</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Emergency Contact Name</label>
							<input type="textarea" name="emergency_contact_name" ng-model="emergency_contact_name" class="form-control" placeholder="e.g. Su Su" ng-pattern="/^[a-zA-Z\s]*$/" required>
							<div style="color:red" ng-show="EditUserBasicForm.emergency_contact_name.$dirty && EditUserBasicForm.emergency_contact_name.$invalid">
								<span ng-show="EditUserBasicForm.emergency_contact_name.$error.pattern">Emergency Contact Name must contain only characters!</span>
					  			<span ng-show="EditUserBasicForm.emergency_contact_name.$error.required">Emergency Contact Name is required.</span>
					  		</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-xs-12">
									<label class="control-label">Emergency Phone</label>
									<input type="text" name="emergency_phone" ng-model="emergency_phone" class="form-control" placeholder="e.g. 0978122222" ng-pattern="/^[0-9]*$/" required>
									<div style="color:red" ng-show="EditUserBasicForm.emergency_phone.$dirty && EditUserBasicForm.emergency_phone.$invalid">
										<span ng-show="EditUserBasicForm.emergency_phone.$error.pattern">Phone number is not valid.</span>
						  				<span ng-show="EditUserBasicForm.emergency_phone.$error.required">Emergency Phone is required.</span>
						  			</div>
								</div>
								<div class="col-lg-6 col-md-6 col-xs-12">
									<label class="control-label">Relation with emergency contact</label>
									<input type="text" name="relation_with_econtact" ng-model="relation_with_econtact" class="form-control" placeholder="e.g. father/mother" ng-pattern="/^[a-zA-Z\s]*$/" required>
									<div style="color:red" ng-show="EditUserBasicForm.relation_with_econtact.$dirty && EditUserBasicForm.relation_with_econtact.$invalid">
										<span ng-show="EditUserBasicForm.relation_with_econtact.$error.pattern">Relation with emergency contact must contain only characters.</span>
						  				<span ng-show="EditUserBasicForm.relation_with_econtact.$error.required">Relation with emergency contact is required.</span>
						  			</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<textarea class="form-control" name="address" ng-model="address" rows="4" id="address"></textarea>
							<div style="color:red" ng-show="EditUserBasicForm.address.$dirty && EditUserBasicForm.address.$invalid" required>
						  		<span ng-show="EditUserBasicForm.address.$error.required">Address is required.</span>
						  	</div>
						</div><br>
					</form>
				</div>
				<div class="modal-footer">
			  		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  		<button type="button" ng-click="UpdateUserBasic()" class="btn btn-primary" ng-disabled="EditUserBasicForm.$invalid">Update</button>
				</div>
			</div>
		</div>
	</div>  
	<!-- end modal  -->
</div>

@else
	<div class="container cv_correct">
		<div class="row justify-content-center">
	     <img src="https://cdn.dribbble.com/users/1181180/screenshots/7025252/media/aa9558875314510c281a4483bc99da22.gif"><br>
	     <p id="p1">We need to verify your cv form,</p> <br>
	     <p id="p2">Please wait for a time!</p> 
		</div>
	</div>
	<br>
@endif

<script src="/js/jquery-min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
<script src="script.js"></script>

<script>
	var job_categories={!! json_encode($job_categories) !!};
	var exper_levels ={!! json_encode($exper_levels) !!};
	var user_infos ={!! json_encode($user_infos) !!};

	var app = angular.module('myApp', []);

	app.config(function($interpolateProvider){
	   $interpolateProvider.startSymbol('<%');
	   $interpolateProvider.endSymbol('%>');
	});

	app.controller('myCtrl', function($scope, $http,$window) {

		$('#workexpModalCenter').on('hidden.bs.modal', function(e) {
  			document.getElementById('save_workexpform').reset();

  			$("#jobPosition_error").html(" ");
  			$("#startDate_error").html(" ");
  			$("#endDate_error").html(" ");
		});

		$('#train_certi_modal').on('hidden.bs.modal', function(e) {
			console.log('workexpModalCenter');
  			document.getElementById('save_certi').reset();
  			$("#name_error").html(" ");
  			$("#trainType_error").html(" ");
  			$("#train_startDate_error").html(" ");
  			$("#train_endDate_error").html(" ");
		});

		$scope.job_categories = job_categories;
		$scope.exper_levels =exper_levels;
		$scope.user_infos = user_infos[0];
		$scope.user_id ="{{$user_infos[0]->user_id}}";
		$scope.cv_id = "{{$user_infos[0]->cv_id}}";
		$scope.selectedjobcat = $scope.job_categories[0].id;
		$scope.selectedexperlevel =$scope.exper_levels[0].id;

		//Work Experience CRUD
		$scope.SaveWorkExp = function(){
			var start_date = $scope.star_date;
			if($scope.star_date != undefined)
			{
				start_date = convert($scope.star_date);
			}

			var end_date = $scope.end_date;
			if($scope.end_date != undefined)
			{
				end_date = convert($scope.end_date);
			}

			if($scope.job_postion == undefined)
			{
				$("#jobPosition_error").html("Job Position is required");
			}
			if(start_date == undefined)
			{
				$("#startDate_error").html("Start Date is required");
			}
			if(end_date == undefined)
			{
				$("#endDate_error").html("End Date is required");
			}
			if($scope.job_postion != undefined && start_date != undefined && end_date != undefined)
			{
				$http.post('/api/work_exp/save', 
		        {
		        	user_id:$scope.user_id,
		            cv_id: $scope.cv_id,
		            job_postion:$scope.job_postion,
		            jobcate_id: $scope.selectedjobcat,
		            experlevel_id: $scope.selectedexperlevel,
		            star_date: start_date,
		            end_date: end_date,
		            left_reason:$scope.left_reason,
		            proof:$scope.proof
		        }).
		        then(function mySuccess(response) {
		        	if(response.status = 200){
		        	 $scope.work_exps.push(response.data.data);
		        	 $window.location.reload();
		        	}
		        }, function myError(response) {
		        	console.log(response);
			});
		    }
		}


		$http.get('/api/work_exp/get_info?cid='+$scope.cv_id).
        	then(function mySuccess(response) {
        		$scope.work_exps = response.data.data;
        	}, function myError(response) {
        	console.log(response);
        }); 

		$scope.edit = function(id){
  			$http.get('/api/work_exp/edit_wexp?id='+id).
        		then(function mySuccess(response) 
	        		{
			        	$scope.edit_wexp = response.data.data;
			        	$scope.edit_id = $scope.edit_wexp.id;
			        	$scope.job_postion = $scope.edit_wexp.job_postion;
			        	$scope.selectedjobcat = $scope.edit_wexp.jobcate_id;
			        	$scope.selectedexperlevel = $scope.edit_wexp.experlevel_id;
			        	$scope.star_date =new Date($scope.edit_wexp.star_date);
			        	$scope.end_date =new Date($scope.edit_wexp.end_date);
			        	$scope.left_reason = $scope.edit_wexp.left_reason;
			        	$scope.proof = $scope.edit_wexp.proof;
	        		}, 
        		function myError(response) {
        			console.log(response);
        		}); 
			}

		$scope.UpdateWorkExp = function(){

			var start_date = $scope.star_date;
			if($scope.star_date != undefined)
			{
				start_date = convert($scope.star_date);
			}

			var end_date = $scope.end_date;
			if($scope.end_date != undefined)
			{
				end_date = convert($scope.end_date);
			}

			if($scope.job_postion == undefined)
			{
				$("#editJobPosition_error").html("Job Position is required");
			}
			if(start_date == undefined)
			{
				$("#editStartDate_error").html("Start Date is required");
			}
			if(end_date == undefined)
			{
				$("#editEndDate_error").html("End Date is required");
			}
			if($scope.job_postion != undefined && start_date != undefined && end_date != undefined)
			{
				$http.post('/api/work_exp/update_wexp', 
		        {
		        	id :$scope.edit_id,
		        	user_id:$scope.user_id,
		            cv_id: $scope.cv_id,
		            job_postion:$scope.job_postion,
		            jobcate_id: $scope.selectedjobcat,
		            experlevel_id: $scope.selectedexperlevel,
		            star_date: start_date,
		            end_date: end_date,
		            left_reason:$scope.left_reason,
		            proof:$scope.proof
		        }).
		        then(function mySuccess(response) {
	        	
		        if(response.data.data = 1){
		             
		        	 $window.location.reload();
		        }
		          
		        }, function myError(response) {
		        	console.log(response);
		        });
		    }

		}
		//end of Work Experience

		//Training certificates CRUD 
		$scope.SaveTrainType = function(){

		var start_date = convert($scope.start_date);
		var end_date = convert($scope.end_date);

		var start_date = $scope.start_date;
		if($scope.start_date != undefined)
		{
			start_date = convert($scope.start_date);
		}

		var end_date = $scope.end_date;
		if($scope.end_date != undefined)
		{
			end_date = convert($scope.end_date);
		}

		if($scope.name == undefined)
		{
			$("#name_error").html("Name is required");
		}
		if($scope.university == undefined)
		{
			$("#university_error").html("University is required");
		}
		if($scope.time_limit == undefined)
		{
			$("#timelimit_error").html("Time Limit is required");
		}
		if(start_date == undefined)
		{
			$("#train_startDate_error").html("Start Date is required");
		}
		if(end_date == undefined)
		{
			$("#train_endDate_error").html("End Date is required");
		}

		if($scope.name != undefined && $scope.university != undefined && $scope.time_limit != undefined && start_date != undefined && end_date != undefined)
		{
			$http.post('/api/train_certificate/save', 
		        {
		            cv_id: $scope.cv_id,
		            name:$scope.name,
		            university: $scope.university,
		            time_limit: $scope.time_limit,
		            start_date: start_date,
		            end_date: end_date
		        }).
		        then(function mySuccess(response) {
		        	if(response.status = 200){
		        	 $window.location.reload();
		          }
		        }, function myError(response) {
		        	console.log(response);
		        });
	    	}
		}

 		$http.get('/api/train_certificate/index?cv_id='+$scope.cv_id).
        then(function mySuccess(response) {

        	$scope.train_certs = response.data.data;

        }, function myError(response) {
        	console.log(response);
        }); 

 		$scope.Edit_Traing = function(id){

  		$http.get('/api/train_certificate/edit?id='+id).
        then(function mySuccess(response) 
        {
        	$scope.edit_train_certs = response.data.data;
        	$scope.edit_train_id = $scope.edit_train_certs.id;
        	$scope.name = $scope.edit_train_certs.name;
        	$scope.university = $scope.edit_train_certs.university;
        	$scope.time_limit = $scope.edit_train_certs.time_limit;
        	$scope.start_date =new Date($scope.edit_train_certs.start_date);
        	$scope.end_date =new Date($scope.edit_train_certs.end_date);
        }, 
        function myError(response) {
        	console.log(response);
        }); 
	}

	$scope.UpdateTrainType = function(){

		var start_date = convert($scope.start_date);
		var end_date = convert($scope.end_date);

		var start_date = $scope.star_date;
		if($scope.start_date != undefined)
		{
			start_date = convert($scope.start_date);
		}

		var end_date = $scope.end_date;
		if($scope.end_date != undefined)
		{
			end_date = convert($scope.end_date);
		}

		if($scope.name != undefined && $scope.university != undefined && $scope.time_limit != undefined && start_date != undefined && end_date != undefined)
		{
			$http.post('/api/train_certificate/update', 
	        {
	        	id :$scope.edit_train_id,
	            cv_id: $scope.cv_id,
	            name:$scope.name,
	            university: $scope.university,
	            time_limit: $scope.time_limit,
	            start_date: start_date,
	            end_date: end_date
	        }).
	        then(function mySuccess(response) {
	        	
	        if(response.data.data = 1)
	        {
	        	 $window.location.reload();
	        }
	          
	        }, function myError(response) {
	        	console.log(response);
	        });
	    }

	}
//end of Training


//cv
	$scope.editcv = function(){
		$scope.job_position = $scope.user_infos.job_position;
		$scope.jobcate_id = $scope.user_infos.jobcate_id;
		$scope.experlevel_id = $scope.user_infos.experlevel_id;
		$scope.state_id = $scope.user_infos.state_id;
		$scope.expected_salary = $scope.user_infos.expected_salary;
		$scope.education = $scope.user_infos.education;
		$scope.bond_with_prev_company = $scope.user_infos.bond_with_prev_company;
		$scope.limit_jobs_with_prev_company = $scope.user_infos.limit_jobs_with_prev_company;
	}

	$scope.UpdateCV = function(){
	$http.post('/api/cv/update', 
        {
            id: $scope.cv_id,
            job_position:$scope.job_position,
            jobcate_id: $scope.jobcate_id,
            experlevel_id: $scope.experlevel_id,
            state_id: $scope.state_id,
            expected_salary: $scope.expected_salary,
            education: $scope.education,
            bond_with_prev_company:$scope.bond_with_prev_company,
            limit_jobs_with_prev_company: $scope.limit_jobs_with_prev_company
        }).
        then(function mySuccess(response) {
        	
        if(response.data.data = 1){

        	 $window.location.reload();
        }
          
        }, function myError(response) {
        	console.log(response);
        });
	}
//end of cv


//basic user info
	$scope.editbasicuser = function(){

		$scope.name = $scope.user_infos.name;
		$scope.email = $scope.user_infos.email;
		$scope.phone = $scope.user_infos.phone;
		$scope.nrc = $scope.user_infos.nrc;
		$scope.gender = $scope.user_infos.gender;
		$scope.race = $scope.user_infos.race;
		$scope.religious = $scope.user_infos.religious;
		$scope.native_town = $scope.user_infos.native_town;
		$scope.date_of_birth = $scope.user_infos.date_of_birth;
		$scope.weight = $scope.user_infos.weight;
		$scope.height = $scope.user_infos.height;
		$scope.marital_status = $scope.user_infos.marital_status;
		$scope.health = $scope.user_infos.health;
		$scope.emergency_contact_name = $scope.user_infos.emergency_contact_name;
		$scope.emergency_phone = $scope.user_infos.emergency_phone;
		$scope.relation_with_econtact = $scope.user_infos.relation_with_econtact;
		$scope.address = $scope.user_infos.address;
		$scope.photo = $scope.user_infos.photo;
	}

	$scope.UpdateUserBasic = function(){
		$http.post('/api/cv/update_basic_user', 
        {
            id: $scope.user_id,
            nrc:$scope.nrc,
            gender: $scope.gender,
            race: $scope.race,
            religious: $scope.religious,
            native_town: $scope.native_town,
            date_of_birth: $scope.date_of_birth,
            weight:$scope.weight,
            height: $scope.height,
            marital_status:$scope.marital_status,
            health: $scope.health,
            emergency_contact_name: $scope.emergency_contact_name,
            emergency_phone: $scope.emergency_phone,
            relation_with_econtact: $scope.relation_with_econtact,
            address: $scope.address
     
        }).
        then(function mySuccess(response) {
        	
        if(response.data.data = 1){

        	 $window.location.reload();
        }
        }, function myError(response) {
        	console.log(response);
        });
	}

//end basic user info

	function convert(str) {
	  var date = new Date(str),
	    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
	    day = ("0" + date.getDate()).slice(-2);
	  return [date.getFullYear(), mnth, day].join("-");
	}
});

$(document).ready(function() {

	$(".upload-button").on('click', function() {
       $(".file-upload").click();
    });

    $(".file-upload").on('change', function(){
      var user_id ="{{$user_infos[0]->user_id}}";
	  var form_data = new FormData();
	  var files = $('#file')[0].files[0];
	  form_data.append('photo',files);
	  form_data.append('id',user_id);

    // console.log(form_data);

        $.ajax({
            type: 'POST',
            url: '/api/cv/update_photo',
            data: form_data,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {

            		// console.log(data.data.photo);
            $('#update_img').attr('src','/photo/'+data.data.photo);
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