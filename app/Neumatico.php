<?php

namespace Proyectox;

use Illuminate\Database\Eloquent\Model;

class Neumatico extends Model
{
    protected $table='neumatico';

    protected $primaryKey='id_neumatico';

    public $timestamps=false;

    protected $fillable =[
        'marca',
    	'modelo',
    	'aro',
    	'presion',
        'kilometraje'
    ];

    protected $guarded =[
    ];
}

