<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    
    public $title;
    public $acontent = '';
    public $image = 0;  
    public $seo_description;
    public $seo_keywords;
    public $slug;
    public $language;
    public $category;
    
    protected $rules = [
        'title' => 'required',
        'acontent' => 'required|min:30',       
    ];

    public function mount()
    {
        $this->acontent = '';
        $this->language = 'en';
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        //dd($this->image);
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Article') ])]);
        
        if($this->getPropertyValue('image') and is_object($this->image)) {
            
            $this->image = $this->getPropertyValue('image')->store('image/articles', 'public');
           
        }

        $splitCat = explode(",", $this->category);

        $response =  Article::create([
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
       
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.article.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Article') ])]);
    }
}
