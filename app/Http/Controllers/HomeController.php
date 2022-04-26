<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\RealEstate\Category;
use App\Models\RealEstate\Feature;
use App\Models\RealEstate\Project;
use App\Models\RealEstate\Property;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {

        return view('contents.home',[
            'countries' => Country::all(),
            'categories' => Category::all(),
            'properties' => Property::all(),
            'features' => Feature::all(),
            'upComingProjects' => Project::where('date_finish', '<', Carbon::now())->take(3)->get(),
            'areas' => City::whereHas('properties')->get(),
            'blogs' => Blog::orderBy('created_at', 'desc')->take(5)->get(),
        ]);
    }
}
