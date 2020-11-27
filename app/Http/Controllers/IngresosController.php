<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IngresosRequest;
use App\Models\Ingresos;
use App\Models\Detalle_ingresos;
use App\Models\User;
use App\Models\Articulos;
use Auth;

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingresos::orderby('id','desc')->get();
        $i=1;
        return view('ingresos.index',compact('ingresos','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = User::where('id_rol',2)->get();
        $articulos 	= Articulos::all();
        return view('ingresos.create',compact('proveedores','articulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngresosRequest $request)
    {

    	date_default_timezone_set('America/Caracas');

    	$total = 0;

    	foreach ($request->subtotal as $key) {
    		$total = $total + $key;
    	}

    	$ingreso = new Ingresos();
    	$ingreso->id_proveedor = $request->proveedor;
    	$ingreso->id_usuario = Auth::user()->id;
    	$ingreso->tipo_comprobante = $request->tipo;
    	$ingreso->serie_comprobante = $request->serie;
    	$ingreso->num_comprobante   = $request->numero;
    	$ingreso->impuesto = 18;
    	$ingreso->total = $total;
    	$ingreso->estado= 'E';
    	$ingreso->fecha_hora = date('o-m-d H:i:s');
    	$ingreso->save();

    	$i=0;

    	foreach ($request->id as $key) {
    		$detalle = new Detalle_ingresos();
    		$detalle->id_ingreso = $ingreso->id;
    		$detalle->id_articulo = $key;
    		$detalle->cantidad = $request->cantidad[$i];
    		$detalle->precio = $request->compra[$i];
    		$detalle->save();

    		$articulo = Articulos::find($key);
    		$articulo->stock = $articulo->stock + $request->cantidad[$i];
    		$articulo->save();
    		$i++;
    	}   	

        return redirect()->route('ingresos.index')->with('mensaje','Artículos ingresados con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingreso = Ingresos::find($id);
        return view('ingresos.detalles',compact('ingreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
