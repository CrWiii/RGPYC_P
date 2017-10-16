<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EjecutivoBroker extends Model{
  protected $table = 'persona';
    
    public function Caso(){
		  return $this->hasMany(Caso::class,'ejecutivo_broker_id','id');
		}
}
