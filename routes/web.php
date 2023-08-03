<?php
//Routes 
use lib\Route;
use app\Controllers\HomeController;

//Routes like Laravel framework
Route::get("/" ,function(){
   return HomeController::class;

});

Route::get("/login" ,function(){
    return $data = ['name'=>'fidel'];
});

Route::put("/add" , function(){
    return "data save";
});
Route::get("/update/:id" , function($id){
    return "EL id en la ruta es  : $id";
});

Route::dispatch();

