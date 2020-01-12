<?php

namespace OnlineShopping\MyLibs\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use OnlineShopping\MyLibs\Repositories\ProductRepository;
trait PaginationTrait
{
    protected $productRepo;
    public function __construct(ProductRepository $productRepo)
    {     
        $this->productRepo=$productRepo;
    }
	// protected static function boot()
	// {
	// 	parent::boot();
	// 	static::creating(function ($model)
	// 	{
	// 		$model->{$model->getKeyName()} = Uuid::generate()->string;
	// 		// $model->getKeyName() return primary key name = id
	// 	});
	// }	

	public function paginateMyLargeRecord($records,$per_page=12,$custom_url='/')
    {
    	$records = collect($records);        
        $currentPage = request()->page?: 1;
        $slice_init = ($currentPage == 1) ? 0 : (($currentPage*$per_page)-$per_page);
        $pagedData = $records->slice($slice_init, $per_page)->all();
        $records = new LengthAwarePaginator($pagedData, count($records), $per_page, $currentPage);
        $records ->setPath($custom_url);        
        return $records;
    }

}
