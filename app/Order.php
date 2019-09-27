<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'share_id',
        'buyer_id',
        'seller_id',
        'quantity',
        'status'
    ];
    public function share(){
        return $this->belongsTo(Share::class,'share_id','id');
    }
    public function user(){
        return $this->belongsTo(Share::class,'buyer_id','id');
    }
}
