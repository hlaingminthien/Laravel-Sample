<?php 

namespace App\MyLibs\Repositories;

use App\MyLibs\Models\Interview;
use App\MyLibs\Repositories\BaseRepository;
use DB;

Class Interview_infoRepository extends BaseRepository
{

	protected $model;

	public function __construct(Interview $model)
	{
		$this->model = $model;
	}
}