<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInforme extends Model
{
    
	protected $table = 'tipo_informe';

	
    public function Informe(){
            return $this->belongsTo(Informe::class);
    }
    public function InformesPasados(){
            return $this->belongsTo(InformesPasados::class);
    }

     public function ModelContent(){
            return $this->belongsToMany(ModelContent::class, 'tipo_model','model_content_id','tipo_informe_id');
     }
}
