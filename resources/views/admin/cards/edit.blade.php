@extends('layouts.master')

@section('content')
 <!-- Page Header Start -->
    <div class="page-header">
      <div class="container">
        <div class="row">         
          <div class="col-lg-12">
            <div class="inner-header">
              <h3>@lang('card.Card')</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

	<div id="content">
	<div class="container">
	<div class="row">

<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="post-job box">
		<h3 class="job-title">@lang('card.edit')</h3><br>
		<form class="form-ad" action="{{route('admin.cards.update')}}" method="post" id="cardform">
			@csrf
			<input type="hidden" name="id" value="{{$edit_card->id}}">
		<div class="form-group">
		<label class="control-label">@lang('card.Card_Name')</label>
		<input type="text" name="card_name" class="form-control" placeholder="@lang('card.Write_Card_Name')" value="{{$edit_card->card_name}}">
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Postion')</label>
		<input type="text" name="num_of_postion" class="form-control" placeholder="@lang('card.Write_Number_Of_Postion')" value="{{$edit_card->num_of_postion}}">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Refresh')</label>
		<input type="text" name="num_of_refresh" class="form-control" placeholder="@lang('card.Write_Number_Of_Refresh')" value="{{$edit_card->num_of_refresh}}">
		</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Topping')</label>
		<input type="text" name="num_of_topping" class="form-control" placeholder="@lang('card.Write_Number_Of_Topping')" value="{{$edit_card->num_of_topping}}">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Advice')</label>
		<input type="text" name="num_of_advice" class="form-control" placeholder="@lang('card.Write_Number_Of_Advice')" value="{{$edit_card->num_of_advice}}">
		</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_CVdownload')</label>
		<input type="text" name="num_of_cv" class="form-control" placeholder="@lang('card.Write_Number_Of_CVdownload')" value="{{$edit_card->num_of_cv}}">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Staff_Advice_Hours')</label>
		<input type="text" name="staff_advice_hour" class="form-control" placeholder="@lang('card.Write_Advice_Hours')" value="{{$edit_card->staff_advice_hour}}">
		</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Training_Hours')</label>
		<input type="text" name="training_hour" class="form-control" placeholder="@lang('card.Write_Training_Hours')" value="{{$edit_card->training_hour}}">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Drawing_Rules')</label>
		<input type="text" name="num_of_drawing_rules" class="form-control" placeholder="@lang('card.Write_Number_Of_Drawing_Rules')" value="{{$edit_card->num_of_drawing_rules}}">
		</div>
		</div>
		</div>
	
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Service_Limit_Time')</label>
		<input type="text" name="limit_time" class="form-control" placeholder="@lang('card.Write_Service_Limit_Time')" value="{{$edit_card->limit_time}}">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Price')</label>
		<input type="text" name="price" class="form-control" placeholder="@lang('card.Write_Price')" value="{{$edit_card->price}}">
		</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-4 col-md-12 col-xs-12">
		<div class="form-check form-check-inline">
  		{{ Form::checkbox('star_levels',1,$edit_card->star_levels,['class'=>'form-check-input']) }}
  		<label class="form-check-label" for="inlineCheckbox1">@lang('card.Decide_Star_Levels')</label>
		</div>
		</div>
		<div class="col-lg-4 col-md-12 col-xs-12">
		<div class="form-check form-check-inline">
  		{{ Form::checkbox('hr_informations',1,$edit_card->hr_informations,['class'=>'form-check-input']) }}
  		<label class="form-check-label" for="inlineCheckbox2">@lang('card.HR_Informations')</label>
		</div>
		</div>
		<div class="col-lg-4 col-md-12 col-xs-12">
		<div class="form-check form-check-inline">
  		{{ Form::checkbox('staff_situation',1,$edit_card->staff_situation,['class'=>'form-check-input']) }}
  		<label class="form-check-label" for="inlineCheckbox3">@lang('card.Decide_Staff_Situation')</label>
		</div>
		</div>
		</div>
		</div>
		<section id="editor">
		<div class="form-group">
		<label for="comment">@lang('card.Description')</label>
		<textarea class="form-control" name="details" rows="5" id="comment">{{$edit_card->details}}</textarea>
		</div>
		</section>
		<button type="submit" class="btn btn-common">@lang('form.update')</button>
		</form>
		</div>
	</div>
</div>
</div>
</div>
 <script src="/js/jquery-min.js"></script>
 {!! JsValidator::formRequest('App\Http\Requests\CardRequest','#cardform'); !!}

@notify_js
@notify_render
@endsection
