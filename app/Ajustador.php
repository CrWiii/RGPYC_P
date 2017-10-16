<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajustador extends Model{
    
    protected $table = 'persona';

    protected $primaryKey = 'id';


	public function Caso(){
		return $this->hasMany(Caso::class);
	}
}
