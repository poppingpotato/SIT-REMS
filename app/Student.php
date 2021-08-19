<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='student';

    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    protected $fillable = [
        'student_id',
        'lastName',
        'firstName',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
