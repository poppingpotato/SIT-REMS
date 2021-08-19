<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table='equipments';

    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    protected $fillable = [
        'equipment_id',
        'equipmentName',
        'quantity',
    ];

    public function borrow(){
        return $this->HasMany('App\Borrow');
    }

    public function reserve(){
        return $this->belongsTo('App\Reserve');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
