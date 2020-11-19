<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Personas;
use App\Models\Ingresos;
use App\Models\Roles;
use App\Http\Requests\UsersRequest;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $i=1;
        return view('users.index',compact('users','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();

        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        $user = new User();
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->id_rol = $request->rol;
        $user->save();

        $persona = new Personas();
        $persona->id_user        = $user->id;
        $persona->nombre         = $request->nombre;
        $persona->tipo_documento = $request->tipo_documento;
        $persona->num_documento  = $request->num_documento;
        $persona->direccion      = $request->direccion;
        $persona->telefono       = $request->telefono;
        $persona->email          = $user->email;
        $persona->save();

        return redirect()->route('usuarios.index')->with('mensaje','Usuario registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            abort(404);
        }else{

            $roles = Roles::all();

            session()->flashInput([
                'nombre' => $user->persona->nombre,
                'rol'    => $user->id_rol,
                'email'  => $user->email,   
                'tipo_documento' => $user->persona->tipo_documento,
                'num_documento'  => $user->persona->num_documento,
                'telefono'       => $user->persona->telefono,
                'direccion'      => $user->persona->direccion                 
            ]);

            return view('users.edit',compact('id','roles'));
        }

        

        return view('users.edit',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        $user = User::find($id);
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->id_rol = $request->rol;
        $user->save();

        $persona = Personas::where('id_user',$user->id)->first();
        $persona->id_user        = $user->id;
        $persona->nombre         = $request->nombre;
        $persona->tipo_documento = $request->tipo_documento;
        $persona->num_documento  = $request->num_documento;
        $persona->direccion      = $request->direccion;
        $persona->telefono       = $request->telefono;
        $persona->email          = $user->email;
        $persona->save();

        return redirect()->route('usuarios.index')->with('mensaje','Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if ($id == Auth::user()->id) {
            return redirect()->route('usuarios.index')->with('mensaje','No puedes eliminar tu propio usuario');
        }

        $validate = Ingresos::where('id_usuario',$id)->count();

        $delete = User::find($id);

        if ($validate==0 && is_null($delete)==false) {
            $delete->delete();

            return redirect()->route('usuarios.index')->with('mensaje','Usuario eliminado con éxito');

        }else{

            return redirect()->route('usuarios.index')->with('mensaje','No se puede eliminar el usuario: '.$delete->persona->nombre. ' debido a que uno o más artículos están relacionado con esta categoría');
        }
    }
}
