@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Your own registered cv list</h3>
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
              </td>
              <td>{{$cv_info->job_position}}</td>
              <td>{{$cv_info->jobcate}}</td>
              <td>{{$cv_info->explevel}}</td>
              <td>{{$cv_info->state_name}}</td>
              <td>{{number_format($cv_info->expected_salary, 0)}}</td>
              <td>{{$cv_info->education}}</td>
              <td>
                <a href="{{ route('admin.level3.register_complete_cv',['id'=>$cv_info->user_id])}}" 
                class="btn-added">
                  <i class="lni-search"></i>View</a>
                <a href="#" data-toggle="modal" data-target  ="#delete_{{$cv_info->id}}" class="btn-added">
                  <i class="lni-trash"></i>Delete</a>
              </td>
            </tr>
          @include('employers.partials.delete',['id'=>$cv_info->id])
          @endforeach
          </tbody>
        </table>

        <form action="{{route('admin.level3.register_cv_destory')}}" method="post" id="my_delete_hidden_form">
        @csrf
          <input type="hidden" name="id" id="delete_object_id">           
        </form>

      </div>
    </div>
  </div>
</div>
@else
 <div class="container uncheck_cv">
    <div class="row justify-content-center">
       <img src="https://cdn.dribbble.com/users/192274/screenshots/6826986/blob">
       <p id="p1" style="color: #00c9de;">If there's no struggle there is no progress,</p> <br> <p id="p2">Try to get your own cv form!</p>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
  function onFormSubmit(id) {
    document.getElementById('delete_object_id').value=id;
    document.getElementById("my_delete_hidden_form").submit();    
  }
</script>
@notify_js
@notify_render
@endsection