<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_id');
    }
}
