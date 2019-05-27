<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * @param String name
     * @param String password
     * @param String password_confirmation
     * @param String nickname
     * @param String email
     */
    public function insertar(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'nickname'=> 'required|string',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nickname'=>$request->nickname
        ]);
        $user->save();
        return $this->success($user);
    }
    public function actualizar(Request $request){
        $array = $request->all();
        $data = User::find($request->id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        $data->update($array);
        return $this->success($data);
    }
    public function eliminar($id){
        $data = User::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }

        $data->delete();
        return $this->succes(["objeto eliminado correctamente"]);
    }
    public function listar(){
        $data = User::get();
        return $this->success($data);
    }
    public function mostrar($id){
        $data = User::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        return $this->success($data);
    }
}
