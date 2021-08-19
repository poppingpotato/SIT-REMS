<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table='employee';

    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'lastName',
        'firstName',
    ];

    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
