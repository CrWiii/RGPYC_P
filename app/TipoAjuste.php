<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAjuste extends Model
{
    protected $table = 'tipo_ajuste';

    public $fillable = [
        'description',
        'state',
        'created_by',
        'updated_by',
    ];


}
