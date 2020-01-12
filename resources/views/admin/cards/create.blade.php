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
		<h3 class="job-title">@lang('card.Create_Online_Recuitment_Card')</h3><br>
		<form class="form-ad" action="{{route('admin.cards.save')}}" method="post" id="cardform">
			@csrf
		<div class="form-group">
		<label class="control-label">@lang('card.Card_Name')</label>
		<input type="text" name="card_name" class="form-control" placeholder="@lang('card.Write_Card_Name')" autofocus="">
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Postion')</label>
		<input type="text" name="num_of_postion" class="form-control" placeholder="@lang('card.Write_Number_Of_Postion')" min="0">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Refresh')</label>
		<input type="text" name="num_of_refresh" class="form-control" placeholder="@lang('card.Write_Number_Of_Refresh')" min="0">
		</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Topping')</label>
		<input type="text" name="num_of_topping" class="form-control" 
		placeholder="@lang('card.Write_Number_Of_Topping')" min="0">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Advice')</label>
		<input type="text" name="num_of_advice" class="form-control" 
		placeholder="@lang('card.Write_Number_Of_Advice')" min="0">
		</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_CVdownload')</label>
		<input type="text" name="num_of_cv" class="form-control" placeholder="@lang('card.Write_Number_Of_CVdownload')" min="0">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Staff_Advice_Hours')</label>
		<input type="text" name="staff_advice_hour" class="form-control" placeholder="@lang('card.Write_Advice_Hours')" min="0">
		</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Training_Hours')</label>
		<input type="text" name="training_hour" class="form-control" placeholder="@lang('card.Write_Training_Hours')" min="0">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Number_Of_Drawing_Rules')</label>
		<input type="text" name="num_of_drawing_rules" class="form-control" placeholder="@lang('card.Write_Number_Of_Drawing_Rules')" min="0">
		</div>
		</div>
		</div>
	
		<div class="form-group">
		<div class="row">
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Service_Limit_Time')</label>
		<input type="text" name="limit_time" class="form-control" placeholder="@lang('card.Write_Service_Limit_Time')" min="0">
		</div>
		<div class="col-lg-6 col-md-12 col-xs-12">
		<label class="control-label">@lang('card.Price')</label>
		<input type="text" name="price" class="form-control" placeholder="@lang('card.Write_Price')">
		</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
		<div class="col-lg-4 col-md-12 col-xs-12">
		<div class="form-check form-check-inline">
  		<input class="form-check-input" name="star_levels" type="checkbox" id="inlineCheckbox1" value="1">
  		<label class="form-check-label" for="inlineCheckbox1">@lang('card.Decide_Star_Levels')</label>
		</div>
		</div>
		<div class="col-lg-4 col-md-12 col-xs-12">
		<div class="form-check form-check-inline">
  		<input class="form-check-input" name="hr_informations" type="checkbox" id="inlineCheckbox2" value="1">
  		<label class="form-check-label" for="inlineCheckbox2">@lang('card.HR_Informations')</label>
		</div>
		</div>
		<div class="col-lg-4 col-md-12 col-xs-12">
		<div class="form-check form-check-inline">
  		<input class="form-check-input" name="staff_situation" type="checkbox" id="inlineCheckbox3" value="1">
  		<label class="form-check-label" for="inlineCheckbox3">@lang('card.Decide_Staff_Situation')</label>
		</div>
		</div>
		</div>
		</div>
		<section id="editor">
		<div class="form-group">
		<label for="comment">@lang('card.Description')</label>
		<br><br>
		<textarea class="form-control" name="details" rows="5" id="comment" placeholder="@lang('card.Write_Description')"></textarea>
		</div>
		</section>
		<button type="submit" class="btn btn-common">@lang('form.save')</button>
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

