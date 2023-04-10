<!doctype html>
<html lang="es">

<head>
  <title>USUARIOS PDO</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

     <!-- Íconos de Bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body>
<div class="container mt-3">
    <div class="card table-responsive">
      <div class="card-header bg-info text-light">
        <div class="row">
          <div class="col-md-6">
            <strong>LISTA DE USUARIOS</strong>
          </div>
          <div class="col-md-6 text-end">
            <button class="btn btn-success btn-sm" id="abrir-modal" data-bs-toggle="modal" data-bs-target="#modal-registro-cursos"><i class="fa-solid fa-folder-plus"></i> Agregar Usuario</button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-sm table-striped" id="tabla-cursos">
          <colgroup> <!-- Permite ordenar las tablas-->
            <col width = "5%">
            <col width = "30%">
            <col width = "25%">
            <col width = "10%">
            <col width = "10%">
            <col width = "10%">
            <col width = "10%">
          </colgroup>
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre Usuario</th>
              <th>Contraseña</th>
              <th>Apellidos</th>
              <th>Nombres</th>
              <th>Nivel Acceso</th>
              <th>Operaciones</th>
            </tr>
          </thead>
          <tbody>
            <td>1</td>
            <td>YORGHET</td>
            <td>$2y$10$UVumvYTP8aTab4XdFzj.GuSrFri19FfM7pGw3SEh6m1uOeoWwsne6</td>
            <td>Hernandez Yerén</td>
            <td>Yorghet Fernanda</td>
            <td>Administrador</td>
            <td>
              <a href="#" data-idusuario="" class="btn btn-danger btn-sm eliminar"><i class='bi bi-trash3-fill'></a>
              <a href="#" data-idusuario="" class="btn btn-info btn-sm editar"><i class='bi bi-pencil-fill'></a>
            </td>
          </tbody>
        </table>
      </div>
    </div>
      <div class="card-footer text-end">
        <a href="../controllers/usuario.controller.php?operacion=finalizar">Cerrar sesión</a>
      </div>
    </div>
  </div>

   <!-- Zona de modales -->
  
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modal-registro-usuarios" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary text-light">
          <h5 class="modal-title" id="modal-titulo">Registro de Usuarios</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="formulario-usuarios" autocomplete="off">
            <div class="mb-3">
              <label for="nombreusuario" class="form-label">Nombre Usuario</label>
              <input type="text" class="form-control form-control-sm" id="nombreusuario">
            </div>
            <div class="mb-3">
              <label for="claveacceso" class="form-label">Contraseña</label>
              <input type="password" class="form-control form-control-sm" id="claveacceso">
            </div>
            <div class="mb-3">
              <label for="apellidos" class="form-label">Apellidos</label>
              <input type="text" class="form-control form-control-sm" id="Apellidos">
            </div>
            <div class="mb-3">
              <label for="nombres" class="form-label">Nombres</label>
              <input type="text" class="form-control form-control-sm" id="nombres">
            </div>
            <div class="mb-3">
              <label for="nivelacceso" class="form-label">Nivel Acceso</label>
              <select id="nivelacceso" class="form-select form-select-sm">
                <option value="">Seleccione</option>
                <option value="A">Administrador</option>
                <option value="C">Colaborador</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary btn-sm" id="guardar-curso">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Fin zona de modales -->
 
</body>

</html>