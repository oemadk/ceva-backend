<?php
 
namespace App;
use App\Customer;
 
use Illuminate\Database\Eloquent\Model;
 
class Opening_balance extends Model
{
    protected $table = 'opening_balance';

    public $fillable = ['cutomer_id','customer_name', 'opening_balance_date', 'comment', 'opening_balance_amount'];



                public function customers()
    {
        return $this->belongsTo(Customer::class, 'cutomer_id');
    }
}