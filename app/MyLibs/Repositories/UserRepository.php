<?php 

namespace App\MyLibs\Repositories;

use App\User;
use App\MyLibs\Models\Cv;
use App\MyLibs\Repositories\BaseRepository;

Class UserRepository extends BaseRepository
{

	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function getUserCVInfo($u_id)
	{
		 $sql = "SELECT cvs.id as cv_id, users.id as user_id, cvs.state_id as cv_state_id, cvs.updated_at as updated_date, cvs.*, users.* FROM cvs,users WHERE cvs.user_id = users.id AND cvs.user_id=?";
    	 $res = \DB::select($sql,[$u_id]);
		return $res;
	}

}