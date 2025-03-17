<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'card_description',
        'description',
        'admin_id',
        'slidable',
        'type',
    ];
}
