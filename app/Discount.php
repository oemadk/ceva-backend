<?php

namespace App;
use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
        public function customers()
    {
        return $this->belongsTo(Customer::class, 'cutomer_id');
    }
}
