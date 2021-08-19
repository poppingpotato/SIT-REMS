<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $primaryKey = 'id';
    
    //Timestamps
    public $timestamps = true;

    protected $table="room";

    protected $fillable = [
        'room_id',
        'roomDes',
    ];


    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
