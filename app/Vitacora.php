<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vitacora extends Model
{
    protected $table = 'vitacora_llamada';

    public $fillable = [

       'name'
      ,'tipo'
      ,'comentario'
      ,'fecha_vitacora'
      ,'motivo_id'
      ,'caso_id'
      ,'content_id'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'

      ];

      public function Caso(){
            return $this->belongsTo(Caso::class);
      }

      public function Motivo(){
            return $this->belongsTo(Motivo::class);
      }
      
}
