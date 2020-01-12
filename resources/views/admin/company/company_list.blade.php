@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>@lang('company.company_list')</h3>
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
               <th>@lang('company.company_name')</th>
               <th>@lang('company.account')</th>
               <th>@lang('company.job_category')</th>
               <th>@lang('company.no_of_employee')</th>
               <th>@lang('company.contact_name')</th>
               <th>@lang('company.contact_phone')</th>
               <th>@lang('company.contact_email')</th>
               <th>@lang('company.location')</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($company_infos as $company_info)
            <tr> 
                <td>
                  @if($company_info->company_correct == 1)
                  {{$company_info->company_name}} <span><i class="fas fa-check-circle" style="color: #3578e5;"></i>
                  </span>
                  @else
                  {{$company_info->company_name}}
                  @endif
                  @if($company_info->card_name !== null)
                  ({{$company_info->card_name}})
                  @endif
                </td>
                <td>{{$company_info->email}}</td>
                <td>{{$company_info->jobtype}}</td>
                <td>{{number_format($company_info->no_of_employee,0)}}</td>
                <td>{{$company_info->contact_name}}</td>
                <td>{{$company_info->contact_phone}}</td>
                <td>{{$company_info->contact_email}}</td>
                <td>{{$company_info->state_name}},{{$company_info->country_name}}</td>
                @if($company_info->company_resource_id == null)
                <td>
                 <a href="{{route('admin.manage_company_listresource',['company_id'=>$company_info->id,'compuser_id'=>$company_info->user_id])}}" class="btn-added">
                 <i class="lni-pencil"></i>Manage</a>
                </td>
                @else
                <td>
                <a href="{{route('admin.edit_company_listresource',['edit_company_id'=>$company_info->id,'edit_compuser_id'=>$company_info->user_id,'edit_company_resource_id'=>$company_info->company_resource_id])}}" class="btn-added">
                 <i class="lni-pencil"></i>Edit</a>
                 <a href="#" class="btn-added">
                 <i class="lni-trash"></i>delete</a></td>
                @endif
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
       <img src="https://cdn.dribbble.com/users/25514/screenshots/4276494/vyta_brand_llustration_goals_tracking.gif">
       <p id="p2"><b id="p1">You don't have </b> any company to manage !</p> 
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
@notify_js
@notify_render
@endsection