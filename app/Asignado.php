<?php

namespace Proyectox;

use Illuminate\Database\Eloquent\Model;

class Asignado extends Model
{
    protected $table='asignado';

    protected $primaryKey='id_asignado';

    public $timestamps=false;

    protected $fillable =[
        'rut',
    	'id_vehiculo',
    ];

    protected $guarded =[
    	
    ];
}