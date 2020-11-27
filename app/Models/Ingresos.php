<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
	protected $table='ingresos_54';
    use HasFactory;

    public function detalles(){
    	return $this->hasMany('App\Models\Detalle_ingresos','id_ingreso','id');
    }

    public function proveedor(){
    	return $this->belongsTo('App\Models\User','id_proveedor');
    }
}
