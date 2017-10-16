<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VitacoraEspera extends Model
{
     protected $table = 'vitacora_espera';

     public $fillable = [
       'fecha'
      ,'motivo'
      ,'caso_id'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'
      ];

      public function Caso(){
            return $this->belongsTo(Caso::class);
      }
}
