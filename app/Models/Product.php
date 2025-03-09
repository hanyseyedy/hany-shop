<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
    public function comments(): MorphMany
    {
        return $this->morphMany(\App\Models\Comment::class, 'commentable');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


}
