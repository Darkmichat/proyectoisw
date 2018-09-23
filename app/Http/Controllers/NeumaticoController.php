<?php

namespace Proyectox\Http\Controllers;

use Illuminate\Http\Request;

use Proyectox\Http\Requests;
use Proyectox\Neumatico;
use Illuminate\Support\Facades\Redirect;
use Proyectox\Http\Requests\NeumaticoFormRequest;
use DB;

class NeumaticoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
    		$neumaticos=DB::table('neumatico')->where('id_neumatico','LIKE','%'.$query.'%')
            ->orderBy('id_neumatico','desc')
            ->where('condicion','=','1')
            ->paginate(7);



    		return view('proyecto.neumatico.index',["neumaticos"=>$neumaticos,"searchText"=>$query]);
    	}
    }

    public function create(){
    	return view("proyecto.neumatico.create");
    }
    public function store(NeumaticoFormRequest $request){
    	$neumatico=new neumatico;
    	$neumatico->id_neumatico=$request->get('id_neumatico');
    	$neumatico->marca=$request->get('marca');
    	$neumatico->modelo=$request->get('modelo');
    	$neumatico->aro=$request->get('aro');
    	$neumatico->presion=$request->get('presion');
    	$neumatico->kilometraje=$request->get('kilometraje');
        $neumatico->condicion='1';
    	$neumatico->save();
    	return Redirect::to('proyecto/neumatico');
    }
    public function show($id){
    	return view("proyecto.neumatico.show",["neumatico"=>Neumatico::findOrFail($id)]);

    }
    public function edit($id){
    	return view("proyecto.neumatico.edit",["neumatico"=>Neumatico::findOrFail($id)]);
    }
    public function update(NeumaticoFormRequest $request,$id){
    	$neumatico=Neumatico::findOrFail($id);
    	$neumatico->id_neumatico=$request->get('id_neumatico');
    	$neumatico->marca=$request->get('marca');
    	$neumatico->modelo=$request->get('modelo');
    	$neumatico->aro=$request->get('aro');
    	$neumatico->presion=$request->get('presion');
    	$neumatico->kilometraje=$request->get('kilometraje');
    	$neumatico->update();
    	return Redirect::to('proyecto/neumatico');

    }
    public function destroy($id){
    	$neumatico=Neumatico::findOrFail($id);
        $neumatico->condicion='0';
        $neumatico->update();
        return Redirect::to('proyecto/neumatico');

    }

}
