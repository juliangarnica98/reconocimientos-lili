<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getListUsuarios(Request $request){


        if(!$request->ajax()) return redirect('/');
        $nombre = $request->sNombre;
        $correo = $request->sCorreo;
        $estado = $request->sEstado;

        $nombre = ($nombre == null) ? ($nombre=''):$nombre;
        $correo = ($correo == null) ? ($correo=''):$correo;
        $estado = ($estado == null) ? ($estado=''):$estado;

        $users = user::name($nombre)->state($estado)->email($correo)->get();

        return response()->json($users);
    }
    public function setCreateUser(Request $request){
        // dd($request->all());
        if(!$request->ajax()) return redirect('/');

        $validator = Validator::make($request->all(), [
            'sNombre' => 'required',
            'sCorreo' => 'required',
            'sContraseña'=> 'required'
        ]);
  
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $nombre = $request->sNombre;
        $correo = $request->sCorreo;
        $contraseña = $request->sContraseña;

        $user = new User();
        $user->name=$nombre;
        $user->email=$correo;
        $user->password=Hash::make($contraseña);
        $user->save();

        return response()->json(['success' => 'Se ha creado el usuario correctamente']);
    }
}
