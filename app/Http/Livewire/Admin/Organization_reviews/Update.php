<?php

namespace App\Http\Livewire\Admin\Organization_reviews;

use App\Models\Organization_Reviews;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $organization_reviews;

    public $description;
    public $created_by_user_id;
    public $created_at;
    
    protected $rules = [
        'title' => 'required',
        'content' => 'required|min:30',        
    ];

    public function mount(Organization_Reviews $organization_reviews){
        $this->organization_reviews = $organization_reviews;
        $this->title = $this->organization_reviews->title;
        $this->content = $this->organization_reviews->content;
        $this->image = $this->organization_reviews->image;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Organization_Reviews') ]) ]);
        
       

        $this->organization_reviews->update([
            'status' => $this->status,
            'description' => $this->description,
            'username' => $this->organization->title,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.organization_reviews.update', [
            'organization_reviews' => $this->organization_reviews
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Organization_Reviews') ])]);
    }
}
