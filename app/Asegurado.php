<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asegurado extends Model
{
     protected $table = 'asegurado';
     
     protected $primaryKey = 'id';
     

     public $fillable = [
	   'description'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'
	    ];

      public function Caso()
    {
      return $this->hasMany(Caso::class);
    }


}
