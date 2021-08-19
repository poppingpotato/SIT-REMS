<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table='borrow';

    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'student_id',
        'eq_b_id',
        'quantity',
        'start',
        'ReleasedBy_SA_ID',
        'end',
        'RecievedBy_SA_ID',
        'status',
    ];
    
    public function equipment(){
        return $this->belongsTo('App\Equipment', 'eq_b_id', 'equipment_id');
    }

    public function user1(){
        return $this->belongsTo('App\User', 'ReleasedBy_SA_ID', 'idNumber');
    }
    public function user2(){
        return $this->belongsTo('App\User', 'RecievedBy_SA_ID', 'idNumber');
    }
}
