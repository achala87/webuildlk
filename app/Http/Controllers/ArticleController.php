<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() 
    {   
       $data['articles'] = Article::latest()->get();
       
       return view('view-articles', $data );

    }

    public function read_article(Request $request, $ti)
    { 
        $slug = urldecode(request()->segment(3));
       
        $data['article'] = Article::where('slug', $slug)->first();
       //dd($data['article']);
        return view('read-article', $data);
    }
}
