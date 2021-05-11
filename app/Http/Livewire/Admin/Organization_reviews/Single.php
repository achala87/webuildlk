<?php

namespace App\Http\Livewire\Admin\Organization_reviews;

use App\Models\Organization_Reviews;
use Livewire\Component;

class Single extends Component
{

    public $organization_reviews;

    public function mount(Organization_Reviews $organization_reviews){
        $this->organization_reviews = $organization_reviews;
    }

    public function delete()
    {
        $this->organization_reviews->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Organization_Reviews') ]) ]);
        $this->emit('organization_reviewsDeleted');
    }

    public function render()
    {
        return view('livewire.admin.organization_reviews.single')
            ->layout('admin::layouts.app');
    }
}
