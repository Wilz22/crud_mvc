<?php

require_once "modelos/calificaciones.php";

class InicioControlador{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Calificaciones();
    }

    public function Inicio(){
        $bd = BasedeDatos::Conectar();
        require_once 'vistas/encabezado.php';
        require_once 'vistas/inicio/principal.php';
        require_once 'vistas/pie.php';

    }
}