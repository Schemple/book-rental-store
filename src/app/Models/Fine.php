<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    /** @use HasFactory<\Database\Factories\FineFactory> */
    use HasFactory;

    protected $fillable = []; // 'rental_id', 'amount', 'reason', 'paid'

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
