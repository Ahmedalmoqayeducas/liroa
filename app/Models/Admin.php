<?php

namespace App\Models;

// use Attribute;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as AuthMustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable implements AuthMustVerifyEmail
{
    use HasFactory, SoftDeletes, Notifiable;

    public function emailVerificationStatus(): Attribute
    {
        return new Attribute(get: fn() => $this->hasVerifiedEmail() ? "Verified" : "Not Verified");
        // return new Attribute(get: fn() => $this->hasVerifiedEmail() ? "Verified" : "Not Verified");
    }
    public function posts(){
        return $this->hasMany(Post::class,'admin_id','id');
    }
}
