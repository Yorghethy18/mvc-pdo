<?php

require_once "  Conexion.php";

//MODELO = CONTIENE LA LÓGICA
// extends : HERENCIA (POO) en PHP
class Curso extends Conexion{

  // Objeto que almacena la conexión que viene desde el padre (Conexion) y la compartirá con todos los métodos (CRUD+)
  private $accesoBD;

  // Constructor
  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion(); //El valor de retorno de esta funcion ha sido asignada a este objeto. Si getConexion devuelve el retorno al acceso.
  }
  
   // Método listar cursos
   public function listarCursos(){
    try {
      // 1. Preparamos la consulta
     $consulta = $this->accesoBD->prepare("CALL spu_curso_listar()");
     // 2. Ejecutamos la consulta
     $consulta->execute();
     // 3. Devolvemos el resultado
     return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
   }

   public function registrarCurso(){
    try {
      
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
   }

   public function eliminarCurso(){
    try {
      
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
   }

   public function actualizarCurso(){
    try {
      
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
   }

}

?>