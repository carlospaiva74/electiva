<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{	
	protected $table='articulos_54';
    use HasFactory;

    public function categoria(){
    	 return $this->belongsTo('App\Models\Categorias','id_categoria');
    }
}
