<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable=[
        'order_id','share_id','user_id','notification','status'
    ];
    public function user(){
        return $this-> belongsTo(User::class);
    }
}
