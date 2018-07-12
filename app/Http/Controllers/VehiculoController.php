<?php

namespace Proyectox\Http\Controllers;

use Illuminate\Http\Request;

use Proyectox\Http\Requests;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Proyectox\Http\Requests\VehiculoFormRequest;
use Proyectox\Vehiculo;
use DB;


class VehiculoController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){

    	if ($request){
    		$query=trim($request->get('searchText'));
    		$vehiculos=DB::table('vehiculo as v')
    		-> join('conductor as c','v.rut','=','c.rut')
    		-> select ('v.patente','v.marca','v.tipo','v.modelo','c.nombre_conductor as conductor','v.imagen','v.estado')
    		->where('v.marca','LIKE','%'.$query.'%')
            ->orderBy('v.marca','desc')
            ->paginate(7);

    		return view('proyecto.vehiculo.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
    	}
    }

    public function create(){

    	$conductores=DB::table('conductor')->where('condicion','=','1')->get();
    	return view("proyecto.vehiculo.create",["conductores"=>$conductores]);
    }
    public function store(VehiculoFormRequest $request){
    	$vehiculo=new Vehiculo;
    	$vehiculo->patente=$request->get('petente');
    	$vehiculo->marca=$request->get('marca');
    	$vehiculo->tipo=$request->get('tipo');
    	$vehiculo->modelo=$request->get('modelo');
        $vehiculo->rut=$request->get('rut');
        $vehiculo->estado='Activo';

        if(Input::hasfile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/vehiculos/',$file->getClientOriginalName());
        	$vehiculo->imagen=$file->getClientOriginalName();
        }

    	$vehiculo->save();
    	return Redirect::to('proyecto/vehiculo');
    }
    public function show($id){
    	return view("proyecto.vehiculo.show",["vechiculo"=>Vehiculo::findOrFail($id)]);

    }
    public function edit($id){
    	$vehiculo=Vehiculo::findOrFail($id);
    	$conductores=DB::table('conductores')->where('condicion','=','1')->get();
    	return view("proyecto.vehiculo.edit",["vechiculo"=>$vehiculo,"conductores"=>$conductores]);
    }
    public function update(VehiculoFormRequest $request,$id){
    	$vehiculo=Vehiculo::findOrFail($id);
    	$vehiculo->patente=$request->get('petente');
    	$vehiculo->marca=$request->get('marca');
    	$vehiculo->tipo=$request->get('tipo');
    	$vehiculo->modelo=$request->get('modelo');
        $vehiculo->rut=$request->get('rut');

        if(Input::hasfile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/vehiculos/',$file->getClientOriginalName());
        	$vehiculo->imagen=$file->getClientOriginalName();
        }

    	$vehiculo->update();
    	return Redirect::to('proyecto/vehiculo');

    }
    public function destroy($id){
    	$vehiculo=Vehiculo::findOrFail($id);
        $vehiculo->estado='Inactivo';
        $vehiculo->update();
        return Redirect::to('proyecto/vehiculo');

    }
}
