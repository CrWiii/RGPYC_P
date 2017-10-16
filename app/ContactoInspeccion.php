<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactoInspeccion extends Model{
	protected $table = 'persona';

	public function Caso(){
		return $this->hasMany(Caso::class,'contact_inspeccion_id','id');
	}

}