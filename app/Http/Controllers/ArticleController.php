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

    public function article_search($searchparam, Request $request) //modified part
    {   
        
        $query = $request->get('search_term');
        
        
        //search from content search input field
        if($query!=null){
        $data['articles'] = Article::search($query)->get();
        }
           
        //if search field empty and category selected
        else{
            $data['articles'] = Article::whereJsonContains('category', $searchparam)->orderBy('created_at', 'desc')->get();
        }
        
        //redirect if articles not present
        if(!$data['articles']){
            return redirect()->route('articles', app()->getLocale());
         } 

         return view('view-articles', $data );
    }
    
}
