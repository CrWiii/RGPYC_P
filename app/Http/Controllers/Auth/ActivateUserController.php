<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Mail\CreacionUsuarioMail;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Session;
use Mail;
use URL;
use Auth;
use DB;


class ActivateUserController extends Controller{

    protected $redirectTo = '/';
    
    public function __construct(){
        \Auth::logout();
        \Session::flush();
        $this->middleware('guest');
    }

    public function getLogo($email){
        $user = User::where('email',$email)->pluck('cia_id');
        return Response($user[0]);
    }

    public function generatePassword($email){
        try {
            $result = User::select('email','id')->where('email', '=' , $email)->where('state', false)->firstOrFail();
            return view('base.auth.generatePassword',compact('result'));
        } catch (ModelNotFoundException $ex) {
            return view('base.auth.expired');
        }
    }

    public function ActivateUser($id, Request $request){
        //$this->validate(request(),['password'  => 'required|min:6|confirmed']);
        try{
            $user = User::where('id', '=' , $id)->where('state', false)->firstOrFail();
            $user->update(['password' => bcrypt($request->password),'state' =>true]);
            if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
                return  redirect()->intended('ListaSiniestros');
            }
            //Auth::loginUsingId($id);
        }catch(ModelNotFoundException $ex){
            //echo "La contraseña debe tener como mínimo 6 caracteres";
        }
        /*try{
            $user = User::where('id', '=' , $id)->where('state', false)->firstOrFail();
            $user->update(['password' => bcrypt($request->password),'state' =>true]);
            if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
                Mail::send( 'base.auth.emails.ActivationConfirmMail', $user, function( $message ) use ($userdata){
                    $message->to(['jefedesistemas@acmetic.com.pe','cgjsl89@gmail.com',$user['email']])->subject('Confirmación de Activación de Usuario');
                });
                return  redirect()->intended('medikhome');
            }
        }catch(ModelNotFoundException $ex){
        }*/
    }

    public function reenviarActivacion($id){
        $usuario = User::find($id);  
        Mail::to(['sistemas@acmetic.com.pe','rflores@acmetic.com.pe','rhidalgo@acmetic.com.pe','csevilla@acmetic.com.pe'])->send(new CreacionUsuarioMail($usuario));
        return redirect('ListaUsuarios')->with('enviado con exito');
       }
}
