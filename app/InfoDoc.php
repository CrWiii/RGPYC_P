<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoDoc extends Model
{
    public function Documento(){
            return $this->belongsTo(Documento::class);
    }
    public function Informe(){
            return $this->belongsTo(Informe::class);
    }
    

}
