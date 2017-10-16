<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirming extends Model{
	protected $table = 'persona';

	public function Caso(){
		return $this->hasMany(Caso::class,'confirming_who_id','id');
	}

}