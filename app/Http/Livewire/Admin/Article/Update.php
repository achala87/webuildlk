<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $article;

    public $title;
    public $acontent;
    public $seo_description;
    public $seo_keywords;
    public $slug;
    public $category;
    public $language;
    public $image;
    
    protected $rules = [
        'title' => 'required',
        'acontent' => 'required|min:30',        
    ];

    public function mount(Article $article){
        $this->article = $article;
        $this->title = $this->article->title;
        $this->acontent = $this->article->acontent;
        $this->seo_description = $this->article->seo_description;
        $this->seo_keywords = $this->article->seo_keywords;
        $this->slug = $this->article->slug;
        $this->image = $this->article->image;   
        $this->language = $this->article->language;   
        $this->category =  json_decode($this->article->category);     
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Article') ]) ]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            $this->image = $this->getPropertyValue('image')->store('image/articles', 'public');
        }
        
        //dd($this->category);
        if(!is_array($this->category)){
            $splitCat = explode(",", $this->category);
        }else{
            $splitCat = $this->category;
        }

        $this->article->update([
            'title' => $this->title,
            'acontent' => $this->acontent,
            'image' => $this->image,
            'category' => json_encode($splitCat),
            'slug' => $this->slug,
            'language' => $this->language,
            'seo_description' => $this->seo_description,
            'seo_keywords' => $this->seo_keywords,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.article.update', [
            'article' => $this->article
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['acontent' => __('AContent') ])]);
    }
}
