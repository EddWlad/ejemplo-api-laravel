<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function funListar(){
        $usuarios = DB::select("SELECT * FROM users");
        return $usuarios;
    }

    public function funGuardar(Request $request){
        $nombre = $request -> name;
        $correo = $request -> email;
        $pass = $request -> password;
        DB::insert("INSERT INTO users (name, email, password) VALUES('$nombre','$correo','$pass')");
        return ["mensaje" => "Usuario registrado"];
    }

    public function funMostrar($id){
        $usuario = DB::select("SELECT * FROM users WHERE id=?", [$id]);
        if(!$usuario){
            return response()->json(["mesaje" => "Usuario no encontrado"], 404);
        }
        return response()->json($usuario, 200);
    }

    public function funModificar($id, Request $request){
        $nombre = $request -> name;
        $correo = $request -> email;
        $pass = $request -> password?$request -> password:null;

        DB:: update("UPDATE users SET name = ?, email = ?, password=? WHERE id=?", [$nombre, $correo, $pass, $id]);
        return response()->json(["mesaje" => "Usuario actualizado"], 201);
    }

    public function funEliminar($id){
        DB:: delete("DELETE FROM users WHERE id=?", [$id]);
        return response()->json(["mesaje" => "Usuario eliminado"], 200);
    }
}
