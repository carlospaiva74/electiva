<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Articulos;
use App\Models\Detalle_ingresos;

use App\Http\Requests\ArticulosRequest;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulos::all();
        $i=1;
        return view('articulos.index',compact('articulos','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorias::all();
        return view('articulos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticulosRequest $request)
    {
        $articulo = new Articulos();

        $articulo->id_categoria = $request->categoria;
        $articulo->codigo       = $request->codigo;
        $articulo->nombre       = $request->articulo;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock        = $request->stock;
        $articulo->descripcion  = $request->descripcion;
        $articulo->save(); 


        return redirect()->route('articulos.index')->with('mensaje','Artículo registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulos::find($id);
        $categorias = Categorias::all();

        if (is_null($articulo)) {
            abort(404);
        }else{
            session()->flashInput([
                'articulo'     => $articulo->nombre,
                'codigo'       => $articulo->codigo,
                'categoria'    => $articulo->id_categoria,
                'precio_venta' => $articulo->precio_venta,
                'stock'        => $articulo->stock,           
                'descripcion'  => $articulo->descripcion,                 
            ]);

            return view('articulos.edit',compact('id','categorias'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticulosRequest $request, $id)
    {

        $articulo = Articulos::find($id);

        if (is_null($articulo)) {
            abort(404);
        }

        $articulo->id_categoria = $request->categoria;
        $articulo->codigo       = $request->codigo;
        $articulo->nombre       = $request->articulo;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock        = $request->stock;
        $articulo->descripcion  = $request->descripcion;
        $articulo->save(); 


        return redirect()->route('articulos.index')->with('mensaje','Artículo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validate = Detalle_ingresos::where('id_articulo',$id)->count();

        $delete = Articulos::find($id);

        if ($validate==0 && is_null($delete)==false) {
            $delete->delete();
            return redirect()->route('articulos.index')->with('mensaje','Artículo eliminado con éxito');
        }else{
            return redirect()->route('articulos.index')->with('mensaje','No se puede eliminar el artículo: '.$delete->nombre. ' debido a que uno o más ingresos están relacionado con este artículo');
        }
    }
}
