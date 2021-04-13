<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemMessagesController extends Controller
{
    public function index()
    {
        return view('coming_soon');
    }
}
