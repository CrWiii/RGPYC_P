<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
     protected $table = 'broker';
    

    public $fillable = [
       'description'
      ,'code'
      ,'tipo'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'

    ];

    public function Caso()
    {
      return $this->hasMany(Caso::class);
    }


}
