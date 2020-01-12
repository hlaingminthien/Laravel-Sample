@extends('layouts.master')

@section('content')

 <!-- Page Header Start -->
    @include('page_header')
    <!-- Page Header End --> 

	<div id="content">
	<div class="container">
	<div class="row">

	<div class="col-lg-4 col-md-12 col-xs-12">
		
	<div class="right-sideabr">
	<h4>Manage {{Auth::user()->name}}'s Dashboard</h4>
	<ul class="list-item">
	<li><a href="{{route('admin.profile_dashboard')}}">Profile</a></li>
	<li><a href="{{route('admin.cards.index')}}" class="active">Card Lists</a></li>
	<li><a href="manage-applications.html">CV Lists</a></li>
	@if(Auth::user()->hasRole('Level1')) 
	<li><a href="">Level2&3 Lists</a></li>
	@endif
	<li><a href="">Company Lists</a></li>
	<li><a href="{{route('admin.townships.create')}}">Locations Lists</a></li>
	</ul>
	</div>
	
	</div>

<div class="col-lg-8 col-md-12 col-xs-12">
	<div class="post-job box">
		<h3 class="job-title">Add New City</h3>
		<form class="form-ad">
		<div class="form-group">
		<label class="control-label">State</label>
		<input type="text" class="form-control" placeholder="Write job title">
		</div><br>
		<div class="form-group">
		<label class="control-label">City English Name</label>
		<input type="text" class="form-control" placeholder="Write company name">
		</div><br>
		<div class="form-group">
		<label class="control-label">City Myanmar Name</label>
		<input type="text" class="form-control" placeholder="Write company name">
		</div><br>
		<section id="editor">
		<div class="form-group">
		<label for="comment">Description</label>
		<textarea class="form-control" rows="5" id="comment"></textarea>
		</div>
		</section>
		<a href="#" class="btn btn-common">Submit your job</a>
		</form>
		</div>
	</div>
</div>
</div>
</div>


@endsection