<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Mail\CreacionUsuarioMail;
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

class RegisterController extends Controller{
    use RegistersUsers;

    protected $redirectTo = '/ListaUsuarios';

    public function __construct(){
        $this->middleware('auth');
    }

    public function registrarme(){
        $tipo_usuarios = TipoUsuario::where('state',1)->get();
        $perfiles = Perfil::where('state',1)->get();
        $areas = Area::where('state',1)->get();
        $brokers = Broker::where('state',1)->get();
        $cias = Cia::where('state',1)->get();
        $roles = Rol::where('state',1)->get();
        return view('base.auth.registrarme', compact('areas','brokers','roles','cias','perfiles','tipo_usuarios'));
    }

    public function registrar(Request $request){
        $validator = Validator::make($request->all(), [
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'email' => 'required|email|unique:users',
            'tipo_usuario' => 'required|exists:Tipo_usuario,id',
            'profile_id' => 'required|exists:Profile,id',
            'roles'  => 'required',
            // 'dni' => 'min:8|max:8'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $persona = new Persona;
            $persona->nombres = $request->nombres;
            $persona->apellido_paterno = $request->apellido_paterno;
            $persona->apellido_materno = $request->apellido_materno;
            $persona->search = $request->nombres.' '.$request->apellido_paterno.' '.$request->apellido_materno;
            $persona->email = $request->email;
            $persona->dni = $request->dni;
            $persona->cargo = $request->cargo;
            $persona->telefono = $request->telefono;
            $persona->state = 1;
            $persona->created_by = Auth::user()->id;
            $persona->updated_by = Auth::user()->id;
            $persona->save();
            $usuario = new User;
            $usuario->email = $request->email;
            $usuario->tipo_usuario = $request->tipo_usuario;
            $usuario->profile_id = $request->profile_id;
            if($request->cia_id !== "0"){$usuario->cia_id = $request->cia_id;}
            if($request->broker_id !== "0"){$usuario->broker_id = $request->broker_id;}
            $usuario->state = 0;
            $usuario->persona_id = $persona->id;
            $usuario->created_by = Auth::user()->id;
            $usuario->updated_by = Auth::user()->id;
            $usuario->save();
            if($request->areas){
                foreach($request->areas as $area){
                    $usuario->Area()->attach([$area => [
                        'state'=>1, 
                        'created_by'=> Auth::user()->id,
                        'updated_by'=> Auth::user()->id,
                        'created_at'=> Carbon::now(),
                        'updated_at'=> Carbon::now()
                    ]]);
                }
            }
            if($request->roles){
                foreach ($request->roles as $rol) {
                    $usuario->Rol()->attach([$rol => [
                        'state'=>1,
                        'created_by'=> Auth::user()->id,
                        'updated_by'=> Auth::user()->id,
                        'created_at'=> Carbon::now(),
                        'updated_at'=> Carbon::now()
                    ]]);
                }
            }
            Mail::to($usuario->email)->bcc(['rflorez@acmetic.com.pe','rhidalgo@acmetic.com.pe','csevilla@acmetic.com.pe'])->send(new CreacionUsuarioMail($usuario));
            return redirect('ListaUsuarios');
        }
    }      
}

    


//     select * from caso 
// select * from clausula
// select * from cobertura
// select * from content
// select * from detalle_mercaderia
// select * from documento
// select * from documento_ramo
// select * from equipos
// select * from firma
// select * from images
// select * from info_content 
// select * from informe
// select * from informe_documento
// select * from informe_imagen
// select * from informes_pasados
// select * from tercer_afectado
// select * from tipopoliza_ramo
// select * from vitacora_espera
// select * from vitacora_gastos
// select * from vitacora_llamada



// DBCC CHECKIDENT (caso , RESEED, 0)
// DBCC CHECKIDENT (clausula, RESEED, 0)
// DBCC CHECKIDENT (cobertura, RESEED, 0)
// DBCC CHECKIDENT (content, RESEED, 0)
// DBCC CHECKIDENT (detalle_mercaderia, RESEED, 0)
// DBCC CHECKIDENT (documento, RESEED, 0)
// DBCC CHECKIDENT (documento_ramo, RESEED, 0)
// DBCC CHECKIDENT (equipos, RESEED, 0)
// DBCC CHECKIDENT (firma, RESEED, 0)
// DBCC CHECKIDENT (images, RESEED, 0)
// DBCC CHECKIDENT (info_content , RESEED, 0)
// DBCC CHECKIDENT (informe, RESEED, 0)
// DBCC CHECKIDENT (informe_documento, RESEED, 0)
// DBCC CHECKIDENT (informe_imagen, RESEED, 0)
// DBCC CHECKIDENT (informes_pasados, RESEED, 0)
// DBCC CHECKIDENT (tercer_afectado, RESEED, 0)
// DBCC CHECKIDENT (tipopoliza_ramo, RESEED, 0)
// DBCC CHECKIDENT (vitacora_espera, RESEED, 0)
// DBCC CHECKIDENT (vitacora_gastos, RESEED, 0)
// DBCC CHECKIDENT (vitacora_llamada, RESEED, 0)

// --delete caso 
// --delete vitacora_espera
// --delete informe
// --delete content
// --delete images
// --delete tipopoliza_ramo
        

// select notifier_id,id from caso where notifier_id= 61
// select notifier_id,id from caso where notifier_id in (47,48,49,50,51,54,56,58,93,100,1002,2004,2006,2008,2009,2024,2054,2075,2083,2088,2090,2091,2180)
// notifier_id in (49,51,54,58,2024,2083)
// select * from users
// select * from persona where id = 2247
// select notifier_id,id from caso where confirming_who_id in (47,48,49,50,51,54,56,58,93,100,1002,2004,2006,2008,2009,2024,2054,2075,2083,2088,2090,2091,2180)
// select * from users where persona_id IS NULL
// --update caso set notifier_id=61 where notifier_id in (61,74,90,2241
// --update persona set apellido_paterno='Acaro',apellido_materno='Barron',nombres='Diego Fernando',search='Diego Fernando Acaro Barron',cargo='Ejecutivo de Cuenta',telefono='3443871 /  987469357',updated_by=9,updated_at='08/04/2017  12:24:19' where id = 61
// --update persona set apellido_paterno='Hermoza',apellido_materno=NULL,nombres='Andrea',search='Andrea Hermoza',cargo='Ejecutiva de Siniestros Riesgos Generales',telefono='6109900 / 961751649',updated_by=5,updated_at='07/18/2017 10:43:31' where id = 47
// --update users set persona_id = 9 where id = 36
// --update persona set email='luceda@prevencionycontrol.com.pe', apellido_paterno='Uceda',apellido_materno='Giurfa',nombres='Luis Mariano',search='Luis Mariano Uceda Giurfa',cargo='Sub Gerente de Operaciones',telefono='6109900 / 961751649',created_by=1,created_at='2017-08-08 09:32:22.000',updated_by=1,updated_at='2017-08-08 09:32:22.000' where id = 9




//         select * from persona 
// select * from users
// select * from rol
// select * from area
// --delete from rol 
// --DBCC CHECKIDENT (rol, RESEED, 0)

// --select * from migrations
// --delete migrations where id in (3,8,6)
// --3 2017_04_26_060000_create_rol_table  1
// --6 2017_04_28_080000_create_profile_rol_table  1
// --8 2017_04_29_110000_create_permiso_table  1
// --DBCC CHECKIDENT (users, RESEED,0)
// --delete users
// select * from users where persona_id IS NULL
// select * from persona 
// --DBCC CHECKIDENT (persona, RESEED,2244)

// select * from rol
// select * from permiso
// --select * from persona  where id = 9
// select * from users

// where id in (2248,2249,2247)
// --update persona set email='luceda@prevencionycontrol.com.pe', apellido_paterno='Uceda',apellido_materno='Giurfa',nombres='Luis Mariano',search='Luis Mariano Uceda Giurfa',cargo='Sub Gerente de Operaciones',telefono='6109900 / 961751649',created_by=1,created_at='2017-08-08 09:32:22.000',updated_by=1,updated_at='2017-08-08 09:32:22.000' where id = 9

// select * from profile
// select * from rol

// select * from permiso 

// --drop table users
// --drop table user_area
// --drop table permiso

// --delete migrations where id in (7,51,57)
// --7 2017_04_29_090000_create_users_table    1
// --51    2017_07_21_155311_created_User_Area 1
// --57    2017_04_29_110000_create_permiso_table  4

// --2 2017_04_25_050000_create_profile_table  1
// --55    2017_04_26_060000_create_rol_table  4
// --delete migrations where id in (2,55)
// --delete migrations where id in (56)

// --drop table profile
// --drop table rol
// --drop table profile_rol


// $tipo_usuarios = ['WORKER','CIA','BROKER','PUBLIC'];
//         foreach ($tipo_usuarios as $tipo_usuario){
//             TipoUsuario::insert([
//                 'description'=>$tipo_usuario,
//                 'state'=>1,
//                 'created_by'=>1,
//                 'updated_by'=>1,
//                 'created_at'=> Carbon::now(),
//                 'updated_at'=> Carbon::now()
//             ]);
//         }


// $perfiles = ['ADMIN GLOBAL','ADMIN','USUARIO','PUBLICO'];
//         foreach ($perfiles as $perfil){
//             Perfil::insert([
//                 'description'=>$perfil,
//                 'state'=>1,
//                 'created_by'=>1,
//                 'updated_by'=>1,
//                 'created_at'=> Carbon::now(),
//                 'updated_at'=> Carbon::now()
//             ]);
//         }
        // $roles = [
        //     ['ver_lista_casos','Ver Lista de Casos']
        //     ,['ver_multimedia','Ver Multimedia']
        //     ,['ver_reportes','Ver Reportes']
        //     ,['ver_informes','Ver Informes']
        //     ,['ver_mantenimientos','Ver Mantenimientos']
        //     ,['crear_caso','Crear Caso']
        //     ,['exportar_lista','Exportar Lista']
        //     ,['ver_caso','Ver Caso']
        //     ,['buscar_caso','Buscar Caso']
        //     ,['actualizar_registro_basico','Actualizar Registro Basico']
        //     ,['actualizar_datos_comple','Actualizar Datos Complementarios']
        //     ,['actualizar_informe','Actualizar Informe']
        //     ,['actualizar_vitacora_segui','Actualizar  Vitacora Seguimiento']
        //     ,['generar_informe','Generar Informe']
        //     ,['vista_previa_informe','Vista Previa Informe']
        //     ,['generar_reporte','Generar Reporte']
        //     ,['anular_caso','Anular Caso']
        //     ,['crear_usuario','Crear Usuario']
        // ];


