<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
  Route::get('/get_city','Api\DataController@getCityByStateId');
  Route::post('/serach_positon','Api\DataController@searchPosition');
  Route::get('/get_card_info','Api\DataController@getCardInfos');
  Route::post('/seefirst','Api\DataController@seefirst');
  Route::post('/refresh','Api\DataController@refresh');
  Route::post('/update_company_information','Api\DataController@updateCompanyInformation');
  Route::post('/update_logo','Api\DataController@updateLogo');
  Route::post('/job_apply','Api\DataController@applyJob');
  Route::post('/cv_download','Api\DataController@cvDownload');
  Route::get('/old_check_value','Api\DataController@oldCheckCmpValue');
  Route::post('/check_company','Api\DataController@checkCompanyByLevel2');
  Route::get('/old_check_cv_value','Api\DataController@oldCheckCvValue');
  Route::post('/check_cv','Api\DataController@checkCvByLevel2');
  Route::get('/get_interview_noti','Api\DataController@getUnreadInterviwNoti');
  Route::post('/make_read','Api\DataController@readInterviwNoti');
  Route::post('/save_cv_download','Api\DataController@saveCVDownload');
  Route::get('/edit_cv_download','Api\DataController@editCVDownload');
  Route::post('/update_cv_download','Api\DataController@updateCVDownload');
  Route::post('/cv_apply_by_cmp','Api\DataController@applyCvBycmp');
  Route::post('/edit_cv_apply_by_cmp','Api\DataController@editapplyCvBycmp');
  Route::post('/cv_download_by_staff','Api\DataController@cvDownloadByStaff');
  Route::get('/get_apply','Api\DataController@getApply');
  Route::post('/save_offer','Api\DataController@saveOffer');
  Route::get('/edit_offer','Api\DataController@editOffer');
  Route::post('/update_offer','Api\DataController@updateOffer');
  Route::get('/get_salary','Api\DataController@getSalary');
  Route::get('/getBg','Api\DataController@getBg');
});

Route::group(['prefix'=>'work_exp'], function(){
	Route::post('/save','Api\WorkExpController@save');
	Route::get('/get_info','Api\WorkExpController@getInfo');
	Route::get('/edit_wexp','Api\WorkExpController@editWexp');
	Route::post('/update_wexp','Api\WorkExpController@updateWexp');
});


Route::group(['prefix'=>'train_certificate'], function(){
	Route::post('/save','Api\TrainingCertificateController@save');
	Route::get('/index','Api\TrainingCertificateController@index');
	Route::get('/edit','Api\TrainingCertificateController@edit');
	Route::post('/update','Api\TrainingCertificateController@update');
});

Route::group(['prefix'=>'cv'], function(){
	Route::post('/update','Api\CVController@update');
	Route::post('/update_basic_user','Api\CVController@updateBasicUser');
	Route::post('/update_photo','Api\CVController@updatePhoto');
});

Route::group(['prefix'=>'company_resources'], function(){

	Route::post('/save','Api\CompanyResourceController@save');
	Route::post('/update','Api\CVController@update');
	Route::post('/update_basic_user','Api\CVController@updateBasicUser');
	Route::post('/update_photo','Api\CVController@updatePhoto');
});

Route::group(['prefix'=>'user'], function(){
  Route::post('/update_basic_user','Api\CVController@updateBasicUser');
});