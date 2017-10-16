<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password','persona_id','state','profile_id','persona_id','tipo_usuario','cia_id','broker_id'];
    protected $hidden = ['password', 'remember_token'];

    public function Persona(){
        return $this->belongsTo(Persona::class);
    }

    public function Area(){
		return $this->belongsToMany(Area::class,'user_area','user_id','area_id');
	}

    public function Rol(){
        return $this->belongsToMany(Rol::class,'permiso','user_id','rol_id');
    }

	public function isOnline(){
        return Cache::has('user-online-'.$this->id);
    }

    public function hasRol($name){
        foreach ($this->Rol as $r) {
            if($r->description == $name) return true;
        }
        return false;
    }

    // if ($user->hasRole('{role_name}')) return 'you are the owner';
    // return 'you are not

    public function assignRole($role){
        return $this->Roles()->attach($role);
    }
    //$user->assignRole(1);

    public function removeRole($role){
        return $this->roles()->detach($role );
    }

    // $user = User::first();
    // $role = Role::whereName('administrator')->first();
    // $user->assignRole($role);
    // return $user->roles;
}