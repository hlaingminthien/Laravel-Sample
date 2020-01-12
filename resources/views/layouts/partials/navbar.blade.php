

    <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">

        <div class="container">
          
          <div class="theme-header clearfix">
           
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="lni-menu"></span>
                <span class="lni-menu"></span>
                <span class="lni-menu"></span>
              </button>
              <a href="{{route('welcome')}}" class="navbar-brand"><img src="/img/logo3.png" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
              <ul class="navbar-nav mr-auto w-100 justify-content-end">
              @auth  
               @if(Auth::user()->hasRole('Employee'))

                <li class="nav-item active">
                  <a class="nav-link-custom" href="{{route('welcome')}}">
                   <img src="https://img.icons8.com/ultraviolet/30/000000/home-page.png">
                    Home
                  </a>
                </li>
                
              @endif
              @endauth
               
              @guest

                <li class="nav-item active">
                  <a class="nav-link" href="{{route('welcome')}}">
                 <img src="https://img.icons8.com/officel/30/000000/mobile-home.png">
                   @lang('nav.home')
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('contacts')}}">
                 <img src="https://img.icons8.com/dusk/32/000000/contact-card.png">
                    @lang('nav.contact')
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="https://img.icons8.com/ultraviolet/30/000000/guest-male.png">
                   @lang('nav.account')
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('account.login')}}">
                     <img src="https://img.icons8.com/plasticine/30/000000/import.png">
                    Sign In</a></li>
                    <li><a class="dropdown-item" href="{{route('account.register')}}">
                     <img src="https://img.icons8.com/officel/30/000000/xbox-r.png">
                    Register</a></li>
                  </ul>
                </li>
              @endguest

              @auth  
                @if(Auth::user()->hasRole('Level1')) 

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img src="https://img.icons8.com/ultraviolet/33/000000/card-in-use.png">
                    @lang('nav.card')
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('admin.cards.create')}}">
                          <img src="https://img.icons8.com/ultraviolet/30/000000/add-property.png">
                          @lang('nav.add_new_card')
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('admin.cards.index')}}">
                         <img src="https://img.icons8.com/ultraviolet/30/000000/overview-pages-3.png">
                          @lang('nav.card_list')
                        </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.company_list')}}">
                    <img src="https://img.icons8.com/ultraviolet/28/000000/real-estate.png">
                    @lang('nav.company_list')
                  </a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://img.icons8.com/ultraviolet/30/000000/construction-worker.png">
                    @lang('nav.staff')
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="{{route('admin.staff.create')}}">
                        <img src="https://img.icons8.com/ultraviolet/30/000000/add-property.png">
                        @lang('nav.create_staff')
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{route('admin.staff.index')}}">
                        <img src="https://img.icons8.com/ultraviolet/30/000000/overview-pages-3.png">
                        @lang('nav.staff_list')
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.cv_list')}}">
                    <img src="https://img.icons8.com/color/30/000000/document.png">
                    @lang('nav.cv_list')
                  </a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img src="https://img.icons8.com/ultraviolet/30/000000/user.png">
                   Hi,{{Auth::user()->name}} 
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="{{route('admin.profile_dashboard')}}">
                        <img src="https://img.icons8.com/ultraviolet/30/000000/change-user-male.png">{{Auth::user()->name}} @lang('nav.dashboard')
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{route('account.logout')}}">
                        <img src="https://img.icons8.com/ultraviolet/30/000000/shutdown.png">@lang('nav.logout')
                      </a>
                    </li>
                  </ul>
                </li>

                @endif
                @if(Auth::user()->hasRole('Level2'))
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.uncheck_company_list')}}">
                  <img src="https://img.icons8.com/ultraviolet/30/000000/department.png">
                    @lang('nav.company_list')
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.uncheck_cv_list')}}">
                   <img src="https://img.icons8.com/ultraviolet/30/000000/overview-pages-3.png">
                    @lang('nav.cv_list')
                  </a>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img src="https://img.icons8.com/ultraviolet/30/000000/user.png">
                     Hi,{{Auth::user()->name}} 
                  </a> 
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('admin.profile_dashboard')}}">
                     <img src="https://img.icons8.com/ultraviolet/30/000000/change-user-female.png">
                      {{Auth::user()->name}} @lang('nav.dashboard')</a></li>
                    <li><a class="dropdown-item" href="{{route('account.logout')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/shutdown.png">
                      Log out</a></li>
                  </ul>
                </li>
              
                @endif
                @if(Auth::user()->hasRole('Level3'))
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.level3.cv_list')}}">
                    <img src="https://img.icons8.com/ultraviolet/30/000000/ingredients-list.png">
                    @lang('nav.cv_list')
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.level3.offered_cv')}}">
                    <img src="https://img.icons8.com/ultraviolet/30/000000/parse-from-clipboard.png">
                    @lang('nav.offered_cv')
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://img.icons8.com/ultraviolet/30/000000/real-estate.png">
                    @lang('nav.company_register')
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="{{route('admin.level3.register_company_basic_create')}}">
                        <img src="https://img.icons8.com/ultraviolet/30/000000/add-property.png">
                        @lang('nav.add_new_company')
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{route('admin.level3.register_company_index')}}">
                        <img src="https://img.icons8.com/color/30/000000/list.png">
                        @lang('nav.registered_company_list')
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://img.icons8.com/ultraviolet/30/000000/parse-from-clipboard.png">
                    @lang('nav.cv_register')
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('admin.level3.register_cv_basic_create')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/add-property.png">
                      @lang('nav.add_new_cv')</a></li>
                    <li><a class="dropdown-item" href="{{route('admin.level3.register_cv_index')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/todo-list.png">
                      @lang('nav.registered_cv_list')</a></li>
                  </ul>
                </li> 
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://img.icons8.com/ultraviolet/30/000000/user.png">
                    Hi,{{Auth::user()->name}} 
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="{{route('admin.profile_dashboard')}}">
                        <img src="https://img.icons8.com/ultraviolet/30/000000/select-user.png">{{Auth::user()->name}} @lang('nav.dashboard')
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{route('account.logout')}}">
                        <img src="https://img.icons8.com/ultraviolet/30/000000/shutdown.png">
                        @lang('nav.logout')
                      </a>
                    </li>
                  </ul>
                </li>
                
                @endif
                @if(Auth::user()->hasRole('Employeer')) 
                

                    <li class="nav-item dropdown">
                        <a class="nav-link-custom dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <img src="https://img.icons8.com/ultraviolet/28/000000/opened-folder.png">
                          Category
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item" href="{{route('employeers.job_categories.create')}}">
                              <img src="https://img.icons8.com/ultraviolet/30/000000/plus.png">
                              Add Category</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="{{route('employeers.job_categories.index')}}">
                              <img src="https://img.icons8.com/ultraviolet/30/000000/ingredients-list.png">
                              Category List</a>
                            </li>

                         </ul>
                 </li>
               
                    <li class="nav-item dropdown">
                  <a class="nav-link-custom dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img src="https://img.icons8.com/ultraviolet/28/000000/user-location.png">
                    Position
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="{{route('employeers.job_positions.create')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/plus.png">
                      Add Position</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{route('employeers.job_positions.index')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/ingredients-list.png">
                      Position List</a>
                    </li>

                   </ul>
                 </li>


                <li class="nav-item dropdown">
                  <a class="nav-link-custom dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://img.icons8.com/ultraviolet/28/000000/about-us-female.png">
                    @lang('nav.interview')
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="{{route('employeers.interview_infos.create')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/plus.png">
                      @lang('nav.add_new_interview_info')</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{route('employeers.interview_infos.index')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/ingredients-list.png">
                       @lang('nav.interview_info_list')</a>
                    </li>

                  </ul>
                </li>

                <li  class="nav-item">
                  <a class="nav-link-custom" href="{{route('employeers.cv_list')}}">
                    <img src="https://img.icons8.com/ultraviolet/30/000000/ingredients-list.png">
                    @lang('nav.cv') 
                  </a>
                </li>
                     <li class="nav-item">
                  <a class="nav-link-custom" href="{{route('employers.card_exchange')}}">
                    <img src="https://img.icons8.com/ultraviolet/28/000000/card-exchange.png">
                    @lang('nav.card_service') 
                  </a>
                   </li>
               
                     <li class="nav-item dropdown">
                  <a class="nav-link-custom dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://img.icons8.com/ultraviolet/28/000000/workers-male.png">
                    @lang('nav.employee')
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="{{route('employers.get_apply_lists')}}">
                       <img src="https://img.icons8.com/ultraviolet/30/000000/overview-pages-3.png">
                     @lang('nav.apply_lists')</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{route('employeers.interview_infos.index')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/ingredients-list.png">
                        @lang('nav.offer_lists')</a>
                    </li>

                  </ul>
                </li>
             

                <li class="nav-item dropdown">
                  <a class="nav-link-custom dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://img.icons8.com/ultraviolet/28/000000/user.png">
                   Hi,{{Auth::user()->name}} 
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('employers.profile_dashboard')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/user-male.png">
                      @lang('nav.profile')</a></li>
                       
                    <li><a class="dropdown-item" href="{{route('account.logout')}}">
                       <img src="https://img.icons8.com/ultraviolet/30/000000/shutdown.png">
                    @lang('nav.logout')</a></li>
                  </ul> 
                </li>

                @endif
                @if(Auth::user()->hasRole('Employee'))
                <li class="nav-item dropdown" >
                  <a class="nav-link-custom dropdown-toggle" id="notification" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <span>
                    <img src="https://img.icons8.com/ultraviolet/30/000000/appointment-reminders.png" class="eg">
                   
                    <span  class="to_add_badge" ><b id="noti_count" id = "infinite-list" data-count="0" ></b></span>

                  @lang('nav.notifications')</span>

                  </a>
                  <ul class="dropdown-menu" id="notification_list">

                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link-custom" href="{{route('employee.who_view_profile')}}">
                  <img src="https://img.icons8.com/ultraviolet/30/000000/find-user-male.png">
                   @lang('nav.employers_views')
                  </a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link-custom dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://img.icons8.com/ultraviolet/30/000000/new-job.png">
                    @lang('nav.applications')
                  </a>
                  <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('employee.job_u_applied')}}">
                  <img src="https://img.icons8.com/dusk/30/000000/permanent-job.png">
                       @lang('nav.applied_jobs')</a></li>
                    <li><a class="dropdown-item" href="{{route('employee.job_by_company')}}">
                      <img src="https://img.icons8.com/officel/30/000000/thinking-male.png">
                       @lang('nav.interviewed_jobs')</a></li>
                    <li><a class="dropdown-item" href="{{route('employee.offer_letter')}}">
                      <img src="https://img.icons8.com/dusk/30/000000/feedback.png">
                        @lang('nav.offer_letters')</a></li>
                  </ul>
                </li>



                <li class="nav-item dropdown">
                  <a class="nav-link-custom dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://img.icons8.com/ultraviolet/30/000000/user.png">
                   Hi,{{Auth::user()->name}} 
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('cv.basic_create')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/edit-user-female.png">
                       @lang('nav.update_cv')</a></li>
                    <li><a class="dropdown-item" href="{{route('account.logout')}}">
                      <img src="https://img.icons8.com/ultraviolet/30/000000/shutdown.png">
                      @lang('nav.logout')</a></li>
                  </ul>
                </li>

                @endif
                @endauth
                  <li class="nav-item dropdown">
                  <a class="nav-link-custom dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img src="https://img.icons8.com/cute-clipart/30/000000/language.png">
                     @lang('nav.language')
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="locale/en">
                        <img src="https://img.icons8.com/color/25/000000/usa.png">
                        @lang('nav.english')
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="locale/unicode">
                        <img src="https://img.icons8.com/color/25/000000/myanmar.png">
                        @lang('nav.myanmar_unicode')
                      </a>
                    </li>
                    <li>
                     <a class="dropdown-item" href="locale/zawgyi">
                        <img src="https://img.icons8.com/color/25/000000/myanmar-circular.png">
                        @lang('nav.myanmar_zawgyi')
                      </a>
                    </li>
                    <li>
                       <a class="dropdown-item" href="locale/chinese">
                        <img src="https://img.icons8.com/cute-clipart/25/000000/china.png">
                        @lang('nav.chinese')
                      </a>
                    </li>
                  </ul>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="mobile-menu" data-logo="/img/logo-mobile.png"></div>
</nav>
      <!-- Navbar End -->
<script src="/js/jquery-min.js"></script>
@auth
@if(Auth::user()->hasRole('Employee'))
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>
// var isEmployee = {{Auth::user()->hasRole('Employee')}};
var current_login_user_id = "{{Auth::user()->id}}";
console.log(current_login_user_id);

    // if(isEmployee){

          $.ajax({
                      type: 'get',
                      url: '/api/v1/get_interview_noti?user_id='+ current_login_user_id,
                      dataType: 'json',
                      success: function (data) {
                          console.log(data.data);
                      var current_count = $('#noti_count').data('count');
                      var new_count = current_count + data.data.noti_read_interviews.length;
                      if(new_count > 0){

                      $('#noti_count').data('count', new_count);
                      $('#noti_count').html('<b>'+ new_count + '</b>');
                      $('.to_add_badge').addClass('badge');
                    }

                     
                    var data = data.data.noti_interviews;
                     $.each(data, function(i, item) {
                    $('#notification_list').append(function() {
                    return $('<li><a class="customdropdown-item" href="#" style="background-color: #24324a;"><div class="notification-item"><div class="thums"><img src="/employerPhotos/'+data[i].company_logo+'"></div><div class="text-left"><p id="message_'+data[i].id+'"> '+ data[i].company_name+' call '+data[i].interview_name +' interview for ' + data[i].position_name +'<b id="icon_'+data[i].id+'"></b></p><span class="time"> <i class="lni-alarm-clock"></i>'+data[i].time+'</span><b id="read_'+data[i].id+'" style="margin-left: 15px;"></b></div></div></a></li>').
                       click({id:data[i].id},handler);
                    });

                    if(data[i].read != 0){

                      $("#message_"+data[i].id).css("color","#00bcd4");
                      // $("#icon_"+data[i].id).html(' <i class="fas fa-bookmark"></i>');
                      $("#icon_"+data[i].id).css("color","#00bcd4");
                      $("#read_"+data[i].id).html(function(){

                      return $('<span><i class="far fa-envelope-open"></i> Read More </span>').click({noti_id:data[i].id},readmore);

                    });


                      }


                    });

                      },
                      error: function (data) {
                        alert('hi');

                          console.log('Error:', data);
                      }
          });


        function handler(event) {   
         // alert(event.data.id);

          $.ajax({
                    type: 'post',
                    url: '/api/v1/make_read?noti_id='+ event.data.id +'&user_id='+current_login_user_id,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data.data);
                    if(data.data.read = 1){

                    $("#message_"+event.data.id).css("color","#00bcd4");
                    // $("#icon_"+event.data.id).html(' <i class="fas fa-bookmark"></i>');
                    $("#icon_"+event.data.id).css("color","#00bcd4");
                    $("#read_"+event.data.id).html(function(){

                      return $('<span><i class="far fa-envelope-open"></i> Read More </span>').click({noti_id:event.data.id},readmore);

                    });

                    var current_count = data.data.current_count.length;
                    // alert(current_count);
                    if(current_count > 0){
                    var new_count = current_count - 1;
                    if(new_count > 0){
                     $('#noti_count').data('count',new_count);
                     $('#noti_count').html('<b>'+ new_count + '</b>');
                     $('.to_add_badge').addClass('badge');

                   }
                    else{

                    $('#noti_count').data('count',new_count);
                    $('#noti_count').html('<b></b>');
                    $(".to_add_badge").removeClass("badge");



                    }
                   }

                    }
                  },
                    error: function (data) {
                        console.log('Error:', data);
                    }
        });

        }


  function readmore(event) { 


     // alert(event.data.noti_id);  
    window.location.href = window.location.origin +'/employee/notification?id='+event.data.noti_id;



     }


