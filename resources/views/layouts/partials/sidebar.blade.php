	
  @auth  

	<div class="right-sideabr">
	<h4>Manage {{Auth::user()->name}}'s Dashboard</h4>
	<ul class="list-item">
	<li><a href="#" id="l">Profile</a></li>
	<li><a href="{{route('employers.job_categories.create')}}" id="l2">Card Lists</a></li>
	<li><a href="manage-applications.html" id="l3">CV Lists</a></li>
	@if(Auth::user()->hasRole('Level1')) 
	<li><a href="" id="l4">Level2&3 Lists</a></li>
	@endif
	<li><a href="" id="l5">Company Lists</a></li>
	</ul>
	</div>

  @endauth

