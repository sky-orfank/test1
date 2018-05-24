<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function partner()
    {
        return $this->hasOne('App\Partner', 'id', 'partner_id');
    }

    public function orderProduct()
    {
        return $this->hasOne('App\OrderProduct', 'order_id', 'id');
    }    
}



