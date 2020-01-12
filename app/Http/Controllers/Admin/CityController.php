<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Models\State;

class CityController extends Controller
{
    public function create()
    {
    	return view('admin.cities.create');
    }
}
