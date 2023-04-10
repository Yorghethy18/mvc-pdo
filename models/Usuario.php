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

  public function registrarUsuario(){
    try{

    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function eliminarUsuario(){
    try{

    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarUsuario(){
    try{

    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}