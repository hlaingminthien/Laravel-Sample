<?php 

namespace App\MyLibs\Repositories;

use App\MyLibs\Models\Job_sub_category;
use App\MyLibs\Repositories\BaseRepository;
use DB;

Class Job_sub_categoryRepository extends BaseRepository
{

	protected $model;

	public function __construct(Job_sub_category $model)
	{
		$this->model = $model;
	}

    public function getAllSubCategory()
    {
        $res = DB::table('job_sub_categories')
            ->join('job_categories', 'job_categories.id', '=', 'job_sub_categories.job_category_id')
            ->select('job_sub_categories.*', 'job_categories.name AS categoryName')
            ->get();

        return $res;
    }
}