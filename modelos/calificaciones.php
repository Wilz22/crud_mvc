<?php
class Calificaciones{

    private $pdo;

    private $CalificacionID;
    private $EstudianteID;
    private $CursoID;
    private $Nota;
    private $Fecha;
    private $NombreEstudiante;
    private $ApellidoEstudiante;
    private $NombreCurso;
    private $Nombre;
    private $Apellido;
    private $FechaNacimiento;
    private $Genero;
    private $Email;


    public function __construct(){
        $this->pdo = BasedeDatos::Conectar();
        
    }

    public function getCalificacionID() : ?int{
        return $this->CalificacionID;
    }

    public function setCalificacionID(int $id) {
        $this->CalificacionID = $id;
        // return $this;
    }
    public function getEstudianteID() : ?int{
        return $this->EstudianteID;
    }

    public function setEstudianteID(int $idest) {
        $this->EstudianteID = $idest;
        // return $this;
    }
    public function getCursoID() : ?int{
        return $this->CursoID;
    }

    public function setCursoID(int $idcurso) {
        $this->CursoID = $idcurso;
        // return $this;
    }
    public function getNota() : ?float{
        return $this->Nota;
    }

    public function setNota(float $nota) {
        $this->Nota = $nota;
        // return $this;
    }

    public function getFecha() : ?DateTime{
        return $this->Fecha;
    }

    public function setFecha(DateTime $Fecha) {
        $this->Fecha = $Fecha;
        // return $this;
    }
    public function getNombreEstudiante() : ?string {
        return $this->NombreEstudiante;
    }

    public function setNombreEstudiante(string $nombre) {
        $this->NombreEstudiante = $nombre;
    }

    public function getApellidoEstudiante() : ?string {
        return $this->ApellidoEstudiante;
    }

    public function setApellidoEstudiante(string $apellido) {
        $this->ApellidoEstudiante = $apellido;
    }

    public function getNombreCurso() : ?string {
        return $this->NombreCurso;
    }

    public function setNombreCurso(string $nombreCurso) {
        $this->NombreCurso = $nombreCurso;
    }

    public function getNombre() : ?string {
        return $this->Nombre;
    }

    public function setNombre(string $nombre) {
        $this->Nombre = $nombre;
    }

    public function getApellido() : ?string {
        return $this->Apellido;
    }

    public function setApellido(string $apellido) {
        $this->Apellido = $apellido;
    }
    public function getFechaNacimiento() : ?DateTime{
        return $this->FechaNacimiento;
    }

    public function setFechaNacimiento(DateTime $FechaNacimiento) {
        $this->Fecha = $FechaNacimiento;
        // return $this;
    }

    public function getGenero() : ?string {
        return $this->Genero;
    }

    public function setGenero(string $Genero) {
        $this->Genero = $Genero;
    }

    public function getEmail() : ?string {
        return $this->Email;
    }   

    public function setEmail(string $Email) {
        $this->Email = $Email;
    }


    public function Cantidad(){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(DISTINCT EstudianteID) AS Cantidad FROM Calificaciones;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage()); 
        }
    }

    public function CantidadAlum(){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(DISTINCT EstudianteID) AS Estudiantes FROM Estudiantes;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage()); 
        }
    }
    public function Listar() {
        try {
            $consulta = $this->pdo->prepare("
                SELECT 
                    CalificacionID,
                    Estudiantes.Nombre AS NombreEstudiante, 
                    Estudiantes.Apellido AS ApellidoEstudiante,
                    Cursos.NombreCurso AS NombreCurso, 
                    Calificaciones.Nota, 
                    Calificaciones.Fecha
                FROM 
                    Calificaciones
                INNER JOIN 
                    Estudiantes ON Calificaciones.EstudianteID = Estudiantes.EstudianteID
                INNER JOIN 
                    Cursos ON Calificaciones.CursoID = Cursos.CursoID;
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function TraerDropDown() {
        try {
            $consulta = $this->pdo->prepare("SELECT EstudianteID, Nombre, Apellido FROM Estudiantes;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function TraerDropDownMaterias() {
        try {
            $consulta = $this->pdo->prepare("SELECT CursoID, NombreCurso FROM cursos;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Insertar(Calificaciones $p) {
        try {
            // Preparar la consulta SQL
            $consulta = "INSERT INTO Calificaciones (EstudianteID, CursoID, Nota, Fecha) VALUES (?,?,?,?);";
            
            // Obtener los valores que se van a insertar
            $valores = array(
                $p->getEstudianteID(),
                $p->getCursoID(),
                $p->getNota(),
                $p->getFecha()->format('Y-m-d')  // Formatear la fecha como 'YYYY-MM-DD'
            );
    
            // Imprimir el SQL por consola para verificar
            echo "SQL INSERT: $consulta" . PHP_EOL;
            echo "Valores: " . implode(', ', $valores) . PHP_EOL;
    
            // Ejecutar la consulta preparada
            $this->pdo->prepare($consulta)->execute($valores);
    
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM calificaciones WHERE CalificacionID =?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new Calificaciones();
            $p->setCalificacionID($r->CalificacionID);
            $p->setEstudianteID($r->EstudianteID);
            $p->setCursoID($r->CursoID);
            $p->setNota($r->Nota);	
            $p->setFecha(new DateTime($r->Fecha));

            return $p;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Calificaciones $p) {
        try {
            // Preparar la consulta SQL
            $consulta = "UPDATE Calificaciones SET
                EstudianteID=?,
                CursoID=?,
                Nota=?,
                Fecha=?
                WHERE CalificacionID=?;
                ";
            
            // Obtener los valores que se van a insertar
            $valores = array(
                $p->getEstudianteID(),
                $p->getCursoID(),
                $p->getNota(),
                $p->getFecha()->format('Y-m-d'),
                $p->getCalificacionID() 
            );
    
            // Imprimir el SQL por consola para verificar
            echo "SQL INSERT: $consulta" . PHP_EOL;
            echo "Valores: " . implode(', ', $valores) . PHP_EOL;
    
            // Ejecutar la consulta preparada
            $this->pdo->prepare($consulta)->execute($valores);
    
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            // Preparar la consulta SQL
            $consulta = "DELETE FROM Calificaciones WHERE CalificacionID=?;";
            
            $this->pdo->prepare($consulta)->execute(array($id));
    
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function InsertarEstudiante(Calificaciones $p) {
        try {
            // Preparar la consulta SQL
            $consulta = "INSERT INTO Estudiantes (Nombre, Apellido, FechaNacimiento, Genero, Email) VALUES (?,?,?,?,?);";
            
            // Obtener los valores que se van a insertar
            $valores = array(
                $p->getEstudianteID(),
                $p->getCursoID(),
                $p->getNota(),
                $p->getFecha()->format('Y-m-d')  // Formatear la fecha como 'YYYY-MM-DD'
            );
    
            // Imprimir el SQL por consola para verificar
            echo "SQL INSERT: $consulta" . PHP_EOL;
            echo "Valores: " . implode(', ', $valores) . PHP_EOL;
    
            // Ejecutar la consulta preparada
            $this->pdo->prepare($consulta)->execute($valores);
    
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
}