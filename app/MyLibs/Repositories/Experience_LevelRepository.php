<?php 

namespace App\MyLibs\Repositories;

use App\MyLibs\Models\ExperLevel;
use App\MyLibs\Repositories\BaseRepository;
use DB;

Class Experience_LevelRepository extends BaseRepository
{

	protected $model;

	public function __construct(ExperLevel $model)
	{
		$this->model = $model;
	}

	public function getExperience()
	{
		$res = DB::table('experience_levels')
            
            ->select('experience_levels.*')
            ->take(12)
            ->get();

        return $res;
	}   
}
