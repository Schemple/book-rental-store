<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalDetail extends Model
{
    protected $fillable = []; // 'rental_id', 'book_id', 'quantity', 'book_price'

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
