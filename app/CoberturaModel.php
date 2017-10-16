<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoberturaModel extends Model{
    protected $table = 'cobertura_model';   
    public $fillable = [
      'ramo_id'
      ,'title'
      ,'description'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'
    ];

    public function Ramo(){
  		return $this->belongsTo(Ramo::class);
  	}

    public function CoberturaModel(){
       return $this->hasMany(CoberturaModel::class);
    }
}