<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\User;
use Laravel\Scout\Searchable;

class Article extends Model implements Auditable
{
    use HasFactory, Notifiable;
    use \OwenIt\Auditing\Auditable;
    use Searchable;

    // protected $fillable = [
    //     'title', 'acontent', 'user_id', 'image', 'created_at', 'seo_description',
    //     'category', 'slug', 'language', 'seo_keywords',
    // ];

    protected $guarded = ['id']; //to make fields insertable

    /**
     * Get the user that owns the phone.
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
