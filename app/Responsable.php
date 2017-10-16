<?php 
namespace app;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model{

	protected $table = 'persona';

	public function Caso(){
		return $this->hasMany(Caso::class);
	}
}