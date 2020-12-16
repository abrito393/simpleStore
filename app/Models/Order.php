<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = ['id'];

    public function client(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function products(){
        return $this->hasMany('App\Models\OrderDetails','order_id');
    }

}
