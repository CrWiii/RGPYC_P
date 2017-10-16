<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    protected $table = 'motivo';

    public $fillable = [


       'description'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'
      ];


       public function Vitacora(){
            return $this->hasMany(Vitacora::class);
      }
}
