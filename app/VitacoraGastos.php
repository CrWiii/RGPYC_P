<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VitacoraGastos extends Model
{
     protected $table = 'vitacora_gastos';

     public $fillable = [
      'fecha'
      ,'concepto'
      ,'importe'
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
