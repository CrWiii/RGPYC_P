<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifier extends Model {
	protected $table = 'persona';

	public function Caso(){
		return $this->hasMany(Caso::class,'notifier_id','id');
	}
}