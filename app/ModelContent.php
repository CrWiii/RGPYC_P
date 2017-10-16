<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelContent extends Model
{
    	protected $table = 'model_content';
    
    	
    public function TipoInforme(){
        return $this->belongsToMany(TipoInforme::class, 'tipo_model','tipo_informe_id','model_content_id');
    }

    public function Content(){
		return $this->belongsTo(Content::class);
	}

	public function Area(){
		return $this->belongsToMany(Area::class,'model_area','model_id','area_id');
	}

}
