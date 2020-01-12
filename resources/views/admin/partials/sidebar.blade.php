	<div class="right-sideabr">
	<h4>Manage {{Auth::user()->name}}'s Dashboard</h4>
	<ul class="list-item">
	<li><a href="{{route('admin.profile_dashboard')}}">Profile</a></li>
	<li><a href="{{route('admin.cards.create')}}" class="active"><span class="oi oi-plus" title="icon name" aria-hidden="true"></span>
	  Cards</a><br><br>
	<a href="{{route('admin.cards.index')}}"><span class="oi oi-list"></span>  Card Lists</a><br>
	</li>
	<li><a href="manage-applications.html">CV Lists</a></li>
	@if(Auth::user()->hasRole('Level1')) 
	<li><a href="">Level2&3 Lists</a></li>
	@endif
	<li><a href="">Company Lists</a></li>
	<li><a href="{{route('admin.townships.create')}}">Locations Lists</a></li>
	</ul>
	</div>