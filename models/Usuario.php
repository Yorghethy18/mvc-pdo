<?php

require_once 'Conexion.php';

class Usuario extends Conexion{

  private $accesoBD; // Tendrá la conexion de la base de datos

  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion(); //El valor de retorno de esta funcion ha sido asignada a este objeto. Si getConexion devuelve el retorno al acceso.
  }
  
  public function iniciarSesion($nombreUsuario = ""){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_usuarios_login(?)");
      $consulta->execute(array($nombreUsuario));
      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  
  // Método listar Usuarios
   public function listarUsuarios(){
     try {
       // 1. Preparamos la consulta
     $consulta = $this->accesoBD->prepare("CALL spu_usuarios_listar()");
     // 2. Ejecutamos la consulta
     $consulta->execute();
     // 3. Devolvemos el resultado
     return $consulta->fetchAll(PDO::FETCH_ASSOC);
     } 
     catch (Exception $e) {
       die($e->getMessage());
     }
   }
  public function registrarUsuario($datos = []){
    try{
      // 1. Preparamos la consulta
      $consulta = $this->accesoBD->prepare("CALL spu_registrar_usuarios(?,?,?,?,?)");
      // 2. Ejecutamos la consulta
      $consulta->execute(
        array(
          $datos["nombreusuario"],
          $datos["claveacceso"], 
          $datos["apellidos"], 
          $datos["nombres"], 
          $datos["nivelacceso"]
        )
      );
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }


}