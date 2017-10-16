<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model{
     protected $table = 'persona';

    public $fillable = [

       'apellido_paterno'
      ,'apellido_materno'
      ,'dni'
      ,'nombres'
      ,'search'
      ,'email'
      ,'cargo'
      ,'telefono'
      ,'fecha_nacimiento'
      ,'state'
      ,'created_by'
      ,'updated_by'
      ,'created_at'
      ,'updated_at'
      ];
      
    public function Caso(){
      return $this->hasMany(Caso::class);
    }

    public function Equipo(){
            return $this->hasMany(Equipo::class);
    }

    public function Registrador(){
      return $this->hasOne(Registrador::class);
    }
    public function UltimoModificador(){
      return $this->hasOne(UltimoModificador::class);
    }

    public function User(){
      return $this->hasOne(User::class);
    }

    public function Area(){
      return $this->belongsToMany(Area::class, 'responsable_area', 'persona_id','area_id');
    }
    public function PersonaType(){
      return $this->belongsToMany(PersonaType::class, 'persona_ptype','persona_id','persona_type_id');
    }

}
