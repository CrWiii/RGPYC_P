<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VitacoraSeguimiento extends Model
{
    protected $table = 'vitacora_seguimiento';

    public $fillable = [
       'content'
      ,'tipovit_id'
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
