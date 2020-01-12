@extends('layouts.master')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Admin's Dashboard</h3>
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
                    <img src="/photo/{{$user_info->photo}}" id="update_img" alt="">
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
					<h3>{{$user_info->name}}
					<span><i class="fas fa-check-circle" style="color: #3578e5;"></i></span>
					</h3>
				</div>
                    </div>
                      <div class="row">
					
                          <div class="col-lg-4 col-md-4 col-xs-12">
                          	
                              <p>
                                <span class="address">
                                  <img src="https://img.icons8.com/carbon-copy/35/000000/important-mail.png">
                                    {{$user_info->email}}
                                </span>
                              </p>
                              <p>
                                <span>
                                  <img src="https://img.icons8.com/wired/30/000000/cell-phone.png">
                                  {{$user_info->phone}}
                                </span>
                              </p>

                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                              
                                <p><span class="address">
                                   <img src="https://img.icons8.com/dotty/30/000000/identification-documents.png">
                            		{{$user_info->nrc}}
                                </span></p>
                                <p>
                                  <span class="address">
                                    <img src="https://img.icons8.com/ios/30/000000/gender.png">
                                   {{$user_info->gender}}
                                  </span>
                                </p>
                            </div> 
                            <div class="col-lg-4 col-md-4 col-xs-12">
                            </div>
                         </div>
                  </div>
              </div>
			      <div class="about-me item">
			      	<div class="row">
			      		<div class="col-lg-6 col-md-6 col-xs-12">
			      			<h3> Information Detail</h3>
			      		</div>
			      		<div class="col-lg-6 col-md-6 col-xs-12">
			      			<div class="add-post-btn">
			                      
			                          <div class="float-right">
			                              <a href="#" class="btn-added" id="edit_button_wexp" ng-click="editUser()" data-toggle="modal" data-target="#EditUserBasicModal"><i class="ti-plus"></i>Edit</a>
			                          </div>
			            	</div>
			      		</div>
			            
			        </div>
			            <div class="row basic_info">
			                <div class="col-lg-2 col-md-2 col-xs-12 ">
			                                  <h5>
			                                      <span class="date">
			                                        <img src="https://img.icons8.com/ios/28/000000/multicultural-people.png">
			                                		{{$user_info->race}}
			                                      </span>
			                                  </h5>
			                                  <h5> 
			                                      <span class="date">
			                                         <img src="https://img.icons8.com/ios/30/000000/pray.png">
			                               			{{$user_info->religious}}
			                                      </span>
			                                  </h5>
			                                  <h5>
			                                    <span class="date">
			                                          <img src="https://img.icons8.com/ios/30/000000/address.png">
			                                  			{{$user_info->native_town}}
			                                    </span>
			                                  </h5> 
			                	</div>
			                <div class="col-lg-3 col-md-3 col-xs-12" style = "padding-left: 50px;">
			                                      <h5><span class="date">
			                                           <img src="https://img.icons8.com/ios/26/000000/birth-date.png">
			                                 			{{$user_info->date_of_birth}}</span></h5>

			                                 			<h5><span class="date">
			                                           <img src="https://img.icons8.com/ios/28/000000/scale.png">
			                                 			{{$user_info->weight}}</span></h5>

			                                      <h5><span class="date">
			                                             <img src="https://img.icons8.com/material/28/000000/height.png">
			                                  			{{$user_info->height}}
			                                      </span></h5>
			                                     
			                </div>
			                <div class="col-lg-4 col-md-4 col-xs-12">
			                            <h5><span class="date">
			                                    <img src="https://img.icons8.com/wired/30/000000/like.png">
			                      						{{$user_info->marital_status}} 
			                      		</span> </h5>
			                      	    <h5><span class="date">
			                                  <img src="https://img.icons8.com/wired/30/000000/health-book.png">
			                      						{{$user_info->health}} 
			                      		</span> </h5>
			                      	    <h5><span class="date">
			                                 <img src="https://img.icons8.com/dotty/30/000000/address-book-2.png">
			                      						{{$user_info->address}} 
			                      		</span> </h5>



			                              
			                </div>  
			                <div class="col-lg-3 col-md-3 col-xs-12">
			                    <h5><span class="date">
			                        <img src="https://img.icons8.com/wired/28/000000/about-us-female.png">
			                            {{$user_info->emergency_contact_name}}
			                    </span></h5>
			                    <h5><span class="date">
			                        <img src="https://img.icons8.com/wired/28/000000/phone.png"> 		{{$user_info->emergency_phone}}</span></h5>
			                    <h5><span class="date">
			                        <img src="https://img.icons8.com/cotton/28/000000/family.png"> 
			                      		{{$user_info->relation_with_econtact}}
			                    </span></h5>
			                </div>
			            </div>

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
							
							<input type="hidden" name="id" ng-model="id" class="form-control" placeholder="id" disabled>
						</div>
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
			  		<button type="button" ng-click="UpdateUser(id)" class="btn btn-primary" >Update</button>
				</div>
			</div>
		</div>
	</div>
			     

			     </div>
			</div>
		</div>
	</div>
  </div>
</div>

            




<script src="/js/jquery-min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
<script src="script.js"></script>

<script>

 var user_info ={!! json_encode($user_info) !!};

  var app = angular.module('myApp', []);
  app.config(function($interpolateProvider){
     $interpolateProvider.startSymbol('<%');
     $interpolateProvider.endSymbol('%>');
  });

  app.controller('myCtrl', function($scope, $http,$window) {
  
  		
    $scope.user_info = user_info;
    //$scope.user_id ="{{$user_info->name}}";
  	// console.log($scope.user_info);

    $scope.editUser = function(){
      $scope.id = $scope.user_info.id;
      $scope.name = $scope.user_info.name;
      $scope.state_name = $scope.user_info.state_name;
      $scope.city_name = $scope.user_info.city_name;
      $scope.email = $scope.user_info.email;
      $scope.phone = $scope.user_info.phone;
      $scope.nrc = $scope.user_info.nrc;
      $scope.gender = $scope.user_info.gender;
      $scope.race = $scope.user_info.race;
      $scope.religious = $scope.user_info.religious;
      $scope.native_town = $scope.user_info.native_town;
      $scope.date_of_birth = $scope.user_info.date_of_birth;
      $scope.weight = $scope.user_info.weight;
      $scope.height = $scope.user_info.height;
      $scope.marital_status = $scope.user_info.marital_status;
      $scope.health = $scope.user_info.health;
      $scope.address = $scope.user_info.address;
      $scope.emergency_contact_name = $scope.user_info.emergency_contact_name;
      $scope.emergency_phone = $scope.user_info.emergency_phone;
      $scope.relation_with_econtact = $scope.user_info.relation_with_econtact;
      
    }


    	  $scope.UpdateUser = function(id){
    	  	console.log(id)
		$http.post('/api/user/update_basic_user', 
        {
            id: $scope.id,
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
  
  });




  $(document).ready(function() {

  $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });

    $(".file-upload").on('change', function(){
    var user_id ="{{$user_info->id}}";
    var form_data = new FormData();
    var files = $('#file')[0].files[0];
    form_data.append('photo',files);
    form_data.append('id',user_id);

        $.ajax({
            type: 'POST',
            url: '/api/cv/update_photo',
            data: form_data,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data, textStatus, jqXHR) {
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