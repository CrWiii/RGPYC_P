<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clausula extends Model
{
    protected $table = 'clausula';
    

    public $fillable = [
       'description'
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
