<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EconomyController extends Controller
{
    public function value_added_production(){
        return view('value-added-production');
    }
}
