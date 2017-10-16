<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cia extends Model
{
   	protected $table = 'cia';
    

    public $fillable = [
       'razon_social'
      ,'direccion'
      ,'ruc'
      ,'nombre_comercial'
      ,'estado_contribuyente'
      ,'distrito'
      ,'provincia'
      ,'departamento'
      ,'ubigeo_id'
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
