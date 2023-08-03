<?php
spl_autoload_register(function($case){
    $ruta = '../'.str_replace("\\","/",$case).".php";
    if(file_exists($ruta)){
        require_once $ruta;
    }
    else{
        die("error al cargar la clase");
    }
});

