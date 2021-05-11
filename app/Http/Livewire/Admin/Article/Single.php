<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;

class Single extends Component
{

    public $article;

    public function mount(Article $article){
        $this->article = $article;
    }

    public function delete()
    {
        $this->article->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Article') ]) ]);
        $this->emit('articleDeleted');
    }

    public function render()
    {
        return view('livewire.admin.article.single')
            ->layout('admin::layouts.app');
    }
}
