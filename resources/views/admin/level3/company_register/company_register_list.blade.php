@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Company List</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

@if(count($company_infos)>0)
  <div id="content">
    <div class="container">
      <div class="row justify-content-center">
      <div class="table-responsive-sm table-responsive-md">
      <table class="table table-bordered cmp_table" id="dtBasicExample">
             <thead>
            <tr>
               <th>Company Name</th>
               <th>Job Category</th>
               <th>No of Employee</th>
               <th>Contact Name</th>
               <th>Contact Phone</th>
               <th>Contact Email</th>
               <th>Location</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($company_infos as $company_info)
            <tr> 
                <td>{{$company_info->company_name}}
                      @if($company_info->card_name !== null)
                        ({{$company_info->card_name}})
                      @endif
                      @if($company_info->company_correct == 1)
                        <span><i class="fas fa-check-circle" style="color: #3578e5;"></i></span>
                      @endif
                </td>
                <td>{{$company_info->jobtype}}</td>
                <td>{{number_format($company_info->no_of_employee,0)}}</td>
                <td>{{$company_info->contact_name}}</td>
                <td>{{$company_info->contact_phone}}</td>
                <td>{{$company_info->contact_email}}</td>
                <td>{{$company_info->state_name}},{{$company_info->country_name}}</td>
                <td>
                  <a href="{{ route('admin.level3.register_company_edit',['id'=>$company_info->id])}}" class="btn-added">
                    <i class="lni-search"></i>View</a>
                  <a href="#" data-toggle="modal" data-target  ="#delete_{{$company_info->id}}" class="btn-added">
                    <i class="lni-trash"></i>Delete</a>
                </td>
            </tr>
            @include('employers.partials.delete',['id'=>$company_info->id])
       @endforeach
        </tbody>
      </table>

      <form action="{{route('admin.level3.register_company_destory')}}" method="post" id="my_delete_hidden_form">
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
       <img src="https://cdn.dribbble.com/users/879147/screenshots/5932662/untitled-1_2x.jpg" >
       <p id="p1" style="color: #2874d2;">If there's no struggle there is no progress,</p><br><p id="p2" style="color:#fb5969;">Try to get your own bond!</p>
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