<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'district', 'org_type']; 

    /**
     * Get the org reviews for the orgs.
     */
    public function organization_reviews()
    {
        return $this->hasMany(Organization_reviews::class, 'organization_id');
    }
}
