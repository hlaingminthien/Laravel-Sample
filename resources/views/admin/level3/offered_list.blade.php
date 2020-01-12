@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Offered CV</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

@if(count($offers)>0)
<div id="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="table-responsive-sm table-responsive-md">
          <table class="table table-bordered cmp_table" id="dtBasicExample">
            <thead>
              <tr>
                <td>Company Name</td>
                <td>Job Position Name</td>
                <td>Employee Name</td>
                <td>Salary</td>
                <td>Start Date</td>
              </tr>
            </thead>
            <tbody>
            @foreach($offers as $offer)
              <tr>
                <td>{{$offer->company_name}}</td>
                <td>{{$offer->position_name}}</td>
                <td>{{$offer->name}}</td>
                <td>{{$offer->salary}}</td>
                <td>{{$offer->start_date}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@else
 <div class="container uncheck_cv">
    <div class="row justify-content-center">
       <img src="https://cdn.dribbble.com/users/879147/screenshots/5576622/deploy_audio_in_seconds_2x.jpg">
       <p id="p2" style="color:#24324a;"><b id="p2">Sorry,</b>you don't have offered CV currently!</p> 
    </div>
</div>
  <br>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="/js/jquery-min.js"></script>
<script>
$(document).ready(function () {

    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>

@notify_js
@notify_render
@endsection