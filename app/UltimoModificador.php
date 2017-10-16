<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UltimoModificador extends Model{
    
    protected $table = 'users';

    protected $primaryKey = 'id';


	public function Caso(){
		return $this->hasMany(Caso::class, 'updated_by','id');
	}

	public function Persona(){
		return $this->belongsTo(Persona::class);
	}
	
}
