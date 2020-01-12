<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',['as'=>'welcome','uses'=>'welcomecontroller@welcome']);

// Route::get('/bg',['as'=>'background','uses'=>'welcomecontroller@changeBackground']);
Route::group(['prefix' =>'account'], function() {
	Route::get('/login',['as'=>'account.login','uses'=>'welcomecontroller@login']);
	Route::post('/post_login',['as'=>'account.post_login','uses'=>'welcomecontroller@postLogin']);
	Route::get('/register',['as'=>'account.register','uses'=>'welcomecontroller@register']);
	Route::post('/post_register',['as'=>'account.post_register','uses'=>'welcomecontroller@postRegister']);
	Route::get('/logout',['as'=>'account.logout','uses'=>'welcomecontroller@logout']);
	Route::get('/employeer_register',['as'=>'account.employeer_register','uses'=>'welcomecontroller@employeer_register']);
	Route::post('/post_employeer_register',['as'=>'account.post_employeer_register','uses'=>'welcomecontroller@post_employeer_register']);
	Route::get('/create_company_infor',['as'=>'account.create_company_infor','uses'=>'welcomecontroller@createCompanyInformation']);
	Route::post('/save_company_infor',['as'=>'account.save_company_infor','uses'=>'welcomecontroller@saveCompanyInformation']);

	Route::get('locale/{locale}',function($locale)
	{
		Session::put('locale',$locale);
		return redirect()->back();
	});
});

Route::group(['prefix' =>'cv'], function() 
{
	Route::get('/create_basic_info',['as'=>'cv.basic_create','uses'=>'Employee\CVController@createBasic']);
	Route::post('/update_userinfo',['as'=>'cv.update_user_info','uses'=>'Employee\CVController@updateUserInformation']);
	Route::get('/create_basic_cv_info',['as'=>'cv.basic_cv_create','uses'=>'Employee\CVController@createCVBasic']);
	Route::post('/basic_cv_info_save',['as'=>'cv.basic_cv_info_save','uses'=>'Employee\CVController@basciCvInfoSave']);
	Route::get('/complete_cv',['as'=>'cv.complete_cv','uses'=>'Employee\CVController@createCompleteCV']);

	Route::get('locale/{locale}',function($locale)
	{
		Session::put('locale',$locale);
		return redirect()->back();
	});

	Route::post('/cv_download',['as'=>'cv.cv_download','uses'=>'Employee\CVController@cvDownload']);
	Route::get('/cv_preview',['as'=>'cv.cv_preview','uses'=>'Employee\CVController@cvPreview']);
	Route::get('/cv_preview2',['as'=>'cv.cv_preview2','uses'=>'Employee\CVController@cvPreview2']);
	Route::get('/cv_preview3',['as'=>'cv.cv_preview3','uses'=>'Employee\CVController@cvPreview3']);

});

Route::get('/contact',['as'=>'contacts','uses'=>'welcomecontroller@contact']);
Route::get('/employer_terms',['as'=>'employer_terms','uses'=>'welcomecontroller@employer_terms']);
Route::get('/employee_terms',['as'=>'employee_terms','uses'=>'welcomecontroller@employee_terms']);
Route::get('/about',['as'=>'abouts','uses'=>'welcomecontroller@about']);


Route::group(['prefix' =>'jobs'], function() 
{
	Route::get('/job_details',['as'=>'jobs.details','uses'=>'Employeers\JobController@getJobdetail']);
	Route::get('/job_categories_details',['as'=>'jobs.job_categories_details','uses'=>'Employeers\JobController@getJobCategdetail']);
	Route::get('/all_featured_jobs',['as'=>'jobs.all_featured_job','uses'=>'Employeers\JobController@getAllFeaturedJobs']);
	Route::get('/all_seefirst_jobs',['as'=>'jobs.all_seefirst_jobs','uses'=>'Employeers\JobController@getAllSeefirstJob']);
	Route::get('/all_featured_job_category',['as'=>'jobs.all_featured_job_category','uses'=>'Employeers\JobController@getAllFeaturedJobCategories']);
	Route::get('/search_result',['as'=>'jobs.search_result','uses'=>'Employeers\JobController@searchResultPage']);

	Route::get('locale/{locale}',function($locale)
	{
		Session::put('locale',$locale);
		return redirect()->back();
	});
});

