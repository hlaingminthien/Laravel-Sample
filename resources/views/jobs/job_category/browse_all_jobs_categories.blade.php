@extends('layouts.master')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Browse Category</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

<section class="job-browse section">
  <div class="container">
    <div class="row">  
      @foreach($job_categories as $job_category) 
      <div class="col-lg-3 col-md-6 col-xs-12 f-category">
        <a href="{{route('jobs.job_categories_details',['jobcategory_id'=>$job_category->id])}}">
          <div class="icon bg-color-1">
            <img src = "{{$job_category->iconName}}" class="img">
          </div>
          <h3>{{$job_category->name}}</h3>
          <p>({{$job_category->pos_count}} jobs)</p>
        </a>
      </div>
      @endForeach
    </div>
    {{ $job_categories->links() }}
  </div>
</section>

@endsection