        // foreach ($roles as $role) {
        //     Rol::insert([
        //         'description'=>$role[0],
        //         'rol_name'=>$role[1],
        //         // 'level'=>,
        //         // 'group'=>,
        //         'state'=>1,
        //         'created_by'=>1,
        //         'updated_by'=>1,
        //         'created_at'=>Carbon::now(),
        //         'updated_at'=>Carbon::now()
        //     ]);
        // }
        // DBCC CHECKIDENT (persona, RESEED, 109)
        // $personas = [
        //     ['Vladimir','Lara','vlarae@rimac.com.pe'],
        //     ['Rosa','Bringas','rosa.bringas@rimac.com.pe'],
        //     ['Jorge','Reyes','jreyes@pacifico.com.pe'],
        //     ['Oscar','Cordero','ocordero@pacifico.com.pe'],
        //     ['Martin','Jackson','martinjackson@axisadjusters.com'],
        //     ['Guisella','Esparza','guisella_esparza@jltperu.com'],
        //     ['Diego','Meza','diego_meza@jltperu.com'],
        //     ['Luis','Yamashiro','Luis.Yamashiro@WillisTowersWatson.com'],
        //     ['Jorge','Paredes','jorge.paredes@WillisTowersWatson.com'],
        //     ['Cesar','Condo','ccondo@pacifico.com.pe'],
        //     ['Dante','Sebastiani','dsebastiani@prevencionycontrol.com.pe'],
        //     ['Oscar','Seminario','oseminario@rimac.com.pe'],
        //     ['Carlos','Prieto','cprieto@rimac.con.pe'],
        //     ['Patricia','Paredes','patricia_paredes@jltperu-re.com'],
        //     ['Ynés','Rischmoller','Ines.RischMoller@Chubb.com'],
        //     ['Monica','Valiente','monica.valiente@chubb.com'],
        //     ['Miguel','Ramírez','miramirez@rimac.com.pe'],
        //     ['Carolina','Gonzales','cgonzales@rimac.com.pe']
        // ];

