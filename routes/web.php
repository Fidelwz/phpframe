<?php
//Routes 
use lib\Route;
use app\Controllers\HomeController;
use app\Models\task;

//Routes like Laravel framework
Route::get("/" ,[HomeController::class, 'index']);

Route::get("/delete/:id", function($id){
    
      $data = new task();
      $data->delete($id);
      header("Location: /");
    exit(); 
});



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

