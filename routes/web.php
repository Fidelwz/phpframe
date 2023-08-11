<?php
//Routes 
use lib\Route;
use app\Controllers\HomeController;

//Routes like Laravel framework
Route::get("/" ,[HomeController::class, 'index']);

Route::post("/delete/:id", [HomeController::class,'delete']);



Route::get("/login" ,function(){
    return $data = 'Cadena';
});

Route::put("/add" , function(){
    return "data save";
});
Route::get("/update/:id" , function($id){
    return "EL id en la ruta es  : $id";
});

Route::dispatch();