function formatDate(date) {
      var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
      ];

      var day = date.getDate();
      var monthIndex = date.getMonth();
      var year = date.getFullYear();

      return day + ' ' + monthNames[monthIndex] + ' ' + year;
    }
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('b4329b9dd7972af5523a', {
          cluster: 'ap1',
          forceTLS: true
    });


    var channel = pusher.subscribe('my-channel');
    channel.bind('App\\Events\\InterviewEvent', function(data) {
    let count = 0;
    
    // alert(JSON.stringify(data));
   if(JSON.stringify(data)){

      var id =JSON.stringify(data.noti_id)
      var noti_id = id.replace(/"|'/g,'');
      var logo =JSON.stringify(data.logo);
      var logo = logo.replace(/"|'/g,'');var time = JSON.stringify(data.time);$time = time.replace(/"|'/g,'');

    $('#notification_list').append(function() {

      return $('<li><a class="customdropdown-item" href="#" style="background-color: #24324a;"><div class="notification-item"><div class="thums"><img src="/employerPhotos/'+logo+'"></div><div class="text-left"><p id="message_'+noti_id+'">'+JSON.stringify(data.company_name)+' call '+JSON.stringify(data.interview_name) +' interview for ' + JSON.stringify(data.position_name) +'<b id="icon_'+noti_id+'"></b></p><span class="time"> <i class="lni-alarm-clock"></i>'+time+'</span><b id="read_'+noti_id+'"style="margin-left: 15px;"></b></div></div></a></li>').click({noti_id:JSON.stringify(data.noti_id)},current_handler);

    });
//count binding 

// var current_count = $('#noti_count').data('count') ;
//                         alert('current_count'+current_count);
//                         var new_count = current_count + 1;
//                         alert('current_new_count'+new_count);
//                         $('#noti_count').data('count',new_count);
//                         $('#noti_count').html('<b>'+ new_count + '</b>');
//                         $('.to_add_badge').addClass('badge'); 

      $.ajax({
                      type: 'get',
                      url: '/api/v1/get_interview_noti?user_id='+ current_login_user_id,
                      dataType: 'json',
                      success: function (data) {
                        console.log(data.data);

                      var current_count = $('#noti_count').data('count');
                      // alert('tag'+current_count);
                      // alert('database'+data.data.noti_read_interviews.length);
                      var new_count =  data.data.noti_read_interviews.length;
                      if(new_count > 0){

                      $('#noti_count').data('count', new_count);
                      $('#noti_count').html('<b>'+ new_count + '</b>');
                      $('.to_add_badge').addClass('badge');

                      
                    }
                      },
                      error: function (data) {
                        alert('hi');

                          console.log('Error:', data);
                      }
            });

    

    }

    });


     function current_handler(event) {  

      var eventlist =event.data.noti_id;
      var event_id = eventlist.replace(/"|'/g,'');
      // console.log(res);

          $.ajax({
                    type: 'post',
                    url: '/api/v1/make_read?noti_id='+ event_id +'&user_id='+current_login_user_id,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data.data);
                    if(data.data.read = 1){

                    $("#message_"+event_id).css("color","#00bcd4");
                    // $("#icon_"+event_id).html(' <i class="fas fa-bookmark"></i>');
                    $("#icon_"+event_id).css("color","#00bcd4");
                    $("#read_"+event_id).html(function(){

                    return $('<span><i class="far fa-envelope-open"></i> Read More </span>').click({noti_id:event_id},readmore);

                    });

                    var current_count = data.data.current_count.length;
                    // alert(current_count);
                    if(current_count > 0){
                    var new_count = current_count - 1;
                    if(new_count > 0){
                     $('#noti_count').data('count',new_count);
                     $('#noti_count').html('<b>'+ new_count + '</b>');
                     $('.to_add_badge').addClass('badge');


                   }
                    else{

                    $('#noti_count').data('count',new_count);
                    $('#noti_count').html('<b></b>');
                    $(".to_add_badge").removeClass("badge");


                    }
                   }


                    }
                  },
                    error: function (data) {
                        console.log('Error:', data);
                    }
        });

        }

// }

var listElm = document.querySelector('#infinite-list');

// Add 20 items.
var loadMore = function() {
  for (var i = 0; i < 20; i++) {
    var item = document.createElement('li');
    item.innerText = 'Item ' + nextItem++;
    listElm.appendChild(item);
  }
}
// Detect when scrolled to bottom.
listElm.addEventListener('scroll', function() {
  if (listElm.scrollTop + listElm.clientHeight >= listElm.scrollHeight) {
    loadMore();
  }
});

// Initially load some items.
loadMore();

</script>

@endif
@endauth