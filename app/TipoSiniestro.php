<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSiniestro extends Model{

    protected $table = 'tipo_siniestro';
    
    public $fillable = [
      'description',
      'state',
      'created_by',
      'updated_by',
      'created_at',
      'updated_at',
      ];

    public function Caso(){
			return $this->belongsTo(Caso::class);
		}
}
