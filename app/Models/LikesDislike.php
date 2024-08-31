<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likesDislike extends Model
{
    protected $fillable = ['post_id', 'user_id', 'type'];
}
