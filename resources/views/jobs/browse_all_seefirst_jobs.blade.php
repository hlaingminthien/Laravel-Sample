@extends('layouts.master')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">         
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Find Job</h3>
                </div>
                <div class="job-search-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Job Title or Company Name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-5 col-xs-12">
                                <div class="form-group">
                                    <div class="search-category-container">
                                        <label class="styled-select">
                                            <select>
                                                <option value="none">Locations</option>
                                                <option value="none">New York</option>
                                                <option value="none">California</option>
                                                <option value="none">Washington</option>
                                                <option value="none">Birmingham</option>
                                                <option value="none">Chicago</option>
                                                <option value="none">Phoenix</option>
                                            </select>
                                        </label>
                                    </div>
                                    <i class="lni-map-marker"></i>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-5 col-xs-12">
                                <div class="form-group">
                                    <div class="search-category-container">
                                        <label class="styled-select">
                                            <select>
                                                <option>All Categories</option>
                                                <option>Finance</option>
                                                <option>IT &amp; Engineering</option>
                                                <option>Education/Training</option>
                                                <option>Art/Design</option>
                                                <option>Sale/Markting</option>
                                                <option>Healthcare</option>
                                                <option>Science</option>
                                                <option>Food Services</option>
                                            </select>
                                        </label>
                                    </div>
                                    <i class="lni-layers"></i>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-2 col-xs-12">
                                <button type="submit" class="button"><i class="lni-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- See First Jobs Section Start -->
<section id="job-listings" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Topping Jobs</h2>
            <p>Hand-picked jobs featured depending on popularity and benifits</p>
        </div>
        <div class="row">
            @foreach($job_positions as $job_pos) 
            <div class="col-lg-6 col-md-12 col-xs-12">
              <a class="job-listings-featured" href="{{route('jobs.details')}}">
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
            @endForeach
        </div>
        {{ $job_positions->links() }}
    </div>
</section>
<!-- See First Jobs Section End -->  
@endsection