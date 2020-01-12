<?php 

namespace App\MyLibs\Repositories;

use App\MyLibs\Models\Job_category;
use App\MyLibs\Repositories\BaseRepository;
use DB;

Class Job_categoryRepository extends BaseRepository
{

	protected $model;

	public function __construct(Job_category $model)
	{
		$this->model = $model;
	}

    public function getAllCategory()
    {
        $res = DB::table('job_categories')
            ->join('icons', 'job_categories.icon_id', '=', 'icons.id')
            ->select('job_categories.*', 'icons.name AS iconName')
            ->get();

        return $res;
    }

	public function getCategories()
	{
		$res = DB::table('job_categories')
            ->join('icons', 'job_categories.icon_id', '=', 'icons.id')
            ->select('job_categories.*', 'icons.name AS iconName')
            ->take(12)
            ->get();

        return $res;
	}
    
    public function getCompany()
    {
        $sql = "SELECT company_informations.company_name,company_informations.logo FROM `company_informations` WHERE company_informations.id IN (SELECT company_id FROM `company_resources` WHERE company_resources.card_id IN(SELECT id FROM `cards` WHERE card_name='Gold' OR card_name = 'Diamond' OR card_name = 'Silver'))";
        $res =\DB::select($sql);
        return $res;
    }

    public function getCategoryCount($category_id)
    {
        $res = DB::table('job_categories')
            ->join('icons', 'job_categories.icon_id', '=', 'icons.id')
            ->leftJoin('job_positions', 'job_categories.id', '=', 'job_positions.jobcategory_id')
            ->leftJoin('company_informations', 'job_positions.company_id', '=', 'company_informations.id')
            ->leftJoin('users', 'company_informations.user_id', '=', 'users.id')
            ->leftJoin('states', 'job_positions.state_id', '=', 'states.id')
            ->leftJoin('experience_levels', 'job_positions.exper_id', '=', 'experience_levels.id')
            ->select('job_categories.id as id')
            ->where('users.active', '=', 1)
            ->where('job_categories.id', '=', $category_id)
            ->get();

        return $res;
    }

    public function getPaginationCategories()
    {
        $res = DB::table('job_categories')
            ->join('icons', 'job_categories.icon_id', '=', 'icons.id')
            ->select('job_categories.*', 'icons.name AS iconName')
            ->paginate(12);

        return $res;
    }

    public function getRoleId($user_id)
    {
        $role_id = DB::table('role_user')
            ->join('users', 'role_user.user_id', '=', 'users.id')
            ->select('role_user.role_id AS role_id')
            ->where('role_user.user_id', '=', $user_id)
            ->get();

        return $role_id;
    }

    public function getCategoriesDetail($category_id)
    {
        $res = DB::table('job_categories')
            ->join('icons', 'job_categories.icon_id', '=', 'icons.id')
            ->leftJoin('job_positions', 'job_categories.id', '=', 'job_positions.jobcategory_id')
            ->leftJoin('company_informations', 'job_positions.company_id', '=', 'company_informations.id')
            ->leftJoin('users', 'company_informations.user_id', '=', 'users.id')
            ->leftJoin('states', 'job_positions.state_id', '=', 'states.id')
            ->leftJoin('experience_levels', 'job_positions.exper_id', '=', 'experience_levels.id')
            ->select('job_categories.name as category_name', 'job_positions.*', 'job_positions.id as job_position_id', 'company_informations.*', 'company_informations.id as company_id', 'states.name as state_name', 'experience_levels.name as experience_name')
            ->where('users.active', '=', 1)
            ->where('job_categories.id', '=', $category_id)
            ->paginate(12);

        return $res;

        // $sql="SELECT job_categories.name as category_name,job_positions.*,job_positions.id as job_position_id,company_informations.*,company_informations.id as company_id,states.name as state_name,experience_levels.name as experience_name FROM job_categories,job_positions,company_informations,states,experience_levels, users WHERE job_positions.jobcategory_id=job_categories.id AND job_positions.company_id=company_informations.id AND company_informations.user_id = users.id AND job_positions.state_id=states.id AND job_positions.exper_id=experience_levels.id AND job_categories.id = ? AND users.active = 1";
        // $res =\DB::select($sql,[$category_id]);
        // return $res;
    }

   
    
}