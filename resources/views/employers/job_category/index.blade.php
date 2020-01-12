@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>Job Category</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 
@if(count($job_categories) > 0)
  <div id="content">
    <div class="container">
      <div class="row justify-content-center">
       <div class="table-responsive-sm table-responsive-md">
        <table class="table table-bordered cmp_table" id="dtBasicExample">
            <thead>
              <tr>
                <td>Name</td>
                <td>icon</td>
                <td>Edit</td>
                <td>Delete</td>
              </tr>
            </thead>
            <tbody>
            @foreach($job_categories as $job_category)
              <tr>
                <td>{{$job_category->name}}</td>
                <td>
                  <img src = "{{$job_category->iconName}}" class="img">
                </td>
                <td>
                  <a href="{{ route('employeers.job_categories.edit',['id' => $job_category->id])}}" class="btn-added">
                  <i class="lni-pencil"></i>Edit</a>
                </td>
                <td>
                  <a href="#" data-toggle="modal" data-target  ="#delete_{{$job_category->id}}" class="btn-added">
                  <i class="lni-trash"></i>Delete</a>
                </td>
              </tr>
            @include('employers.partials.delete',['id'=>$job_category->id])
            @endforeach
            </tbody>
          </table>

          <form action="{{route('employeers.job_categories.destory')}}" method="post" id="my_delete_hidden_form">
          @csrf
            <input type="hidden" name="id" id="delete_object_id">           
          </form>
        </div>
      </div>
    </div>
  </div>
@else

empty
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
  function onFormSubmit(id) {
    document.getElementById('delete_object_id').value=id;
    document.getElementById("my_delete_hidden_form").submit();    
  }
</script>

<script>
  $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>
@notify_js
@notify_render

@endsection



