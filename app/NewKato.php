<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewKato extends Model
{
    protected $fillable = array('code','ab','cd','ef','hij','k','kk','ru','nn');
    public function oldKato(){
        return $this->hasOne('App\OldKato', 'code', 'code');
    }
}
