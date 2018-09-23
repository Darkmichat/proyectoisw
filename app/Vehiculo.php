<?php

namespace Proyectox;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table='vehiculo';

    protected $primaryKey='id_vehiculo';

    public $timestamps=false;

    protected $fillable =[
        'patente',
    	'marca',
        'tipo',
    	'modelo'
    ];

    protected $guarded =[
    ];
}
