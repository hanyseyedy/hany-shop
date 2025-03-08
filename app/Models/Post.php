<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // فیلدهای مجاز برای Mass Assignment
    protected $fillable = [
        'title',
        'content',
    ];
}
