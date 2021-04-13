<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Pledges extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'pledge_id'];

    public $timestamps = true;

    protected $table = 'user_pledges';
}
