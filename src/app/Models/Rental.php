<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = []; // 'user_id', 'customer_id', 'rental_date', 'due_date', 'status', 'deposit', 'rental_fee', 'refund_amount', 'penalty_fee', 'late_fee'

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rentalDetail()
    {
        return $this->hasMany(RentalDetail::class);
    }

    public function fine()
    {
        return $this->hasOne(Fine::class);
    }

    public function bookReturn()
    {
        return $this->hasOne(BookReturn::class);
    }
}
