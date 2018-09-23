<?php

namespace Proyectox;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table='conductor';

    protected $primaryKey='rut';
    protected $casts = ["rut"=>"string"];
    public $timestamps=false;

    protected $fillable =[
        'rut',
    	'nombre_conductor',
    	'email_conductor',
    	'telefono',
    ];

    protected $guarded =[
    ];
}
