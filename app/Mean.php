<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;

class Mean extends Model{
	protected $table = 'mean';

	 public function Caso()
      {
            return $this->belongsTo(Caso::class);
      }
}