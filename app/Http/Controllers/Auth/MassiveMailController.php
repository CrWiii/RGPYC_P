<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use URL;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;
use App\Mail\MassiveMail;


class MassiveMailController extends Controller{
    
    // protected $redirectTo = '/medikhome';
    
    public function __construct(){
        $this->middleware('auth');
    }

    protected function sendMassive(){

        $userlistId = [1];

        $f = 0;
        foreach ($userlistId as $value) {
            $userSearch = User::find($value);
            $userdata = array(
                'id'    => $userSearch->id,
                'email' => $userSearch->email, 
                'firstname' => $userSearch->firstname, 
                'lastname' => $userSearch->lastname,
                'password' => bcrypt($userSearch->password)
                );
        $f++;
        // Mail::send( 'base.auth.emails.confirmMail', $userdata, function( $message ) use ($userdata){
            // $message->to(['jefedesistemas@acmetic.com.pe','cgjsl89@gmail.com','rflorez@acmetic.com.pe',]) //$userdata['email']
            // ->subject('Activación Usuario');
        // });
            // Mail::to('rflorez@acmetic.com.pe')->send(new MassiveMail($userdata));
            Mail::send( 'base.auth.emails.confirmMail', $userdata, function( $message ) use ($userdata){
            $message->to(['jefedesistemas@acmetic.com.pe','cgjsl89@gmail.com','rflorez@acmetic.com.pe',]) //$userdata['email']
            ->subject('Activación Usuario');
        });
            echo("Envio correcto de: $f </br>");
        }
    }
}