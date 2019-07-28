<?php

namespace App;
use App\Customerstatement;

use Illuminate\Database\Eloquent\Model;

class Customercomments extends Model
{
            public function statement()
    {
        return $this->belongsTo(Customerstatement::class, 'id');
    }
}

