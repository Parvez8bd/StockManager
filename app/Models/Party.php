<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function scopeCustomer($query)
    {
        return $query->where('party_type', 1);
    }
    public function scopeSupplier($query){
        return $query->where('party_type', 2);
        
    }
    public function scopeReceiveable($query){
        return $query->where('balance_type', 1);
    }
    public function scopePayable($query){
        return $query->where('balance_type', 0);
    }
}
