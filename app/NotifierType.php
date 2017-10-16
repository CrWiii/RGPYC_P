<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;

class NotifierType extends Model{
	protected $table = 'notifier_type';

	 public function Caso()
    {
      return $this->hasMany(Caso::class);
    }
}