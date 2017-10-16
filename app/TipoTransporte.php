<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTransporte extends Model
{
    protected $table = 'tipo_transporte';
    
    public $fillable = [
    	'description',
    	'state'
    ];
    
    public function Caso(){
        return $this->belongsTo(Caso::class);
    }

}
