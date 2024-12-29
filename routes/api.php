<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//CRUD USUARIOS

Route::get("/usuario", [UsuarioController::class, "funListar"]);
Route::post("/usuario",[UsuarioController::class, "funGuardar"]);
Route::put("/usuario/{id}",[UsuarioController::class, "funModificar"]);
Route::delete("/usuario/{id}",[UsuarioController::class, "funEliminar"]);
Route::get("/usuario/{id}", [UsuarioController::class, "funMostrar"]);
