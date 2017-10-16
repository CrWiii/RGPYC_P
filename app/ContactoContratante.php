<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactoContratante extends Model{
	protected $table = 'persona';

	public function Caso(){
		return $this->hasMany(Caso::class,'contact_contratante_id','id');
	}

}