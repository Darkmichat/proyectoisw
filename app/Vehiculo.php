<?php

namespace Proyectox;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table='vehiculo';

    protected $primaryKey='patente';

    public $timestamps=false;

    protected $fillable =[
        'patente',
        'rut',
    	'marca',
        'tipo',
    	'modelo',
    	'imagen',
        'estado'
    ];

    protected $guarded =[
    ];
}
