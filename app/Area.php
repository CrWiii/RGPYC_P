<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model{
    
    protected $table = 'area';

    protected $primaryKey = 'id';

    public $fillable = [
	    'code',
	    'description',
	    'state',
	    'created_by',
	    'updated_by',
	    'created_at',
	    'not_cre_caso',
	    'updated_at'
	];

	public function User(){
		return $this->belongsToMany(Users::class,'user_area','area_id','user_id');
	}
	public function Caso(){
		return $this->hasMany(Caso::class);
	}

	public function Ramo(){
		return $this->belongsTo(Ramo::class);
	}

	public function Model(){
		return $this->belongsToMany(ModelContent::class,'model_area','area_id','model_id');
	}

	public function ResponsableArea(){
            return $this->belongsToMany(Persona::class, 'responsable_area', 'area_id','persona_id');
      }

}
