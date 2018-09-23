<?php

namespace Proyectox\Http\Controllers;

use Illuminate\Http\Request;

use Proyectox\Http\Requests;

use Proyectox\Posee;
use Illuminate\Support\Facades\Redirect;
use Proyectox\Http\Requests\PoseeFormRequest;
use DB;

class PoseeController extends Controller
{
       public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
    		$posee=DB::table('posee as p')
    		->join('vehiculo as v', 'p.id_vehiculo', '=', 'v.id_vehiculo')
    		->join('neumatico as n', 'p.id_neumatico', '=', 'n.id_neumatico')
    		->select('p.id_posee', 'v.marca as vehiculo', 'n.marca as neumatico')
    		->where('p.id_posee','LIKE','%'.$query.'%')
            ->orderBy('p.id_posee','desc')
            ->where('p.condicion','=','1')
            ->paginate(7);

    		return view('proyecto.posee.index',["posees"=>$posee,"searchText"=>$query]);
    	}
    }

    public function create(){
    	$vehiculos=DB::table('vehiculo')->where('condicion', '=', '1')->get();
    	$neumaticos=DB::table('neumatico')->where('condicion', '=', '1')->get();
    	return view("proyecto.posee.create",["vehiculos"=>$vehiculos] , ["neumaticos"=>$neumaticos]);
    }
    public function store(PoseeFormRequest $request){
    	$posee=new Posee;
    	$posee->id_vehiculo=$request->get('id_vehiculo');
    	$posee->id_neumatico=$request->get('id_neumatico');
        $posee->condicion='1';
    	$posee->save();
    	return Redirect::to('proyecto/posee');
    }
    public function show($id){
    	return view("proyecto.posee.show",["posee"=>Posee::findOrFail($id)]);

    }
    public function edit($id){

    	$posee=Posee::findOrFail($id);
    	$vehiculos=DB::table('vehiculo')->where('condicion', '=', '1')->get();
    	$neumaticos=DB::table('neumaticos')->where('condicion', '=', '1')->get();
    	return view("proyecto.posee.edit",["posee"=>$posee,"vehiculos"=>$vehiculos, "neumaticos"=>$neumaticos]);
    }
    public function update(PoseeFormRequest $request,$id){
    	$posee=Posee::findOrFail($id);
    	$posee->id_vehiculo=$request->get('id_vehiculo');
    	$posee->id_neumatico=$request->get('id_neumatico');
    	$posee->update();
    	return Redirect::to('proyecto/posee');

    }
    public function destroy($id){
    	$posee=Posee::findOrFail($id);
        $posee->condicion='0';
        $posee->update();
        return Redirect::to('proyecto/posee');

    }

}

