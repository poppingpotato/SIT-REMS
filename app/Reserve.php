<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table='reserve';

    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'eq_r_id',
        'quantity',
        'room_id',
        'ReservedBy_SA_ID',
        'start',
        'end',
        'status',
    ];

    public function equipment(){
        return $this->belongsTo('App\Equipment', 'eq_r_id', 'equipment_id');
    }

    public function room(){
        return $this->HasMany('App\Room');
    }
    public function user(){
        return $this->belongsTo('App\User', 'ReservedBy_SA_ID', 'idNumber');
    }
}
