<?php

require_once "modelos/calificaciones.php";

class EstudiantesControlador{

    private $modelo;

    public function __construct(){
        $this->modelo = new Calificaciones();
    }

    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once 'vistas/pie.php';
        require_once 'vistas/estudiantes/form.estudiantes.php';
    }

}