/*Employee*/
Route::group(['prefix'=>'employee'],function()
{
	Route::get('/who_view_profile',['as'=>'employee.who_view_profile','uses'=>'Employee\EmployeeController@getWhoViewProfile']);
	Route::get('/notification',['as'=>'employee.notification','uses'=>'Employee\EmployeeController@getNotification']);
	Route::get('/job_u_applied',['as'=>'employee.job_u_applied','uses'=>'Employee\EmployeeController@getJobYApply']);
	Route::get('/job_by_company',['as'=>'employee.job_by_company','uses'=>'Employee\EmployeeController@getJobForYou']);
	Route::get('/interview_lists',['as'=>'employee.interview_list','uses'=>'Employee\EmployeeController@getInterViewList']);
	Route::get('/offer_letter',['as'=>'employee.offer_letter','uses'=>'Employee\EmployeeController@getOfferLetter']);

	Route::get('locale/{locale}',function($locale)
	{
		Session::put('locale',$locale);
		return redirect()->back();
	});
});
/*end */

/*Employeer*/
Route::group(['prefix'=>'employers','middleware'=>['role:Employeer']],function()
{
	Route::get('/profile_dashboard',['as'=>'employers.profile_dashboard','uses'=>'Employeers\EmployersController@showDashboard']);

	Route::get('/card_exchange',['as'=>'employers.card_exchange','uses'=>'Employeers\EmployersController@exchangeCardService']);

	Route::post('/update_card_exchange_posit_to_all',['as'=>'employers.update_card_exchange_posit_to_all','uses'=>'Employeers\EmployersController@updateExchangePostiontoall']);

	Route::post('/update_card_exchange',['as'=>'employers.update_card_exchange_all_to_posit','uses'=>'Employeers\EmployersController@updateExchangeAlltoPosition']);

	Route::get('/offer_list',['as'=>'employers.offer_list','uses'=>'Employeers\EmployersController@getOffers']);


	//job category
	Route::group(['prefix'=>'job_categories'],function()
	{
		Route::get('/create',['as'=>'employeers.job_categories.create','uses'=>'Employeers\Job_categoryController@create']);
		Route::post('/save',['as'=>'employeers.job_categories.save','uses'=>'Employeers\Job_categoryController@save']);
		Route::get('/index',['as'=>'employeers.job_categories.index','uses'=>'Employeers\Job_categoryController@index']);
		Route::get('/edit',['as'=>'employeers.job_categories.edit','uses'=>'Employeers\Job_categoryController@edit']);
		Route::post('/update',['as'=>'employeers.job_categories.update','uses'=>'Employeers\Job_categoryController@update']);
		Route::post('/destory',['as'=>'employeers.job_categories.destory','uses'=>'Employeers\Job_categoryController@destory']);

		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

	// job sub category
	Route::group(['prefix'=>'job_sub_categories'],function()
	{
		Route::get('/create',['as'=>'employeers.job_sub_categories.create','uses'=>'Employeers\Job_sub_categoryController@create']);
		Route::post('/save',['as'=>'employeers.job_sub_categories.save','uses'=>'Employeers\Job_sub_categoryController@save']);
		Route::get('/index',['as'=>'employeers.job_sub_categories.index','uses'=>'Employeers\Job_sub_categoryController@index']);
		Route::get('/edit',['as'=>'employeers.job_sub_categories.edit','uses'=>'Employeers\Job_sub_categoryController@edit']);
		Route::post('/update',['as'=>'employeers.job_sub_categories.update','uses'=>'Employeers\Job_sub_categoryController@update']);
		Route::post('/destory',['as'=>'employeers.job_sub_categories.destory','uses'=>'Employeers\Job_sub_categoryController@destory']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

		// experience level
	Route::group(['prefix'=>'experience_levels'],function()
	{
		Route::get('/create',['as'=>'employeers.experience_levels.create','uses'=>'Employeers\Experience_LevelController@create']);
		Route::post('/save',['as'=>'employeers.experience_levels.save','uses'=>'Employeers\Experience_LevelController@save']);
		Route::get('/index',['as'=>'employeers.experience_levels.index','uses'=>'Employeers\Experience_LevelController@index']);
		Route::get('/edit',['as'=>'employeers.experience_levels.edit','uses'=>'Employeers\Experience_LevelController@edit']);
		Route::post('/update',['as'=>'employeers.experience_levels.update','uses'=>'Employeers\Experience_LevelController@update']);
		Route::post('/destory',['as'=>'employeers.experience_levels.destory','uses'=>'Employeers\Experience_LevelController@destory']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});


			// position level
	Route::group(['prefix'=>'position_levels'],function()
	{
		Route::get('/create',['as'=>'employeers.position_levels.create','uses'=>'Employeers\Position_LevelController@create']);
		Route::post('/save',['as'=>'employeers.position_levels.save','uses'=>'Employeers\Position_LevelController@save']);
		Route::get('/index',['as'=>'employeers.position_levels.index','uses'=>'Employeers\Position_LevelController@index']);
		Route::get('/edit',['as'=>'employeers.position_levels.edit','uses'=>'Employeers\Position_LevelController@edit']);
		Route::post('/update',['as'=>'employeers.position_levels.update','uses'=>'Employeers\Position_LevelController@update']);
		Route::post('/destory',['as'=>'employeers.position_levels.destory','uses'=>'Employeers\Position_LevelController@destory']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});


	//job position
	Route::group(['prefix'=>'job_positions'],function()
	{
		Route::get('/create',['as'=>'employeers.job_positions.create','uses'=>'Employeers\JobPositionController@create']);
		Route::post('/save',['as'=>'employeers.job_positions.save','uses'=>'Employeers\JobPositionController@save']);
		Route::get('/index',['as'=>'employeers.job_positions.index','uses'=>'Employeers\JobPositionController@index']);
		Route::get('/edit',['as'=>'employeers.job_positions.edit','uses'=>'Employeers\JobPositionController@edit']);
		Route::post('/update',['as'=>'employeers.job_positions.update','uses'=>'Employeers\JobPositionController@update']);
		Route::get('/seefirst',['as'=>'employeers.job_positions.seefirst','uses'=>'Employeers\JobPositionController@seefirst']);
		Route::post('/destory',['as'=>'employeers.job_positions.destory','uses'=>'Employeers\JobPositionController@destory']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

	Route::get('/get_apply_lists',['as'=>'employers.get_apply_lists','uses'=>'Employeers\EmployersController@getApplyLists']);
	Route::post('/call_interview',['as'=>'employers.call_interview','uses'=>'Employeers\EmployersController@callInterview']);
	Route::get('/interview_result_create',['as'=>'employers.interview_result_create',
		'uses'=>'Employeers\EmployersController@interviewResult']);
	Route::post('/interview_result',['as'=>'employers.interview_result',
		'uses'=>'Employeers\EmployersController@giveInterviewResult']);

	//Interview Info
	Route::group(['prefix'=>'interview_infos'],function(){
		Route::get('/create',['as'=>'employeers.interview_infos.create','uses'=>'Employeers\Interview_infoController@create']);
		Route::post('/save',['as'=>'employeers.interview_infos.save','uses'=>'Employeers\Interview_infoController@save']);
		Route::get('/index',['as'=>'employeers.interview_infos.index','uses'=>'Employeers\Interview_infoController@index']);
		Route::get('/edit',['as'=>'employeers.interview_infos.edit','uses'=>'Employeers\Interview_infoController@edit']);
		Route::post('/update',['as'=>'employeers.interview_infos.update','uses'=>'Employeers\Interview_infoController@update']);
		Route::post('/destory',['as'=>'employeers.interview_infos.destory','uses'=>'Employeers\Interview_infoController@destory']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

	//cv List
	Route::get('/cv_list',['as'=>'employeers.cv_list','uses'=>'Employeers\EmployersController@getCVInfo']);
	Route::get('/cv_detail',['as'=>'employeers.cv_detail','uses'=>'Employeers\EmployersController@getCVDetail']);

	Route::get('locale/{locale}',function($locale)
	{
		Session::put('locale',$locale);
		return redirect()->back();
	});
});

/*Admin*/
Route::group(['prefix'=>'admin','middleware'=>['role:Level1|Level2|Level3']],function()
{
	

	Route::get('/dashboard',['as'=>'admin.profile_dashboard','uses'=>'Admin\AdminController@showDashboard']);
	//cards
	Route::group(['prefix'=>'cards'],function()
	{
		Route::get('/create',['as'=>'admin.cards.create','uses'=>'Admin\CardsController@create']);
		Route::post('/save',['as'=>'admin.cards.save','uses'=>'Admin\CardsController@save']);
		Route::get('/index',['as'=>'admin.cards.index','uses'=>'Admin\CardsController@index']);
		Route::get('/edit',['as'=>'admin.cards.edit','uses'=>'Admin\CardsController@edit']);
		Route::post('/update',['as'=>'admin.cards.update','uses'=>'Admin\CardsController@update']);
		Route::delete('/destory',['as'=>'admin.cards.destory','uses'=>'Admin\CardsController@destory']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

	//staff create
	Route::group(['prefix'=>'staff'],function()
	{
		Route::get('/create',['as'=>'admin.staff.create','uses'=>'Admin\StaffController@create']);
		Route::post('/save',['as'=>'admin.staff.save','uses'=>'Admin\StaffController@save']);
		Route::get('/index',['as'=>'admin.staff.index','uses'=>'Admin\StaffController@index']);
		Route::get('/edit',['as'=>'admin.staff.edit','uses'=>'Admin\StaffController@edit']);
		Route::post('/update',['as'=>'admin.staff.update','uses'=>'Admin\StaffController@update']);
		Route::delete('/destory',['as'=>'admin.staff.destory','uses'=>'Admin\StaffController@destory']);

		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

	//company List
	Route::get('/company_list',['as'=>'admin.company_list','uses'=>'Admin\AdminController@getCompanyInfo']);
	Route::get('/manage_company_listresource',['as'=>'admin.manage_company_listresource','uses'=>'Admin\AdminController@manageCompanylistResource']);
	Route::post('/save_company_listresource',['as'=>'admin.save_listresource','uses'=>'Admin\AdminController@saveCompanylistResource']);
	Route::get('/edit_company_listresource',['as'=>'admin.edit_company_listresource','uses'=>'Admin\AdminController@editCompanylistResource']);
	Route::post('/update_company_listresource',['as'=>'admin.update_company_listresource','uses'=>'Admin\AdminController@updateCompanylistResource']);
	Route::post('/delete_company_listresource',['as'=>'admin.delete_company_listresource','uses'=>'Admin\AdminController@deleteCompanylistResource']);

	//uncheck_company_list
	Route::get('/uncheck_company_list',['as'=>'admin.uncheck_company_list','uses'=>'Admin\AdminController@getUncheckCompanyInfo']);
	Route::post('/check_company',['as'=>'admin.check_company','uses'=>'Admin\AdminController@checkCompanyByLevel2']);

	//cv List
	Route::get('/cv_list',['as'=>'admin.cv_list','uses'=>'Admin\AdminController@getCVInfo']);
	Route::get('/cv_detail',['as'=>'admin.cv_detail','uses'=>'Admin\AdminController@getCVDetail']);

	//level2 unchek cv List
	Route::get('/uncheck_cv_list',['as'=>'admin.uncheck_cv_list','uses'=>'Admin\AdminController@getUncheckCVInfo']);
	Route::get('/unchek_cv_detail',['as'=>'admin.unchek_cv_detail','uses'=>'Admin\AdminController@getUncheckCVDetail']);
	

	Route::group(['prefix'=>'townships'],function(){
		Route::get('/create',['as'=>'admin.townships.create','uses'=>'Admin\TownshipController@create']);
		Route::get('/save',['as'=>'admin.townships.save','uses'=>'Admin\TownshipController@save']);
		Route::get('/index',['as'=>'admin.townships.index','uses'=>'Admin\TownshipController@index']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});	

		//location 
	Route::group(['prefix'=>'cities'],function(){
		Route::get('/create',['as'=>'admin.cities.create','uses'=>'Admin\CityController@create']);
		Route::get('/index',['as'=>'admin.cities.index','uses'=>'Admin\CityController@index']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

	//level3 
	Route::group(['prefix'=>'level3'],function()
	{
		// register cv
		Route::get('/register_cv_basic_create',['as'=>'admin.level3.register_cv_basic_create','uses'=>'Admin\Level3Controller@registerCVBasicCreate']);
		Route::post('/register_cv_basic_save',['as'=>'admin.level3.register_cv_basic_save','uses'=>'Admin\Level3Controller@registerCVBasicSave']);
		Route::get('/register_cv_info_create',['as'=>'admin.level3.register_cv_info_create','uses'=>'Admin\Level3Controller@registerCVInfoCreate']);
		Route::post('/register_cv_info_save',['as'=>'admin.level3.register_cv_info_save','uses'=>'Admin\Level3Controller@registerCVInfoSave']);
		Route::get('/register_complete_cv',['as'=>'admin.level3.register_complete_cv','uses'=>'Admin\Level3Controller@completeCV']);
		Route::get('/register_cv_index',['as'=>'admin.level3.register_cv_index','uses'=>'Admin\Level3Controller@registerCVindex']);
		Route::post('/register_cv_destory',['as'=>'admin.level3.register_cv_destory','uses'=>'Admin\Level3Controller@registerCVdestory']);
		Route::get('/cv_list',['as'=>'admin.level3.cv_list','uses'=>'Admin\Level3Controller@getCVList']);
	    Route::get('/cv_detail',['as'=>'admin.level3.cv_detail','uses'=>'Admin\Level3Controller@getCVDetail']);
	    Route::get('/offered_cv',['as'=>'admin.level3.offered_cv','uses'=>'Admin\Level3Controller@getOfferedCV']);

		//register company

		// basic information
		Route::get('/register_company_basic_create',['as'=>'admin.level3.register_company_basic_create','uses'=>'Admin\Level3Controller@registerCompanyBaiscCreate']);
		Route::post('/register_company_basic_save',['as'=>'admin.level3.register_company_basic_save','uses'=>'Admin\Level3Controller@registerCompanyBaiscSave']);

		// company information
		Route::get('/register_company_info_create',['as'=>'admin.level3.register_company_info_create','uses'=>'Admin\Level3Controller@registerCompanyInfoCreate']);
		Route::post('/register_company_info_save',['as'=>'admin.level3.register_company_info_save','uses'=>'Admin\Level3Controller@registerCompanyInfoSave']);
		Route::get('/register_company_index',['as'=>'admin.level3.register_company_index','uses'=>'Admin\Level3Controller@registerCompanyInfoindex']);
		Route::get('/register_company_edit',['as'=>'admin.level3.register_company_edit','uses'=>'Admin\Level3Controller@registerCompanyInfoEdit']);
		Route::post('/register_company_update',['as'=>'admin.level3.register_company_update','uses'=>'Admin\Level3Controller@registerCompanyInfoUpdate']);
		Route::post('/register_company_destory',['as'=>'admin.level3.register_company_destory','uses'=>'Admin\Level3Controller@registerCompanyInfoDestory']);

		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

	//location 
	Route::group(['prefix'=>'cities'],function(){
		Route::get('/create',['as'=>'admin.cities.create','uses'=>'Admin\CityController@create']);
		Route::get('/index',['as'=>'admin.cities.index','uses'=>'Admin\CityController@index']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

	Route::group(['prefix'=>'townships'],function(){
		Route::get('/create',['as'=>'admin.townships.create','uses'=>'Admin\TownshipController@create']);
		Route::get('/save',['as'=>'admin.townships.save','uses'=>'Admin\TownshipController@save']);
		Route::get('/index',['as'=>'admin.townships.index','uses'=>'Admin\TownshipController@index']);
		Route::get('locale/{locale}',function($locale)
		{
			Session::put('locale',$locale);
			return redirect()->back();
		});
	});

	Route::get('locale/{locale}',function($locale)
	{
		Session::put('locale',$locale);
		return redirect()->back();
	});	
});
Route::get('locale/{locale}',function($locale)
{
	Session::put('locale',$locale);
	return redirect()->back();
});






