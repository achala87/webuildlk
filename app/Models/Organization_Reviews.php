<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Organization_Reviews extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'organization_reviews';

    protected $fillable = [
        'description',
        'created_by_user_id',
        'organization_id',
        'date_from'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function oragnization()
    {
        return $this->belongsTo(Oragnizations::class, 'id');
    }
}
