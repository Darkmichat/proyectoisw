<?php

namespace Proyectox\Http\Controllers;

use Illuminate\Http\Request;

use Proyectox\Http\Requests;

use Proyectox\Registra;
use Illuminate\Support\Facades\Redirect;
use Proyectox\Http\Requests\RegistraFormRequest;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class RegistraController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
    		$registra=DB::table('registra as r')
    		->join('vehiculo as v', 'r.id_vehiculo', '=', 'v.id_vehiculo')
    		->join('neumatico as n', 'r.id_neumatico', '=', 'n.id_neumatico')
    		->select('r.id_registra','v.marca as vehiculo','n.id_neumatico as neumatico','r.presion', 'r.kilometraje', 'r.fecha_revision','n.kilometraje as vehiculoo' )
    		->where('r.id_registra','LIKE','%'.$query.'%')
            ->orderBy('r.id_registra','desc')
            ->where('r.condicion','=','1')
            ->paginate(7);

    		return view('proyecto.registra.index',["registras"=>$registra,"searchText"=>$query]);
    	}
    }

    public function create(){
    	$vehiculos=DB::table('vehiculo')->where('condicion', '=', '1')->get();
    	$neumaticos=DB::table('neumatico')->where('condicion', '=', '1')->get();
    	return view("proyecto.registra.create",["vehiculos"=>$vehiculos] , ["neumaticos"=>$neumaticos]);
    }
    public function store(RegistraFormRequest $request){
    	$registra=new Registra;
    	$registra->id_vehiculo=$request->get('id_vehiculo');
    	$registra->id_neumatico=$request->get('id_neumatico');
    	$registra->presion=$request->get('presion');
    	$registra->kilometraje=$request->get('kilometraje');
    	$mytime = Carbon::now('America/Santiago');
    	$registra->fecha_revision=$mytime->toDateTimeString();
        $registra->condicion='1';
    	$registra->save();
    	return Redirect::to('proyecto/registra');
    }
    public function show($id){
    	return view("proyecto.registra.show",["registra"=>Registra::findOrFail($id)]);

    }
   public function destroy($id){
    	$registra=Registra::findOrFail($id);
        $registra->condicion='0';
        $registra->update();
        return Redirect::to('proyecto/registra');

    }

}


