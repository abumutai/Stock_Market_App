<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable=[
        'share_name',
        'share_price',
        'share_qty',
        'user_id',
        'status'
 
    ];
    public function user()
    {
    return $this->belongsTo(Share::class,'user_id','id');
    }
    public function orders(){
        return $this->hasMany(Order::class,'share_id','id');
    }
}
