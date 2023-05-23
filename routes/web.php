<?php



use lib\Route;

Route::get("/" ,function(){
    echo "Hello wordls";
});

Route::get("/login" ,function(){
    echo "login";
});

Route::put("/add" , function(){
    echo "data save";
});

Route::dispatch();

?>