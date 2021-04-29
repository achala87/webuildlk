<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Organizations extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['title', 'district', 'org_type']; 

    /**
     * Get the org reviews for the orgs.
     */
    public function organization_reviews()
    {
        return $this->hasMany(Organization_reviews::class, 'organization_id');
    }
}
