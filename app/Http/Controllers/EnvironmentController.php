<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    public function centralized_cities_concept(){
        return view('centralized-cities');
    }
}
