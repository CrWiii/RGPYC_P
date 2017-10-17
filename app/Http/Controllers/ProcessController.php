<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Persona;
use Carbon\Carbon;
use Auth;
use App\Caso;
use Mail;
use App\Mail\AlertaInformeBasicoMail;

class ProcessController extends Controller{
    public function processInformeBasico($ConFiltro){
        // $casos = Caso::getCasosInspFinSinIB($ConFiltro);
        // foreach($casos as $caso){
        //     Mail::to('csevilla@acmetic.com.pe')->send(new AlertaInformeBasicoMail($caso));
        //     return view('emails.alertaInformeBasico',compact('caso'));
        //     dd($caso);
        // }
        $ConFiltro = true; 
        $casos = Caso::getCasosInspFinSinIB($ConFiltro);
        foreach($casos as $caso){
            $RGTR = ['bllanos@prevencionycontrol.com.pe','cvivar@prevencionycontrol.com.pe','alevaggi@prevencionycontrol.com.pe'];
            $RC = ['rvelasco@prevencionycontrol.com.pe','acrespo@prevencionycontrol.com.pe'];
            $responsable = ['csevilla@acmetic.com.pe'];
            switch ($caso->area_id){
                case 1:
                    $responsable = ['csevilla@acmetic.com.pe'];
                    $CC = ['rflorez@acmetic.com.pe','rhidalgo@acmetic.com.pe'];
                    break;
                case 2;
                    $responsable = ['rflorez@acmetic.com.pe'];
                    $CC = ['csevilla@acmetic.com.pe','rhidalgo@acmetic.com.pe'];
                    break;
                case 3:
                    $responsable = ['rhidalgo@acmetic.com.pe'];
                    $CC = ['csevilla@acmetic.com.pe','rflorez@acmetic.com.pe'];
                    break;
            }
            Mail::to($responsable)->send(new AlertaInformeBasicoMail($caso));
            // ->cc($CC)
        }
    }
}
