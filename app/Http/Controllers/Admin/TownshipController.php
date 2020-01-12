<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Models\State;
use App\MyLibs\Models\City;

class TownshipController extends Controller
{
    public function create()
    {
       $states = State::all();
       $cities = City::all();
       return view('admin.townships.create',compact('states','cities'));
    }
}
