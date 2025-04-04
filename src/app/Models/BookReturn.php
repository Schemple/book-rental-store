<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookReturn extends Model
{
    protected $fillable = []; // 'rental_id', 'return_date', 'condition', 'refund_amount'

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

}
