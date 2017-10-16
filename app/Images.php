<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    public $fillable =[
    	   'description'
	      ,'content'
	      ,'route'
	      ,'order_number'
	      ,'state'
	      ,'created_by'
	      ,'updated_by'
      ];

    public function Informe(){
            return $this->belongsToMany(Informe::class,'informe_imagen', 'informe_id', 'image_id');
    }

}