        // foreach ($personas as $persona) {
        //     Persona::insert([
        //         'nombres'           => $persona[0],
        //         'apellido_paterno'  => $persona[1],
        //         'email'             => $persona[2],
        //         'search'            => $persona[0] .' '. $persona[1],
        //         'state'             => 1,
        //         'created_by'        => 1,
        //         'updated_by'        => 1,
        //         'created_at'        => Carbon::now(),
        //         'updated_at'        => Carbon::now()
        //     ]);
        // }

        // $usuarios = [
        //     ['csevilla@acmetic.com.pe','$2y$10$buLvvrijsU4pi2jexi6mXOHTL0Jp.qy6R6uJXswmHOBE2M.q0NlSe',1,10,1,'2017-08-01 18:41:18.000','2017-08-21 17:41:46.000'],
        //     ['rhidalgo@acmetic.com.pe','$2y$10$9.UgQzlg5Hw5TF8pkoMwq.t5jHN1CsdAC3wkpOvDjLJIacR3.OvIC',1,12,1,'2017-08-01 18:41:18.000','2017-08-01 18:41:18.000'],
        //     ['gderomana@prevencionycontrol.com.pe','$2y$10$ywTXBNGu2BqtimJyXC7h6O/5Jp4d9pZvbEbGnnzoRR4e1KTPCw5cG',1,8,1,'2017-08-01 18:41:19.000','2017-08-01 18:41:19.000'],
        //     ['rflorez@acmetic.com.pe','$2y$10$.xFsxbJvCJjOh4pQPXbbaOtibrqmcIB.Idy027z.X7Ht0E1jNIbHK',1,11,1,'2017-08-01 18:41:19.000','2017-08-01 18:41:19.000'],
        //     ['rvelasco@prevencionycontrol.com.pe','$2y$10$PHVpAR99e3N8oyJandtCuOyBLcks3lGLhMArsHeDvHOIi0Uj1L5m.',1,2,1,'2017-08-01 18:41:19.000','2017-08-01 18:41:19.000'],
        //     ['bllanos@prevencionycontrol.com.pe','$2y$10$gOsLgTGfd3WKvzbGFbbxjeQGuKFymo1ZgBbj0lVQDPyx.63zqGe7W',1,1,1,'2017-08-01 18:41:19.000','2017-08-01 18:41:19.000'],
        //     ['cvivar@prevencionycontrol.com.pe','$2y$10$zRMgpCWA6DOXq2H9YzcdpOggnxqJzAHndFzUuHm4TdUOPm5XLpx16',1,4,1,'2017-08-01 18:41:19.000','2017-08-01 18:41:19.000'],
        //     ['fsinarahua@prevencionycontrol.com.pe','$2y$10$AlmlgLGY6HtvLDw/J/tjG.E8wvyMDNVmfko9c1eScOIdUlBki1p1q',1,21,1,'2017-08-01 18:41:19.000','2017-08-01 18:41:19.000'],
        //     ['jsuarez@prevencionycontrol.com.pe','$2y$10$WiUDRcfKWxSGm66IimDlr.m0eeMGT.BExrsJppjikERDs6k5rWZJ6',1,22,1,'2017-08-01 18:41:20.000','2017-08-01 18:41:20.000'],
        //     ['alevaggi@prevencionycontrol.com.pe','$2y$10$FyAFqGfxQ.od.E2dAfRQo.Md.3gl45LyJ9jRLCFAJ5EpAvfkbmxbm',1,5,1,'2017-08-01 18:41:45.000','2017-08-01 18:41:45.000'],
        //     ['acrespo@prevencionycontrol.com.pe','$2y$10$R3zosDB.r7PXWNfWZSbqSuBEWD5NJpqEWQfKQ4uZmbRxbkSJVYaFG',1,3,1,'2017-08-01 18:41:46.000','2017-08-01 18:41:46.000'],
        //     ['migutierr@rimac.com.pe ','$2y$10$8hp3zhHK9OHRg4UvJX.GOe55QyG/BIKMIpeUdUYRwl2Th9KEFLfUW',4,119,4,'2017-08-01 18:41:46.000','2017-08-01 18:41:46.000'],
        //     ['vlarae@rimac.com.pe','$2y$10$hYM1HJ6OGd5ZF8m/jKx8Ce9A.NtLNv5CoFoRlDTvZgTS3gAKt0IJW',4,110,4,'2017-08-01 18:41:46.000','2017-08-01 18:41:46.000'],
        //     ['rosa.bringas@rimac.com.pe','$2y$10$JeG5Oxux7pQeZaksUdCf.eIFDLzzCEa1M0ujeNBUSrDVL2QAr4F2a',4,111,4,'2017-08-01 18:41:46.000','2017-08-01 18:41:46.000'],
        //     ['jreyes@pacifico.com.pe','$2y$10$FFzjGEvoXaCzs.BkLMUAoeIZfikAo63rwFoR9kuAKZlr0et22gc5u',4,112,4,'2017-08-01 18:41:46.000','2017-08-01 18:41:46.000'],
        //     ['ocordero@pacifico.com.pe','$2y$10$2rMgY1ij.Fhli5SR4O6YIua9PrzBVBHokjHOQkZEu6jeD3R98NIea',4,113,4,'2017-08-01 18:41:47.000','2017-08-01 18:41:47.000'],
        //     ['martinjackson@axisadjusters.com','$2y$10$hDsW82f5yCh7qyP0SFCfuuVWQR8tugOfWrLgRsNYVJAxLToDP5XJa',4,114,4,'2017-08-01 18:41:47.000','2017-08-01 18:41:47.000'],
        //     ['guisella_esparza@jltperu.com','$2y$10$FKw/iTj9xadl4oBfTGtL4eVnW4iYe02mJc2lyq3DUB/a0HifNutuC',4,115,4,'2017-08-01 18:41:47.000','2017-08-01 18:41:47.000'],
        //     ['diego_meza@jltperu.com','$2y$10$EGbTWKD210inJl2eBVzQN.GwmVvGRLDe/91H973ppfdQlPwv7I3Rm',4,116,4,'2017-08-01 18:41:47.000','2017-08-01 18:41:47.000'],
        //     ['Luis.Yamashiro@WillisTowersWatson.com','$2y$10$rCkuhhawIrEQ9T9nKRzRoeh19pd3UVb6/cxM0PXS1GOPk7SQkSR7m',4,117,4,'2017-08-01 18:41:47.000','2017-08-01 18:41:47.000'],
        //     ['jorge.paredes@WillisTowersWatson.com','$2y$10$5qGAKDm0XCxrBJexqTGKhu5fF1RBsVYPvShIYuyJ5B.e7VLqWURcW',4,118,4,'2017-08-01 18:41:47.000','2017-08-01 18:41:47.000'],
        //     ['ccondo@pacifico.com.pe','$2y$10$7RMCoFtqOkLDfyDBFPxPPeXxmWlMYh0olviBtBWIVQbw2I2fx3rPe',4,119,4,'2017-08-01 18:41:48.000','2017-08-01 18:41:48.000'],
        //     ['epastor@prevencionycontrol.com.pe','$2y$10$YzTztS9nNjbiDD1B6OtAjuHPxJxAMvpnwKIB4oApNisLa.yX6ZMcy',1,7,1,'2017-08-01 18:41:48.000','2017-08-01 18:41:48.000'],
        //     ['dsebastiani@prevencionycontrol.com.pe','$2y$10$lFM5nYY4lHHzRcvCNWNS1O4uWOYB1vsVdiEu3xyHxGk6kkC3c.SYi',1,120,1,'2017-08-01 18:41:48.000','2017-08-01 18:41:48.000'],
        //     ['ocolmenares@prevencionycontrol.com.pe','$2y$10$MzbK/9HuGyflDl42E3apL.k9mJQJIy6wz37wD/xumCcN4.WSyyDGC',4,20,4,'2017-08-01 18:41:48.000','2017-08-01 18:41:48.000'],
        //     ['oseminario@rimac.com.pe','$2y$10$TAjHLZYP/MwcYb7qbwVIGeAsrzauHTjNt1JlFRe4C.vi6smcbraLu',4,121,4,'2017-08-01 18:41:48.000','2017-08-01 18:41:48.000'],
        //     ['cprieto@rimac.con.pe','$2y$10$MfR2GS2CwzlY00xob9c1o.qx747vjKzqSEZliOd5o9JkbSFztTj7q',4,122,4,'2017-08-01 18:41:48.000','2017-08-01 18:41:48.000'],
        //     ['patricia_paredes@jltperu-re.com','$2y$10$.ZKp82vRJd5UcGOh3HV/EeoqJN8Vp0wJbRr1KPlHHWYmAMyvwnaV2',4,123,4,'2017-08-01 18:41:49.000','2017-08-01 18:41:49.000'],
        //     ['Ines.RischMoller@Chubb.com','$2y$10$viig5.0kg0Jafs.Zdp3ocOMpGevMPS9Lkk0p1feEicP3Z9P.5VyYC',4,124,4,'2017-08-01 18:41:49.000','2017-08-01 18:41:49.000'],
        //     ['monica.valiente@chubb.com','$2y$10$y0Q0DL6REvXPTGLNjLNXtu8TDT38DJwqxg.Ut2GeXkT.ScXoHVvY2',4,125,4,'2017-08-01 18:41:49.000','2017-08-01 18:41:49.000'],
        //     ['miramirez@rimac.com.pe','$2y$10$.KzvrOA1P8vIR6UEC2uWbedbjtlyQvAgpK5xGICCSD1Z27D9qJ0MW',4,126,4,'2017-08-01 18:41:49.000','2017-08-01 18:41:49.000'],
        //     ['cgonzales@rimac.com.pe','$2y$10$tdC8lZyVPyM9sqA6Zwzs4OCI2LdyM8jyRq6.awfSfITFP52fQyzA2',4,127,4,'2017-08-01 18:41:49.000','2017-08-01 18:41:49.000'],
        //     ['luis.montes@chubb.com','$2y$10$hDsW82f5yCh7qyP0SFCfuuVWQR8tugOfWrLgRsNYVJAxLToDP5XJa',4,2248,4,'2017-08-08 13:11:56.000','2017-08-08 13:11:56.000'],
        //     ['michael_fetch@jltgroup.com','$2y$10$5qGAKDm0XCxrBJexqTGKhu5fF1RBsVYPvShIYuyJ5B.e7VLqWURcW',4,2249,4,'2017-08-08 13:13:05.000','2017-08-08 13:13:05.000'],
        //     ['luis.montes@chubb.com','$2y$10$hDsW82f5yCh7qyP0SFCfuuVWQR8tugOfWrLgRsNYVJAxLToDP5XJa',4,2248,4,'2017-08-08 13:11:56.000','2017-08-08 13:11:56.000'],
        //     ['michael_fetch@jltgroup.com','$2y$10$5qGAKDm0XCxrBJexqTGKhu5fF1RBsVYPvShIYuyJ5B.e7VLqWURcW',4,2249,4,'2017-08-08 13:13:05.000','2017-08-08 13:13:05.000']
        //     ['talania@prevencionycontrol.com.pe','$2y$10$FFzjGEvoXaCzs.BkLMUAoeIZfikAo63rwFoR9kuAKZlr0et22gc5u',1,29,1,'2017-08-02 14:23:46.000','2017-08-02 14:23:46.000'],
        //     ['luceda@prevencionycontrol.com.pe','$2y$10$tM4EY.0Lw2JkR.Ixj1VFLOWIsbe7dxpqc3qJJh/kwpSaxoudBui3a',1,9,1,'2017-08-08 09:32:22.000','2017-08-08 09:42:37.000'],
        
