<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'location',
        'description',
        'image',
        'tel_num'
        ];
        
    public function rooms() {
        return $this->hasmany('App/Models/Room'); 
    }
    
    public function store(Request $request , Studio $Studio){
        $input = $request['studio_form'];
        $studio = $this->create($input);
        $studio->rooms()->sttach($input['studio']);
    }
}
