<?php

require_once "modelos/basededatos.php";

if (!isset($_GET['c'])){
    require_once "controladores/inicio.controlador.php";
    $controlador = new InicioControlador();
    call_user_func(array($controlador, "Inicio"));
} else {
    $controlador = $_GET['c'];
    $archivoControlador = "controladores/$controlador.controlador.php";
    
    if (file_exists($archivoControlador)) {
        require_once $archivoControlador;
        $controlador = ucwords($controlador) . "Controlador";
        $controlador = new $controlador;
        $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
        call_user_func(array($controlador, $accion));
    } else {
        echo "Error: No se pudo encontrar el archivo '$archivoControlador'.";
    }
}
?>
