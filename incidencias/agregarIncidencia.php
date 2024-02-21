<?php

  // Incluimos los dos fichero necesarios para poder trabajar
  include("../datos.php");
  include("../funciones.php");

  // Le pasa a este ficehero el usuario para poder navegar en la aplicacion con el
  $usuario = $_GET["usuario"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xativa</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
  <!--Barra de navegación Bootstrap-->
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">

    <div class="container">

        <a href="../index.php" class="navbar-brand">
          <img src="../img/logo.png" width="100px">
        </a>

        <!--Botón para el mobil-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Menu de navegación-->
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 color='13aa'">
                <li class="nav-item p-2"><a href="../principal.php<?php echo"?usuario=" . $usuario ?>" class="nav-link">Principal</a></li>
                <li class="nav-item p-2"><a href="agregarIncidencia.php<?php echo"?usuario=" . $usuario ?>" class="nav-link">Añadir Incidencia</a></li>
                <li class="nav-item p-2"><a href="../usuarios/actualizarUsuario.php<?php echo"?usuario=" . $usuario ?>" class="nav-link">Configuración Usuario</a></li>
                <li class="nav-item p-2"><a href="../index.php" class="nav-link">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
  </nav>
<!-- Contenido de la pagina-->
<div class="container text-center">
    <div class="row">
      <div class="col-12 m-2 titulo">
        <h2>Insertar Incidencia</h2>
      </div>
    <div class="row">
        <div class="col-12 m-4">
            <fieldset>
                <!-- Contenido del formulario-->
                <form method="post" action="incidenciaAgregada.php<?php echo"?usuario=" . $usuario ?>">
                    <label for="usuario">Usuario:</label><br>
                    <input type="text" name="usuario"><br><br>
                    <label for="categoria">Categoria:</label><br>
                    <select name="categoria">
                        <option value="general">General</option>
                    </select><br><br>
                    <label for="descripcion">Descripcion:</label><br>
                    <textarea name="descripcion" rows="4" cols="50"></textarea><br>
                    <label for="estado">Estado:</label><br>
                    <select name="estado">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En Revision">En Revision</option>
                        <option value="Cerrada">Cerrada</option>
                    </select><br><br>
                    <input type="submit" value="Agregar Incidencia">
                </form>
            </fieldset>
        </div>
    </div>
  </div>
    <script src="../js/bootstrap.bundle.js"></script>  
</body>
</html>