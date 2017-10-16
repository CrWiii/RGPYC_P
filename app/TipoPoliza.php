<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPoliza extends Model
{
    protected $table = 'tipo_poliza';

    public $fillable = [
        'description',
        'state',
        'created_by',
        'updated_by',
        'updated_at',
    ];

     public function Caso(){
        return $this->belongsTo(Caso::class);
    }


}
