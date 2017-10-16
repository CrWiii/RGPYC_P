<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
     protected $table = 'Ubigeo';


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
