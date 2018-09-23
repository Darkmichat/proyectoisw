<?php

namespace Proyectox\Http\Controllers;

use Illuminate\Http\Request;

use Proyectox\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Proyectox\Http\Requests\VehiculoFormRequest;
use Proyectox\Vehiculo;
use DB;


class VehiculoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){

    	if ($request){
    		$query=trim($request->get('searchText'));
    		$vehiculos=DB::table('vehiculo')->where('marca','LIKE','%'.$query.'%')
            ->orderBy('marca','desc')
            ->where('condicion','=','1')
            ->paginate(7);

    		return view('proyecto.vehiculo.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
    	}
    }

    public function create(){

    	return view("proyecto.vehiculo.create");
    }
    public function store(VehiculoFormRequest $request){
    	$vehiculo=new Vehiculo;
    	$vehiculo->patente=$request->get('patente');
    	$vehiculo->marca=$request->get('marca');
    	$vehiculo->tipo=$request->get('tipo');
    	$vehiculo->modelo=$request->get('modelo');
        $vehiculo->condicion='1';
        $vehiculo->save();
    	return Redirect::to('proyecto/vehiculo');
    }
    public function show($id){
    	return view("proyecto.vehiculo.show",["vehiculo"=>Vehiculo::findOrFail($id)]);

    }
    public function edit($id){
    	return view("proyecto.vehiculo.edit",["vehiculo"=>Vehiculo::findOrFail($id)]);
    }
    public function update(VehiculoFormRequest $request,$id){
    	$vehiculo=Vehiculo::findOrFail($id);
    	$vehiculo->marca=$request->get('marca');
    	$vehiculo->tipo=$request->get('tipo');
    	$vehiculo->modelo=$request->get('modelo');
    	$vehiculo->update();
    	return Redirect::to('proyecto/vehiculo');

    }
    public function destroy($id){
    	$vehiculo=Vehiculo::findOrFail($id);
        $vehiculo->condicion='0';
        $vehiculo->update();
        return Redirect::to('proyecto/vehiculo');

    }
}
