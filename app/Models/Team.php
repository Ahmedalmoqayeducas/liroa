<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'emp_name',
        'employment_name',
        'email',
        'description',
        'picture',
        'phone',
        'facebook',
        'linked_in',
    ];
    protected $table = 'team';
}
