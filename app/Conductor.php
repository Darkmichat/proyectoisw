<?php

namespace Proyectox;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table='conductor';

    protected $primaryKey='rut';

    public $timestamps=false;

    protected $fillable =[
        'rut',
    	'nombre_conductor',
    	'email_conductor',
    	'telefono',
        'condicion'
    ];

    protected $guarded =[
    ];
}
