<?php

namespace App\Http\Livewire\Admin\Organization_reviews;

use App\Models\Organization_Reviews;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Update extends Component
{
    use WithFileUploads;

    public $organization_reviews;

    public $remarks;
    public $status;
    public $reviewer_id;
    
    protected $rules = [
        'status' => 'required',
        'reviewer_id' => 'required',
    ];

    public function mount(Organization_Reviews $organization_reviews){
        $this->organization_reviews = $organization_reviews;
        $this->status = $this->organization_reviews->status;
        $this->remarks = $this->organization_reviews->remarks;
        $this->reviewer_id = $this->organization_reviews->reviewer_id;   
        
        $rem = json_decode($this->organization_reviews->remarks, true);
        $this->fill(['remarks' => $rem[0]['remark']]);
    }

    public function updated($input)
    {
        $this->validateOnly($input);
        
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Organization_Reviews') ]) ]);
        //dd($this->organization_reviews->status);
        
        $this->organization_reviews->update([
            'status' => $this->status,
            'reviewer_id' => auth()->id(), //
            'remarks' => json_encode(      //userid, remark, datetime, flag [normal/alert, on/off], fileuploads
                                     array(array(
                                        'user'=> auth()->id(),
                                        'remark'=> $this->remarks,
                                        'datetime'=> Carbon::now(),
                                        'flag'=> array('normal', 'off'),
                                        'fileuploads'=> null)) ),
        ]);
        
    }

    public function render()
    {
        return view('livewire.admin.organization_reviews.update', [
            'organization_reviews' => $this->organization_reviews
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Organization_Reviews') ])]);
    }
}
