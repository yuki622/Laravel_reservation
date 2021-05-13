<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'studio_id',
        'type',
        'description',
        'price',
        'image'
        ];
        
     public function studio() {
        return $this->belongsTo('App/Model/Studio');
     }
    
}
