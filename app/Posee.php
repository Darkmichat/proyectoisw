<?php

namespace Proyectox;

use Illuminate\Database\Eloquent\Model;

class Posee extends Model
{
    protected $table='posee';

    protected $primaryKey='id_posee';

    public $timestamps=false;

    protected $fillable =[
        'id_vehiculo',
    	'id_neumatico',
    ];

    protected $guarded =[
    	
    ];
}
