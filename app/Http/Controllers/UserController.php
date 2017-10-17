<?php

namespace App\Http\Controllers;


use App\Mail\CreacionUsuarioMail;
use App\Mail\AprobarUsuarioMail;
use Illuminate\Http\Request;
use App\TipoUsuario;
use Carbon\Carbon;
use App\Persona;
use App\Broker;
use App\Perfil;
use App\Area;
use App\User;
use App\Rol;
use App\Cia;
use Mail;
use Auth;
use DB;


class UserController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        if(Auth::user()->id == 1 || Auth::user()->id == 4 || Auth::user()->id == 2){
        $users = User::all();
            return view('usuarios.listarUsuario', compact('users'));
        }else{
            return redirect('ListaSiniestros');
        }

    }

    public function create(){
        return view('usuarios.crearUsuario');
    }

    public function storeUser(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
        ]);

        $user = new User;
        $user->name = strtoupper($request->name);
        $user->email = $request->email;
        $user->apellido_paterno = strtoupper($request->apellido_paterno);
        $user->apellido_materno = strtoupper($request->apellido_materno);
        $user->password = bcrypt("1qaz2wsx");

        $user->created_by = Auth::user()->id;
        $user->updated_by = Auth::user()->id;
        $user->profile_id = 10;
        
        $user->state = 1;
        $user->save();

        return redirect('ListaUsuarios')->with('message','Usuario Creado');
    }

    public function show($id){

    }

    public function edit($id){
        $user = User::findOrFail($id);
        $tipo_usuarios = TipoUsuario::where('state',1)->get();
        $perfiles = Perfil::where('state',1)->get();
        $areas = Area::where('state',1)->get();
        $brokers = Broker::where('state',1)->get();
        $cias = Cia::where('state',1)->get();
        $roles = Rol::where('state',1)->get();
        $permisos = $user->Rol()->allRelatedIds()->toArray();
        $areas_asignadas = $user->Area()->allRelatedIds()->toArray();
        return view('usuarios.editarUsuario', compact('user','areas','brokers','roles','cias','perfiles','tipo_usuarios','permisos','areas_asignadas'));
    }

    public function updateUsuario(Request $request){
        $this->validate($request, [
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'tipo_usuario' => 'required|exists:Tipo_usuario,id',
            'profile_id' => 'required|exists:Profile,id',
            'roles'  => 'required',
            'dni' => 'max:8'
        ]);

        $persona = Persona::findOrFail($request->persona_id);
        $persona->nombres = $request->nombres;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->search = $request->nombres.' '.$request->apellido_paterno.' '.$request->apellido_materno;
        $persona->dni = $request->dni;
        $persona->cargo = $request->cargo;
        $persona->telefono = $request->telefono;
        $persona->state = 1;
        $persona->created_by = Auth::user()->id;
        $persona->updated_by = Auth::user()->id;
        $persona->update();

        $usuario = User::findOrFail($request->user_id);
        $usuario->tipo_usuario = $request->tipo_usuario;
        $usuario->profile_id = $request->profile_id;
        if($request->cia_id !== "0"){$usuario->cia_id = $request->cia_id;}
        if($request->broker_id !== "0"){$usuario->broker_id = $request->broker_id;}
        $usuario->state = 1;
        $usuario->persona_id = $persona->id;
        $usuario->created_by = Auth::user()->id;
        $usuario->updated_by = Auth::user()->id;
        $usuario->update();

        $areas_selected = $request->areas;
        $forDelete = array();
        if($areas_selected){
            foreach ($areas_selected as $area) {
                if(!in_array($area, $forDelete)){
                    $forDelete[] = $area;
                }
                if(!$usuario->Area->contains($area)){
                    $usuario->Area()->attach([$area => [
                        'state'=>1, 
                        'created_by'=> Auth::user()->id,
                        'updated_by'=> Auth::user()->id,
                        'created_at'=> Carbon::now(),
                        'updated_at'=> Carbon::now()
                    ]]);
                }
            }
            $usuario->Area()->sync($forDelete);
        }else{
            $usuario->Area()->detach();
        }

        $roles_selected = $request->roles;
        $forDelete = array();
        if($roles_selected){
            foreach ($roles_selected as $rol) {
                if(!in_array($rol, $forDelete)){
                    $forDelete[] = $rol;
                }
                if(!$usuario->Rol->contains($rol)){
                    $usuario->Rol()->attach([$rol => [
                        'state'=>1, 
                        'created_by'=> Auth::user()->id,
                        'updated_by'=> Auth::user()->id,
                        'created_at'=> Carbon::now(),
                        'updated_at'=> Carbon::now()
                    ]]);
                }
            }
            $usuario->Rol()->sync($forDelete);
        }else{
            $usuario->Rol()->detach();
        }


        return redirect('ListaUsuarios')->with('message','Usuario Modificado');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('ListaUsuarios')->with('message','Usuario Eliminado');
    }

    public function active($id){
        $user = User::findOrFail($id);
        $user->state = 1;
        $user->update();
        return redirect('ListaUsuarios');
    }

    public function desactive($id){
        $user = User::findOrFail($id);
        $user->state = 0;
        $user->update();
        return redirect('ListaUsuarios');
    }

    public function AprobarUsuario($id){
        $usuario = User::findOrFail($id);
        $usuario->profile_id = 1;
        $usuario->update();
        // Mail::to($usuario->email)->send(new CreacionUsuarioMail($usuario));
        Mail::to(['csevilla@acmetic.com.pe'])->send(new AprobarUsuarioMail($usuario)); //,'rflorez@acmetic.com.pe'
        return redirect('ListaUsuarios');
    }

    public function LoggedUser(){
        // $EmailUserLogIn = Auth::user()->email;
        // if($EmailUserLogIn=='csevilla@acmetic.com.pe' || $EmailUserLogIn=='rflorez@acmetic.com.pe' || $EmailUserLogIn=='rhidalgo@acmetic.com.pe'){
            $Users = User::all();
            return view('base.auth.LogInUserList',compact('Users'));
        // }
    }
}