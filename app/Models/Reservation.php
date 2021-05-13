<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'studio_id',
        'num_of_guests',
        'start',
        'finish'
        ];
        
    public function room () {
        return $this->belongsTo('App/Models/Room');
    }
}
