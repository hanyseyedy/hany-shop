<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // فیلدهای مجاز برای Mass Assignment
    protected $fillable = [
        'name',
        'price',
        'stock',
    ];

    //
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
