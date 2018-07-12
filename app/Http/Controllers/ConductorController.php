<?php

namespace Proyectox\Http\Controllers;

use Illuminate\Http\Request;
    
use Proyectox\Http\Requests;
use Proyectox\Conductor;
use Illuminate\Support\Facades\Redirect;
use Proyectox\Http\Requests\ConductorFormRequest;
use DB;

class ConductorController extends Controller
{
     public function __construct(){

    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
    		$conductores=DB::table('conductor')->where('nombre_conductor','LIKE','%'.$query.'%')
            ->orderBy('rut','desc')
            ->where('condicion','=','1')
            ->paginate(7);



    		return view('proyecto.conductor.index',["conductores"=>$conductores,"searchText"=>$query]);
    	}
    }

    public function create(){
    	return view("proyecto.conductor.create");
    }
    public function store(ConductorFormRequest $request){
    	$conductor=new Conductor;
    	$conductor->rut=$request->get('rut');
    	$conductor->nombre_conductor=$request->get('nombre_conductor');
    	$conductor->email_conductor=$request->get('email_conductor');
    	$conductor->telefono=$request->get('telefono');
        $conductor->condicion='1';
    	$conductor->save();
    	return Redirect::to('proyecto/conductor');
    }
    public function show($id){
    	return view("proyecto.conductor.show",["conductor"=>Conductor::findOrFail($id)]);

    }
    public function edit($id){
    	return view("proyecto.conductor.edit",["conductor"=>Conductor::findOrFail($id)]);
    }
    public function update(ConductorFormRequest $request,$id){
    	$conductor=Conductor::findOrFail($id);
    	$conductor->rut=$request->get('rut');
    	$conductor->nombre_conductor=$request->get('nombre_conductor');
    	$conductor->email_conductor=$request->get('email_conductor');
    	$conductor->telefono=$request->get('telefono');
    	$conductor->update();
    	return Redirect::to('proyecto/conductor');

    }
    public function destroy($id){
    	$conductor=Conductor::findOrFail($id);
        $conductor->condicion='0';
        $conductor->update();
        return Redirect::to('proyecto/conductor');

    }

}
