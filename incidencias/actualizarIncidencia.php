<?php

  // Incluimos los dos fichero necesarios para poder trabajar
  include("../datos.php");
  include("../funciones.php");

  // Le pasa a este ficehero el usuario para poder navegar en la aplicacion con el y la id de la incidencia para poder actualizarla
  $usuario = $_GET["usuario"];
  $idIncidencia = $_GET["idIncidencia"];

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
  <br> <br>
  <div class="container text-center">
    <div class="row">
      <div class="col-12 m-2 titulo">
        <h2>Información de las Incidencias de nuestra empresa</h2>
        <h2>¿Que incidencias tenemos?</h2>
      </div> 
    </div>
    <div class="row">
        <div class="col-12 m-4">
          <!-- Contenido del formulario-->
          <?php

            if ($conexion = conexionDB($host,$user,$pass,$bda,$puerto)){

              selectIncidencias($conexion,$idIncidencia);
            }
          ?>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>  
</body>
</html>