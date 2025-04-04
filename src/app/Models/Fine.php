<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $fillable = []; // 'rental_id', 'amount', 'reason', 'paid'

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
