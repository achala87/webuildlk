<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Intervention\Image\Facades\Image as Image;

class ArticleController extends Controller
{
    public function index() 
    {   
       $data['articles'] = Article::latest()->get();
       
       return view('view-articles', $data );

    }

    public function read_article(Request $request)
    { 
        $slug = urldecode(request()->segment(3));
        $data['article'] = Article::where('slug', $slug)->first();
        $data['categories'] = json_decode($data['article']->category);
        return view('read-article', $data);
    }

    public function upload_article_image(Request $request){
 
        $mainImage = $request->file('file');
        $filename = time().'.'.$mainImage->extension();
        Image::make($mainImage)->save('storage/image/articles/'.$filename);
        return json_encode(['location' => asset('storage/image/articles/'.$filename) ]);
        exit;
    }

    public function article_search($searchparam = 0, Request $request)
    {   
        $filtertype = 'dropdown';
        if($searchparam == 0){ 
            $filtertype = 'content';
        }

        //search from content search input field
        if($filtertype == 'content'){ 
            $data['articles'] = Article::where('acontent', 'like', '%'. $request->input('search_term') . '%' )->orderBy('created_at', 'desc')->get();
        }
        
        //search from drop down category
        if($filtertype == 'dropdown'){
            $data['articles'] = Article::whereJsonContains('category', $searchparam)->orderBy('created_at', 'desc')->get();
        }
        
        if(!$data['articles']){
            return redirect()->route('articles', app()->getLocale());
         }

         return view('view-articles', $data );
    }
    
}
