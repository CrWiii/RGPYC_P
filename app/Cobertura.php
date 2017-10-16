<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
    protected $table = 'cobertura';
    
    public $fillable = [
      'cobertura_afectada'
      ,'deducible'
      ,'limite_afectado'
      ,'departamento'
      ,'description'
      ,'caso_id'
      ,'cobertura_model_id'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'
    ];

      public function Caso(){
            return $this->belongsTo(Caso::class);
      }

      public function Cobertura(){
            return $this->belongsTo(Cobertura::class);
      }

}