        // ];

        // foreach ($usuarios as $usuario) {
        //     User::insert([
        //         'email'         =>$usuario[0],
        //         'password'      =>$usuario[1],
        //         'profile_id'    =>$usuario[2],
        //         'persona_id'    =>$usuario[3],
        //         'tipo_usuario'  =>$usuario[4],
        //         'created_at'    =>$usuario[5],
        //         'updated_at'    =>$usuario[6],
        //         'created_by'    =>1,
        //         'updated_by'    =>1
        //     ]);
        // }

// $permisos = [[1,1],[1,2],[1,3],[1,4],[1,5],[1,6],[1,7],[1,8],[1,9],[1,10],[1,11],[1,12],[1,13],[1,14],[1,15],[1,16],[1,17],[1,18],[2,1],[2,2],[2,3],[2,4],[2,5],[2,6],[2,7],[2,8],[2,9],[2,10],[2,11],[2,12],[2,13],[2,14],[2,15],[2,16],[2,17],[2,18],[3,1],[3,2],[3,3],[3,4],[3,5],[3,6],[3,7],[3,8],[3,9],[3,10],[3,11],[3,12],[3,13],[3,14],[3,15],[3,16],[3,17],[3,18],[4,1],[4,2],[4,3],[4,4],[4,5],[4,6],[4,7],[4,8],[4,9],[4,10],[4,11],[4,12],[4,13],[4,14],[4,15],[4,16],[4,17],[4,18],[5,1],[5,3],[5,4],[5,6],[5,7],[5,8],[5,9],[5,10],[5,15],[5,16],[5,17],[6,1],[6,3],[6,4],[6,6],[6,7],[6,8],[6,9],[6,10],[6,11],[6,12],[6,13],[6,15],[6,16],[6,17],[7,1],[7,2],[7,3],[7,4],[7,5],[7,6],[7,7],[7,8],[7,9],[7,10],[7,11],[7,12],[7,13],[7,14],[7,15],[7,16],[7,17],[7,18],[10,1],[10,3],[10,4],[10,5],[10,6],[10,7],[10,8],[10,9],[10,10],[10,11],[10,12],[10,13],[10,14],[10,15],[10,16],[10,17],[10,18],[11,1],[11,3],[11,4],[11,5],[11,6],[11,7],[11,8],[11,9],[11,10],[11,11],[11,12],[11,13],[11,14],[11,15],[11,16],[11,17],[11,18],[12,2],[13,2],[14,2],[15,2],[16,2],[17,2],[18,2],[19,2],[20,2],[21,2],[22,2],[26,2],[28,2],[29,2],[30,2],[33,2],[34,2],[8,1],[8,3],[8,4],[8,7],[8,8],[8,9],[8,10],[8,11],[8,12],[8,13],[8,15],[8,16],[9,1],[9,3],[9,4],[9,7],[9,8],[9,9],[9,10],[9,11],[9,12],[9,13],[9,15],[9,16],[23,1],[23,3],[23,4],[23,7],[23,8],[23,9],[23,10],[23,11],[23,12],[23,13],[23,15],[23,16],[24,1],[24,3],[24,4],[24,7],[24,8],[24,9],[24,10],[24,11],[24,12],[24,13],[24,15],[24,16],[35,1],[35,3],[35,4],[35,7],[35,8],[35,9],[35,10],[35,11],[35,12],[35,13],[35,15],[35,16],[36,1],[36,3],[36,4],[36,7],[36,8],[36,9],[36,10],[36,11],[36,12],[36,13],[36,15],[36,16]];
//         foreach ($permisos as $permiso) {
//             DB::table('permiso')->insert([
//                 'user_id'   => $permiso[0],
//                 'rol_id'    => $permiso[1],
//                 'state'     =>1,
//                 'created_by'=>1,
//                 'updated_by'=>1,
//                 'created_at'=>Carbon::now(),
//                 'updated_at'=>Carbon::now()
//             ]);
//         }