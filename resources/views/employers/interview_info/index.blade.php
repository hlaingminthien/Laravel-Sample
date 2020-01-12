@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Interview Info</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 
@if(count($interviews) > 0)
<div id="content">
  <div class="container">
    <div class="row justify-content-center">
       <div class="table-responsive-sm table-responsive-md">
        <table class="table table-bordered cmp_table" id="dtBasicExample">
          <thead>
            <tr>
              <td>Name</td>
              <td>Date</td>
              <td>Requirement</td>
              <td>Location</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
          @foreach($interviews as $interview)
            <tr>
              <td>{{$interview->name}}</td>
              <td>{{$interview->date }}  {{$interview->time }}</td>
              <td>{{$interview->interview_requirement}}</td>
              <td>{{$interview->location}}</td>
              <td>
                <a href="{{ route('employeers.interview_infos.edit',['id' => $interview->id])}}" class="btn-added">
                  <i class="lni-pencil"></i>Edit
                </a>
                <a href="#" data-toggle="modal" data-target  ="#delete_{{$interview->id}}" class="btn-added">
                 <i class="lni-trash"></i>Delete
                </a>
              </td>
            </tr>
          @include('employers.partials.delete',['id'=>$interview->id])
          @endforeach
          </tbody>
        </table>

        <form action="{{route('employeers.interview_infos.destory')}}" method="post" id="my_delete_hidden_form">
        @csrf
          <input type="hidden" name="id" id="delete_object_id">           
        </form>
     
      </div>
    </div>
  </div>
</div>
@else
        <div class="row card_empty">
          <div class="col-lg-4 col-md-2 col-sm-12 col-xs-12">
          </div>
          <div class="col-lg-4 col-md-8 col-sm-12 col-xs-12">
            <span><i class="lni-emoji-sad size-lg"></i></span>
            <h2>Sorry, Empty Interview Info!</h2>
          </div>
          <div class="col-lg-4 col-md-2 col-sm-12 col-xs-12">
          </div>
        </div><br><br>
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



