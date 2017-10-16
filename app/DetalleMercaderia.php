<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleMercaderia extends Model
{
	protected $table = 'detalle_mercaderia';

    public $fillable = [

       'description'
      ,'codigo'
      ,'unidad'
      ,'cantidad'
      ,'moneda'
      ,'precio_unitario'
      ,'total'
      ,'dano'
      ,'embalaje'
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
