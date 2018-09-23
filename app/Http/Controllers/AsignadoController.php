<?php

namespace Proyectox\Http\Controllers;

use Illuminate\Http\Request;

use Proyectox\Http\Requests;

use Proyectox\Asignado;
use Illuminate\Support\Facades\Redirect;
use Proyectox\Http\Requests\AsignadoFormRequest;
use DB;
	
class AsignadoController extends Controller
{
       public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
    		$asignado=DB::table('asignado as a')
    		->join('conductor as c', 'a.rut', '=', 'c.rut')
    		->join('vehiculo as v', 'a.id_vehiculo', '=', 'v.id_vehiculo')
    		->select('a.id_asignado', 'c.nombre_conductor as conductor', 'v.marca as vehiculo')
    		->where('a.id_asignado','LIKE','%'.$query.'%')
            ->orderBy('id_asignado','desc')
            ->where('a.condicion','=','1')
            ->paginate(7);

    		return view('proyecto.asignado.index',["asignados"=>$asignado,"searchText"=>$query]);
    	}
    }

    public function create(){
    	$conductores=DB::table('conductor')->where('condicion', '=', '1')->get();
    	$vehiculos=DB::table('vehiculo')->where('condicion', '=', '1')->get();
    	return view("proyecto.asignado.create",["conductores"=>$conductores],["vehiculos"=>$vehiculos] );
    }
    public function store(AsignadoFormRequest $request){
    	$asignado=new Asignado;
    	$asignado->rut=$request->get('rut');
    	$asignado->id_vehiculo=$request->get('id_vehiculo');
        $asignado->condicion='1';
    	$asignado->save();
    	return Redirect::to('proyecto/asignado');
    }
    public function show($id){
    	return view("proyecto.asignado.show",["asignado"=>Asignado::findOrFail($id)]);

    }
    public function edit($id){

    	$asignado=Asignado::findOrFail($id);
    	$conductores=DB::table('conductores')->where('condicion', '=', '1')->get();
    	$vehiculos=DB::table('vehiculo')->where('condicion', '=', '1')->get();
    	return view("proyecto.asignado.edit",["asignado"=>$asignado, "conductores"=>$conductores, "vehiculos"=>$vehiculos]);
    }
    public function update(AsignadoFormRequest $request,$id){
    	$asignado=Asignado::findOrFail($id);
    	$asignado->rut=$request->get('rut');
    	$asignado->id_vehiculo=$request->get('id_vehiculo');
    	$asignado->update();
    	return Redirect::to('proyecto/asignado');

    }
    public function destroy($id){
    	$asignado=Asignado::findOrFail($id);
        $asignado->condicion='0';
        $asignado->update();
        return Redirect::to('proyecto/asignado');

    }

}
