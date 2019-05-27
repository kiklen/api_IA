<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foto;
use App\User;

class FotoController extends Controller
{
    public function insertar(Request $request){
        $rules = [
            'foto' => 'required',
            'id_usuario' => 'required|exists:users,id'
        ];
        $datos = $request->all();
        $errores = $this->validate($datos,$rules);
        if(count($errores)>0){
            return $this->error($errores);
        }
        $foto = Foto::create($datos);
        return $this->success($foto);
    }
    public function actualizar(Request $request){
        $array = $request->all();
        $data = Foto::find($request->id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        $data->update($array);
        return $this->success($data);
    }
    public function eliminar($id){
        $data = Foto::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }

        $data->delete();
        return $this->succes(["objeto eliminado correctamente"]);
    }
    public function listarPorUsuario(Request $request){
        $data = User::where('id',$request->id_usuario)->first();
        $fotos = $data->foto;
        return $this->success($foto);
    }
    public function mostrar($id){
        $data = Foto::find($id);
        if(!$data) {
            return $this->error(["Objeto no encontrado"]);
        }
        return $this->success($data);
    }
}
