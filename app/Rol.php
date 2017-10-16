<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model{
    protected $table = 'rol';

    public $fillable = [
       'description'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'
    ];

    public function Usuario(){
		  return $this->belongsToMany(User::class,'permiso','rol_id','user_id');
	}

}
