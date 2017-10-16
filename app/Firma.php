<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firma extends Model{
    
    protected $table = 'Persona';

	public function Caso(){
      return $this->belongsToMany(Caso::class,'firma','persona_id','caso_id');
    }

}




