<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_ingresos extends Model
{
	protected $table='detalle_ingresos_54';
    use HasFactory;

    public function articulo(){
    	return $this->belongsTo('App\Models\Articulos','id_articulo');
    }
}
