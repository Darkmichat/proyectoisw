<?php

namespace Proyectox;

use Illuminate\Database\Eloquent\Model;

class Registra extends Model
{
    protected $table='registra';

    protected $primaryKey='id_registra';

    public $timestamps=false;

    protected $fillable =[
        'id_vehiculo',
        'id_neumatico',
        'presion',
        'kilometraje',
        'fecha_revision'
    ];

    protected $guarded =[
    	
    ];
}
