<?php 

namespace App\MyLibs\Repositories;

use App\MyLibs\Models\Position_Level;
use App\MyLibs\Repositories\BaseRepository;
use DB;

Class Position_LevelRepository extends BaseRepository
{

	protected $model;

	public function __construct(Position_Level $model)
	{
		$this->model = $model;
	}

	public function getCategories()
	{
		$res = DB::table('Position_Level')
            
            ->select('position_levels.*')
            ->take(12)
            ->get();

        return $res;
	}   
}
