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
@if(count($categorydetails) > 0)
          <section class="job-browse section">
          <div class="container">
          <div class="row">

            <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="wrap-search-filter row">
            <div class="col-lg-5 col-md-5 col-xs-12">
            <input type="text" class="form-control" placeholder="Keyword: Name, Tag">
            </div>
            <div class="col-lg-5 col-md-5 col-xs-12">
            <input type="text" class="form-control" placeholder="Location: City, State, Zip">
            </div>
            <div class="col-lg-2 col-md-2 col-xs-12">
            <button type="submit" class="btn btn-common float-right">Filter</button>
            </div>
            </div>
            </div>
                @foreach($categorydetails as $detail) 
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <a class="job-listings-featured" href="{{route('jobs.details',['job_position_id'=>$detail->job_position_id, 'company_id'=>$detail->company_id])}}">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                  <div class="job-company-logo">
                                      <img src="/employerPhotos/{{$detail->logo}}" alt="" style="width: 50px;">
                                  </div>
                                  <div class="job-details">
                                        <h3>{{$detail->position_name}}</h3>
                                        <span class="company-neme">{{$detail->company_name}}</span>
                                        <div class="tags">
                                          <span><i class="lni-map-marker"></i>{{$detail->state_name}}</span>
                                          <span><i class="lni-user"></i>{{$detail->contact_name}}</span>
                                         </div>
                                  </div>
                            </div>
                        <div class="col-lg-6 col-md-6 col-xs-12 text-right">
                          <div class="tag-type">
                            <sapn class="heart-icon">
                               <i class="lni-heart"></i>
                            </sapn>
                            <span class="full-time">{{$detail->job_time}}</span>
                          </div>
                        </div>
                      </div>
                    </a>
                </div>
              @endforeach

          <!-- <div class="col-lg-12 col-md-12 col-xs-12">

              <ul class="pagination">
                      <li class="active"><a href="#" class="btn-prev"><i class="lni-angle-left"></i> prev</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li class="active"><a href="#" class="btn-next">Next <i class="lni-angle-right"></i></a></li>
              </ul>

          </div> -->

</div>
</div>
</section>

@else
<br><br>
<div class="container uncheck_cv">
    <div class="row justify-content-center">
       <img src="https://cdn.dribbble.com/users/2569465/screenshots/5282045/003.jpg" width="70%"><br>
       <p id="p1" style="color:#5b3df6;">There is no jobs of category,</p><p id="p2" style="color: #5102b1;">Check another category!</p> 
    </div>
</div>
<br>

@endif

@endsection