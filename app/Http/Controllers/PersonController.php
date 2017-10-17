<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use Auth;
use Carbon\Carbon;

class PersonController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function getPersona(Request $request){
    	$term = $request->term;
    	$results = array();
    	$queries = Persona::where('nombres', 'like', '%'.$term.'%')->orWhere('apellido_paterno', 'like', '%'.$term.'%')->orWhere('apellido_materno', 'like', '%'.$term.'%')->get();
        foreach ($queries as $query){
        	$results[] = [
                'value' => $query->search,
                'search' => $query->search,
                'id'=>$query->id,
                'apellido_paterno'=>$query->apellido_paterno,
                'apellido_materno'=>$query->apellido_materno,
                'nombres'=>$query->nombres,
                'email'=>$query->email,
                'cargo'=>$query->cargo,
                'telefono'=>$query->telefono,
                'dni'=>$query->dni,
            ];
        }
        return Response()->json($results);
    }

    public function searchPers(Request $request){
        $person = Persona::where('dni',$request->dni)->firstOrFail();
        return Response()->json($person);
    }
    public function insertNewPerson(Request $request){
        $person = New Persona;
        $person->dni = $request->dni;
        $person->nombres = $request->nombres;
        $person->apellido_paterno = $request->apellido_paterno;
        $person->apellido_materno = $request->apellido_materno;
        $person->search = $request->nombres.' '.$request->apellido_paterno.' '.$request->apellido_materno ;
        $person->email = $request->email;
        $person->telefono = $request->telefono;
        $person->cargo = $request->cargo;
        $person->created_by = Auth::user()->id;
        $person->updated_by = Auth::user()->id;
        $person->state = 1;
        $person->save();

        $person->PersonaType()->attach([
                        $request->person_type => [
                        'state'=>1, 
                        'created_by'=>Auth::user()->id,
                        'updated_by'=>Auth::user()->id,
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()]]);

        return Response()->json($person);
    }

    public function updatePerson(Request $request){
        $person = Persona::findOrFail($request->id);
        $person->email = $request->email;
        $person->telefono = $request->telefono;
        $person->fecha_nacimiento = $request->fecha_nacimiento;
        $person->cargo = $request->cargo;
        $person->dni = $request->dni;
        $person->updated_by = Auth::user()->id;
        $person->update();
        return Response()->json($person);
    }


    public function index(Request $request){
        

        $query = Persona::where('state',1);

        $persons = $query->paginate(20);

        if($request->ajax()){
            
            if($request->startDate && $request->endDate && !empty($request->startDate) && !empty($request->endDate)){
                    $s = $request->startDate;
                    $e = $request->endDate;
                    $d = '1';
                    if($s == $e){
                        $e = date('m/d/Y', strtotime($e.' + '.$d.' days'));
                    }
                    $query = $query->whereBetween('notifier_date', array($s, $e) );
            }
            if($request->campo_tab =='cia_id'){
               $param =  $request->orderby;
               $CasosZ =  $query->with(array('cia' => function ($subQuery) use($param){
                                $subQuery->orderBy('nombre_comercial', $param);}
                    ))->paginate(20);
                $Casos = $query->orderby($request->campo_tab,  $request->orderby)->paginate(20);
            }
            else{
                $Casos = $query->orderby($request->campo_tab,  $request->orderby)->paginate(20);
            }

        }
        return view('personas.listarPersonas', compact('persons'));
    }

    public function create(){
        return view('personas.crearPersona');
    }
    
    public function destroy($id){
        $persons = Persona::find($id);
        $persons->delete();
        return redirect('ListaPersonas')->with('message','Persona Eliminada');
    }

    public function active($id){
        $persons = Persona::findOrFail($id);
        $persons->state = 1;
        $persons->update();
        return redirect('ListaPersonas');
    }

    public function desactive($id){
        $persons = Persona::findOrFail($id);
        $persons->state = 0;
        $persons->update();
        return redirect('ListaPersonas');
    }
    public function store(Request $request){
        
    }
}
