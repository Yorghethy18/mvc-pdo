<?php
session_start();
require_once '../models/Usuario.php';

if (isset($_POST['operacion'])){
  $usuario = new Usuario();

  // IDENTIFICANFO LA OPERACION...
  if($_POST['operacion'] == 'login'){

    $registro = $usuario->iniciarSesion($_POST['nombreusuario']);

    $_SESSION["login"] = false;

    //Objeto para contener el resultado
    $resultado = [
      "status"  => false,
      "mensaje" => ""
    ];

    if($registro){
      // El usuario si existe
      $claveEncriptada = $registro["claveacceso"];
      
      // Validar la contraseña
      if(password_verify($_POST['claveIngresada'], $claveEncriptada)){
        $resultado["status"] = true;
        $resultado["mensaje"] = "Bienvenido al sistema";
        $_SESSION["login"] = true;
      }else{
        $resultado["mensaje"] = "Error en la contraseña";
      }
      
    }else{
      // El usuario no existe
      $resultado["mensaje"] = "No encontramos al usuario";
    }

    // Enviams el objeto resultado a la vista
    echo json_encode($resultado);
  }

  if($_POST['operacion'] == 'listar'){

    $datosObtenidos = $curso->listarUsuarios();
    
    //En esta ocación NO enviaremos un objeto JSON, en su lugar el controlador redenrizará las filas que necesita <tbody></tbody>
    //echo json_encode($datosObtenidos);

    // PASO 1: Verificar que el objeto contenga datos
    if($datosObtenidos){
      $numeroFila = 1;
      // PASO 2. Recorrer todo el objeto
      foreach($datosObtenidos as $usuario){
        // PASO 3: Ahora construimos las filas
        echo "
          <tr>
            <td>{$numeroFila}</td>
            <td>{$usuario['nombreusuario']}</td>
            <td>{$usuario['claveacceso']}</td>
            <td>{$usuario['apellidos']}</td>
            <td>{$usuario['nombres']}</td>
            <td>{$usuario['nivelacceso']}</td>
            <td>
            <a href='#' data-idusuario='{$usuario['idusuario']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash3-fill'></i></a>
                <a href='#' data-idusuario='{$usuario['idusuario']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil-fill'></i></a>
            </td>
          </tr>
        ";
          $numeroFila++;
      } // FIN DEL FOREACH
    }

  }

  
}


// Intercertar valores que llegan por la URL
if (isset($_GET['operacion'])){

  if($_GET['operacion'] == 'finalizar'){
    session_destroy();
    session_unset(); // Libera cualquier cosa o accion que el servidor haya creado.
    header('Location:../index.php');
  }
}