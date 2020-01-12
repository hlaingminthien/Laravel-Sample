<?php 

namespace App\MyLibs\Repositories;

use App\MyLibs\Models\Job_position;
use App\MyLibs\Repositories\BaseRepository;
use DB;

Class Job_positionRepository extends BaseRepository
{

	protected $model;

	public function __construct(Job_position $model)
	{
		$this->model = $model;
	}
   
   public function getAllData($user_id)
	{
		$data = DB::table('company_informations')
            ->join('users', 'company_informations.user_id', '=', 'users.id')
            ->select('company_informations.id AS company_id')
            ->where('company_informations.user_id', '=', $user_id)
            ->get();

        $company_id = $data->first()->company_id;

        $res = DB::table('job_positions')
        	->join('states', 'job_positions.state_id', '=', 'states.id')
            ->leftJoin('company_resources', 'job_positions.company_id', '=', 'company_resources.company_id')
        	->join('job_categories', 'job_positions.jobcategory_id', '=', 'job_categories.id')
        	->join('experience_levels', 'job_positions.exper_id', '=', 'experience_levels.id')
            ->select('job_positions.*','states.name as stateName', 'job_categories.name as job_categoryName', 'experience_levels.name as experienceLevel', 'company_resources.used_topping as toppingCount', 'company_resources.used_refresh as refreshCount', 'company_resources.used_time as usedTime')
            ->where('job_positions.company_id', '=', $company_id)
            ->where('job_positions.offer_employee_count', '>',0)
            ->get();
        return $res;
	}

	public function getJobPositionsByTopping()
	{
		$res = DB::table('job_positions')
			->join('company_informations', 'job_positions.company_id', '=', 'company_informations.id')
            ->join('users', 'company_informations.user_id', '=', 'users.id')
			->join('states', 'job_positions.state_id', '=', 'states.id')
            ->select('job_positions.*','company_informations.company_name as companyName','states.name as stateName','company_informations.contact_name as contactName', 'company_informations.logo as logo')
            ->where('users.active', '=', '1')
            ->whereNotNull('job_positions.topping_time')
            ->where('job_positions.offer_employee_count', '>',0)
            ->orderBy('job_positions.topping_time','desc')
            ->take(12)
            ->get();
        return $res;
	}

    public function getJobPositionsByRefresh()
    {
        $res = DB::table('job_positions')
            ->join('company_informations', 'job_positions.company_id', '=', 'company_informations.id')
            ->join('users', 'company_informations.user_id', '=', 'users.id')
            ->join('states', 'job_positions.state_id', '=', 'states.id')
            ->select('job_positions.*','company_informations.company_name as companyName','states.name as stateName','company_informations.contact_name as contactName', 'company_informations.logo as logo')
            ->where('users.active', '=', '1')
            ->whereNotNull('job_positions.refresh_time')
            ->where('job_positions.offer_employee_count', '>',0)
            ->orderBy('job_positions.refresh_time','desc')
            ->take(12)
            ->get();
        return $res;
    }

    public function getLatestJobPositions()
    {
        $res = DB::table('job_positions')
            ->join('company_informations','job_positions.company_id', '=', 'company_informations.id')
            ->join('states', 'job_positions.state_id', '=', 'states.id')
            ->join('users', 'company_informations.user_id', '=', 'users.id')
            ->select('job_positions.*','company_informations.company_name as companyName','states.name as stateName','company_informations.contact_name as contactName','company_informations.logo as logo')
            ->where('users.active', '=', '1')
            ->where('job_positions.offer_employee_count', '>',0)
            ->orderBy('job_positions.created_at','desc')
            ->take(12)
            ->get();
        return $res;
    }

    public function searchforall($keyword)
    {
        // $sql="SELECT job_positions.* FROM job_positions,company_informations,users WHERE company_informations.user_id = users.id AND users.active=1
        //    AND job_positions.position_name LIKE '{$keyword}%' 
        //    OR job_positions.position_name LIKE '%{$keyword}' OR job_positions.position_name LIKE '%{$keyword}%' 
        //    OR job_positions.position_name LIKE '_{$keyword}%' OR job_positions.position_name LIKE '{$keyword}__%'";
       $sql ="SELECT  job_positions.* 
                FROM job_positions,company_informations,users 
                WHERE job_positions.company_id=company_informations.id  AND 
                    company_informations.company_correct=1  AND 
                    company_informations.user_id = users.id AND 
                    users.active=1 AND job_positions.position_name LIKE '%{$keyword}%'
                UNION
                SELECT job_positions.* 
                FROM job_positions, company_informations, users 
                WHERE job_positions.company_id=company_informations.id  AND 
                    company_informations.company_correct=1  AND 
                    company_informations.user_id = users.id AND 
                    users.active=1 AND 
                    company_informations.company_name LIKE '%{$keyword}%'";
        $search =\DB::select($sql);
        return $search;
    }


	public function searchfortwo($jobid, $stid, $keyword)
	{
		$sql="SELECT job_positions.* FROM job_positions,company_informations,users 
            WHERE job_positions.company_id=company_informations.id
                  AND company_informations.company_correct=1 
                  AND company_informations.user_id = users.id 
                  AND users.active=1
                  AND job_positions.jobcategory_id=? AND job_positions.state_id=?
                  AND job_positions.position_name LIKE '%{$keyword}%'
            UNION
            SELECT job_positions.* FROM job_positions,company_informations,users 
            WHERE job_positions.company_id=company_informations.id
                  AND company_informations.company_correct=1 
                  AND company_informations.user_id = users.id 
                  AND users.active=1
                  AND job_positions.jobcategory_id=? AND job_positions.state_id=?
                  AND company_informations.company_name LIKE '%{$keyword}%'";
		$search =\DB::select($sql,[$jobid,$stid,$jobid,$stid]);
        return $search;

	}

    public function searchforcategory($jobid, $keyword)
    {
        $sql="SELECT job_positions.* 
            FROM job_positions,company_informations,users 
            WHERE job_positions.company_id=company_informations.id
                    AND company_informations.company_correct=1 
                    AND company_informations.user_id = users.id 
                    AND users.active=1
                    AND job_positions.jobcategory_id=?
                    AND job_positions.position_name LIKE '%{$keyword}%'
            UNION
            SELECT job_positions.* 
            FROM job_positions,company_informations,users 
            WHERE job_positions.company_id=company_informations.id
                    AND company_informations.company_correct=1 
                    AND company_informations.user_id = users.id 
                    AND users.active=1
                    AND job_positions.jobcategory_id=?
                    AND company_informations.company_name LIKE '%{$keyword}%' ";
        $search =\DB::select($sql,[$jobid, $jobid]);
        return $search;

    }

    public function searchforstate($stid, $keyword)
    {
        $sql="SELECT job_positions.* 
            FROM job_positions,company_informations,users 
            WHERE job_positions.company_id=company_informations.id
                AND company_informations.company_correct=1 
                AND company_informations.user_id = users.id 
                AND users.active=1 AND job_positions.state_id=?
                AND job_positions.position_name LIKE '%{$keyword}%'
            UNION
            SELECT job_positions.* 
            FROM job_positions,company_informations,users 
            WHERE job_positions.company_id=company_informations.id
                AND company_informations.company_correct=1 
                AND company_informations.user_id = users.id 
                AND users.active=1 AND job_positions.state_id=?
                AND company_informations.company_name LIKE '%{$keyword}%'";
        $search =\DB::select($sql,[$stid, $stid]);
        return $search;

    }

	public function getPaginationPositions()
    {
        $res = DB::table('job_positions')
			->join('company_informations', 'job_positions.company_id', '=', 'company_informations.id')
			->join('states', 'job_positions.state_id', '=', 'states.id')
            ->select('job_positions.*','company_informations.company_name as companyName','states.name as stateName','company_informations.contact_name as contactName', 'company_informations.logo as logo')
            ->whereNotNull('job_positions.topping_time')
            ->where('job_positions.offer_employee_count', '>',0)
            ->orderBy('job_positions.topping_time','desc')
            ->paginate(12);

        return $res;
    }

    public function getPaginationFeaturedJobs()
    {
        $res = DB::table('job_positions')
            ->join('company_informations', 'job_positions.company_id', '=', 'company_informations.id')
            ->join('states', 'job_positions.state_id', '=', 'states.id')
            ->select('job_positions.*','company_informations.company_name as companyName','states.name as stateName','company_informations.contact_name as contactName', 'company_informations.logo as logo')
            ->where('job_positions.offer_employee_count', '>',0)
            ->orderBy('job_positions.refresh_time','desc')
            ->paginate(12);

        return $res;
    }

    public function getJobdetail($id,$cmp_id)
    {
        $sql="SELECT job_categories.name as category_name,job_positions.*,job_positions.id as job_position_id,company_informations.*,company_informations.id as company_id,states.name as state_name,experience_levels.name as experience_name FROM job_categories,job_positions,company_informations,states,experience_levels WHERE job_positions.id=? AND job_positions.company_id=? AND  job_positions.jobcategory_id=job_categories.id AND job_positions.company_id=company_informations.id AND job_positions.state_id=states.id AND job_positions.exper_id=experience_levels.id";
        $serach =\DB::select($sql,[$id,$cmp_id]);
        return $serach;

    }
}