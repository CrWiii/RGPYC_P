<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TercerAfectado extends Model
{
    protected $table = 'tercer_afectado';

    public $fillable = [

       'quien_reclama'
      ,'que_reclama'
      ,'monto_reclama'
      ,'caso_id'
      ,'dano_id'
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
