<?php 

namespace App\MyLibs\Repositories;

use App\MyLibs\Models\Card;
use App\MyLibs\Repositories\BaseRepository;

Class CardRepository extends BaseRepository
{

	protected $model;

	public function __construct(Card $model)
	{
		$this->model = $model;
	}
   

}