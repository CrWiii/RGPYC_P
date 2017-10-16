<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class PersonaType extends Model{
	protected $table = 'persona_type';

  // public function Persona(){
  //   return $this->belongsTo(Persona::class);
  // }
	public function Persona(){
      return $this->belongsToMany(PersonaType::class, 'persona_ptype','persona_type_id','persona_id');
    }
    
}