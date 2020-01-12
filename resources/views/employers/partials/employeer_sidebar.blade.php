<div class="right-sideabr">
	<h4>Manage {{Auth::user()->name}}'s Dashboard</h4>
	<ul class="list-item">
	<li><a href="#">Profile</a></li>
	<li><a href="{{route('employeers.job_categories.create')}}" >Job Category</a><br>
		<a href="{{route('employeers.job_categories.index')}}"> Job Category List</a>
	</li>
	<li><a href="{{route('employeers.job_positions.create')}}" >Job Position</a><br>
		<a href="{{route('employeers.job_positions.index')}}"> Job Position List</a>
	</li>
	<li><a href="manage-applications.html">CV Lists</a></li>
	</ul>
</div>