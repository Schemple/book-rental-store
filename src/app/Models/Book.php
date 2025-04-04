<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Book extends Model implements Transformable
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    use TransformableTrait;

    protected $fillable = ['title', 'category_id', 'author','quantity','image', 'price', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rentalDetails()
    {
        return $this->hasMany(RentalDetail::class);
    }
}
