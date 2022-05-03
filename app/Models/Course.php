<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'img_src',
        'file_path',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function technology()
    {
        return $this->hasMany(Technology::class);
    }
}
