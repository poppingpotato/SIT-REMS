<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public function equipment(){
        return $this->belongsTo('App\User');
    }
}
