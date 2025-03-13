<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'admin_id', 'activities'];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_post');
    }
    public function activity()
    {
        return $this->belongsTo(Page::class, 'post_id');
    }
}
