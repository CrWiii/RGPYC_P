<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EjecutivoAseguradora extends Model{
  protected $table = 'persona';

    public function Caso(){
			return $this->hasMany(Caso::class,'ejecutivo_aseguradora_id','id');
		}
}
