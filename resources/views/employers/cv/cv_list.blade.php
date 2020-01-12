@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- MDBootstrap Datatables  -->
<!-- <link href="/mdcss/addons/datatables.min.css" rel="stylesheet"> -->
 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>CV List</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 
@if(count($cv_infos)>0)
  <div id="content">
      <div class="container">
      <div class="row justify-content-center">
      <div class="table-responsive-sm table-responsive-md">
      <table class="table table-bordered cmp_table" id="dtBasicExample">
             <thead>
            <tr>
               <th>Employee Name</th>
               <th>Job Position</th>
               <th>Job Category</th>
               <th>Experience Level</th>
               <th>Location</th>
               <th>Expected Salary</th>
               <th>Education</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cv_infos as $cv_info)
            <tr>
              <td>
                {{$cv_info->name}}
               @if($cv_info->cv_correct == 1)
                <span><i class="fas fa-check-circle" style="color: #3578e5;"></i></span>
               @endif
               @if($cv_info->download != [])
                <i class="fas fa-download"></i>
               @endif
               @if($cv_info->cv_apply_by_cmp != null)
                <br>offered by you <i class="fas fa-handshake"></i>
               @endif
              </td>
                <td>{{$cv_info->job_position}}</td>
                <td>{{$cv_info->jobcate}}</td>
                <td>{{$cv_info->explevel}}</td>
                <td>{{$cv_info->state_name}}</td>
                <td>{{number_format($cv_info->expected_salary, 0)}} MMK</td>
                <td>{{$cv_info->education}}</td>
                <td>
                 <a href="{{ route('employeers.cv_detail',['id' => $cv_info->id])}}" class="btn-added">
                 <i class="lni-search"></i> View to download
                 </a>
                </td>
            </tr>
       @endforeach
        </tbody>
      </table>
      </div>
      </div>
      </div>
  </div>
  @else

   <div class="container uncheck_cv">
    <div class="row justify-content-center">
       <img src="https://cdn.dribbble.com/users/1121009/screenshots/5270889/dribbble_23.jpg">
       <p id="p2"><b id="p1">You don't have </b> any cv form !</p> 
    </div>
</div>
  <br>

  @endif
<script src="/js/jquery-min.js"></script>
<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection