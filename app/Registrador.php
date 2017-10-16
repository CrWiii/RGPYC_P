<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrador extends Model{
    
    protected $table = 'users';

    protected $primaryKey = 'id';


	public function Caso(){
		return $this->hasMany(Caso::class, 'created_by','id');
	}

	public function Persona(){
		return $this->belongsTo(Persona::class);
	}
	
}
