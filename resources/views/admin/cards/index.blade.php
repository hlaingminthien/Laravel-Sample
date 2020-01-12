@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

 <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>@lang('card.card_list')</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End --> 

@if(count($cards)>0)
  	<div id="content">
	    <div class="container">
	      <div class="row justify-content-center">
	        	<div class="table-responsive-sm table-responsive-md">
	          		<table class="table table-bordered cmp_table" id="dtBasicExample">
			            <thead>
			              <tr>
			                 <th>@lang('card.Card_Name')</th>
			                 <th>@lang('card.service_group1')</th>
			                 <th>@lang('card.service_group2')</th>
			                 <th>@lang('card.service_group3')</th>
			                 <th>@lang('card.service_group4')</th>
			                 <th>@lang('card.limit_time_and_price')</th>
			                 <th>@lang('card.action')</th>
			              </tr>
			            </thead>
			            <tbody>
			            @foreach($cards as $card)
			              <tr>
			                  <td>{{$card->card_name}}</td>
			                  <td>
			                  	{{$card->num_of_postion}} postions
			                  	<br>
			                  	{{$card->num_of_refresh}} refresh
			                  	<br>
			                  	{{$card->num_of_topping}} topping
			                  </td>
			                  <td>
			                  	{{$card->num_of_advice}} advice
			                  	<br>
			                  	{{$card->num_of_cv}} cv download
			                  	<br>
			                  	{{$card->staff_advice_hour}} staff advice hour
			                  </td>
			                  <td>
			                  	@if($card->star_levels == 1)
					 				{{$card->star_levels}}
					 			@endif
					 			<br>
					 			{{$card->num_of_drawing_rules}} drawing rule
					 			<br>
					 			@if($card->star_levels == 1)
					 				Decide star Levels
					 			@endif
			                  </td>
			                  <td>
			                  	{{$card->training_hour}} training hour
			                  	<br>
								@if($card->staff_situation == 1)
									{{$card->staff_situation}}
								@endif
			                  </td>
			                  <td>
			                  	{{$card->limit_time}} days
			                  	<br>
								{{number_format($card->price, 0)}} Ks
			                  </td>
			                  <td>
			                  	<a href="{{route('admin.cards.edit',['id'=>$card->id])}}">
			                  	<i class="lni-pencil"></i>Edit</a>
							  	<a a href="#" data-toggle="modal" data-target="#delete_{{$card->id}}" ><i class="lni-trash"></i>Delete</a>
			                  </td>
			              </tr>

			              @include('admin.partials.delete',['id'=>$card->id])

			            @endforeach
			            </tbody>
	          		</table>

		          	<!-- start of delete hidden form -->
		            <form action="{{route('admin.cards.destory')}}" method="post" id="my_delete_hidden_form">
		              @csrf
		              @method('DELETE')            
		              <input type="hidden" name="id" id="delete_object_id">           
		            </form>
	            	<!-- end of delete hidden form -->
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
        <h2>Sorry,Empty Cards!</h2>
    	</div>
		<div class="col-lg-4 col-md-2 col-sm-12 col-xs-12">
		</div>
    </div><br><br>
@endif

<script src="/js/jquery-min.js"></script>
<script type="text/javascript">
  function onFormSubmit(id) {
    document.getElementById('delete_object_id').value=id;
    document.getElementById("my_delete_hidden_form").submit();    
  }

$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
@notify_js
@notify_render
@endsection

