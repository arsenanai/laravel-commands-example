<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldKato extends Model
{
    protected $fillable = array('id','code','kk','ru','full_kk','full_ru','has_child','parent_id','deleted','updated');
    public function newKato(){
        return $this->hasOne('App\NewKato', 'code', 'code');
    }
}
