<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'parent_id', 'admin_id'];
    // علاقة المجلدات الفرعية
    public function subfolders()
    {
        return $this->hasMany(Folder::class, 'parent_id'); // assuming there's a parent_id in folders table
    }
    // علاقة الملفات داخل المجلد
    public function files()
    {
        return $this->hasMany(File::class);  // assuming the files table has folder_id
    }
}
