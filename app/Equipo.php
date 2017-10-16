<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';

    public $fillable = [

       'caso_id'
      ,'persona_id'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'

      ];

      public function Caso(){
            return $this->belongsTo(Caso::class);
      }

      public function Persona(){
            return $this->belongsTo(Persona::class);
      }
}
