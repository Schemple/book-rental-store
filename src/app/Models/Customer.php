<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = []; // 'full_name', 'phone', 'email', 'address'

    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
}
