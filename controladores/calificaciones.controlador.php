<?php

require_once "modelos/calificaciones.php";

class CalificacionesControlador{

    private $modelo;

    public function __construct(){
        $this->modelo = new Calificaciones();
    }

    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once 'vistas/pie.php';
        require_once 'vistas/calificaciones/index.php';
    }

    public function FormCrear(){
        $titulo="Insertar";
        $p=new Calificaciones();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Actualizar";
        }
        require_once 'vistas/encabezado.php';
        require_once 'vistas/pie.php';
        require_once 'vistas/calificaciones/form.php';
    }   

    public function Guardar(){
        // Crear una instancia de Calificaciones y asignar valores
        $calificacion = new Calificaciones();
        $calificacion->setCalificacionID(intval($_POST['ID']));
        $calificacion->setEstudianteID($_POST['selectAlumnos']);
        $calificacion->setCursoID($_POST['selectMaterias']);
        $calificacion->setNota($_POST['inputNota']);
        
        // Validar y convertir la fecha
        $fechaString = $_POST['inputFecha'];
        $fecha = DateTime::createFromFormat('Y-m-d', $fechaString);
        
        if (!$fecha) {
            // Manejar el error si la fecha no es válida
            die("Fecha no válida: $fechaString");
        }
        
        $calificacion->setFecha($fecha);
        $calificacion->getCalificacionID() > 0 ? 
        // Insertar la calificación utilizando el modelo
        $this->modelo->Actualizar($calificacion):
        $this->modelo->Insertar($calificacion);
        
        // Limpiar los campos del formulario usando JavaScript
        echo '<script>';
        echo 'document.getElementById("selectAlumnos").selectedIndex = -1;';
        echo 'document.getElementById("selectMaterias").selectedIndex = -1;';
        echo 'document.getElementById("inputNota").value = "";';
        echo 'document.getElementById("inputFecha").value = "";';
        echo '</script>';

        // Redireccionar después de insertar
        header('location:?c=calificaciones');
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header('location:?c=calificaciones');
    }
    

}