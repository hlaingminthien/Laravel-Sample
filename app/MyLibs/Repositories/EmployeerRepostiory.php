<?php 

namespace App\MyLibs\Repositories;

use App\MyLibs\Models\Card;
use App\MyLibs\Repositories\BaseRepository;

Class EmployeerRepostiory extends BaseRepository
{

	protected $model;

	public function __construct(Card $model)
	{
		$this->model = $model;
	}


	public function getApplylist($cmp_id)
	{
		$res = \DB::table('applies')
            ->leftJoin('users', 'applies.user_id', '=', 'users.id')
            ->leftJoin('cvs', 'applies.cv_id', '=', 'cvs.id')
            ->leftJoin('job_positions', 'applies.job_position_id', '=', 'job_positions.id')
            ->leftjoin('company_offers', 'applies.id', '=', 'company_offers.apply_id')
            ->select('applies.*','users.name as user_name', 'job_positions.position_name', 'cvs.expected_salary as expected_salary', 'cvs.experlevel_id', 'cvs.state_id', 'cvs.education as education', 'company_offers.id as offer_id')
            ->where('applies.company_id','=', $cmp_id)
            ->get();

	// $sql="SELECT applies.*,users.name as user_name,job_positions.position_name,cvs.expected_salary as expected_salary,cvs.experlevel_id,cvs.state_id,cvs.education as education,company_offers.id as offer_id FROM applies,users,cvs,job_positions,company_offers WHERE applies.user_id = users.id AND applies.cv_id = cvs.id AND applies.job_position_id = job_positions.id AND applies.id = company_offers.apply_id AND applies.company_id=?";
 //        $res =\DB::select($sql,[$cmp_id]);
        return $res;
	}
   

}