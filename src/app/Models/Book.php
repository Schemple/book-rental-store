<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Book extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = []; // 'title', 'category_id', 'author',' quantity', 'price', 'image', 'description'

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rentalDetails()
    {
        return $this->hasMany(RentalDetail::class);
    }
}
