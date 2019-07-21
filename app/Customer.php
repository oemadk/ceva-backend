<?php

namespace App;
use App\Discount;
use App\Endingbalance;
use App\Invoice;
use App\Opening_balance;
use App\collection;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	    protected $primaryKey = 'cutomer_id';

        public function discounts()
    {
        return $this->hasMany(Discount::class, 'cutomer_id', 'cutomer_id');
    }


            public function endingbalances()
    {
        return $this->hasMany(Endingbalance::class, 'cutomer_id', 'cutomer_id');
    }


                public function invoices()
    {
        return $this->hasMany(Invoice::class, 'cutomer_id', 'cutomer_id');
    }


                    public function openingbalance()
    {
        return $this->hasMany(Opening_balance::class, 'cutomer_id', 'cutomer_id');
    }



                        public function collection()
    {
        return $this->hasMany(collection::class, 'cutomer_id', 'cutomer_id');
    }
}
