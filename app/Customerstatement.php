<?php

namespace App;
use App\Customercomments;

use Illuminate\Database\Eloquent\Model;

class Customerstatement extends Model
{
            public function comments()
    {
        return $this->hasMany(Customercomments::class, 'id', 'customer_statement_id');
    }

}
