<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReturn extends Model
{
    /** @use HasFactory<\Database\Factories\BookReturnFactory> */
    use HasFactory;

    protected $fillable = []; // 'rental_id', 'return_date', 'condition', 'refund_amount'

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

}
