<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reservation extends Model 
{
    protected $fillable = [
        'user_id',
        'room_id',
        'num',
        'datetime',
        //'finish'
        ];
        
    public function room () {
        return $this->belongsTo('App/Models/Room');
    }
    
}