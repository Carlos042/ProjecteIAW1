<?php

  // Incluimos los dos fichero necesarios para poder trabajar
  include("datos.php");
  include("funciones.php");

  // Le pasa a este ficehero el usuario para poder navegar en la pagina web
  $usuario = $_GET["usuario"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xativa</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
  <!--Barra de navegación Bootstrap-->
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">

    <div class="container">

        <a href="index.php" class="navbar-brand">
          <img src="img/logo.png" width="100px">
        </a>

        <!--Botón pera el mobil-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Menu de navegación-->
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 color='13aa'">
                <li class="nav-item p-2"><a href="principal.php<?php echo"?usuario=" . $usuario ?>" class="nav-link">Principal</a></li>
                <li class="nav-item p-2"><a href="incidencias/agregarIncidencia.php<?php echo"?usuario=" . $usuario ?>" class="nav-link">Añadir Incidencia</a></li>
                <li class="nav-item p-2"><a href="usuarios/actualizarUsuario.php<?php echo"?usuario=" . $usuario ?>" class="nav-link">Configuración Usuario</a></li>
                <li class="nav-item p-2"><a href="index.php" class="nav-link">Cerrar Sesion</a></li>
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
        <div class="col-12 m-4 filtros">
            <!-- Agregamos la parte de los filtros-->
            <form method="post" action="">
              <h2>Filtro de las Incidencias</h2><br>
              <label for="estado">Filtrar por el Estado:</label>
              <select name="estado">
                <option value="todos">Todos</option>
                <option value="pendeinte">Pendiente</option>
                <option value="enRevision">En revision</option>
                <option value="cerrada">Cerrada</option>
              </select><br><br>
              <label for="fecha">Filtrar por la Fecha:</label>
              <select name="fecha">
                <option value="todos">Todos</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
              </select><br><br>
              <label for="cantidad">Filtrar por la Fecha:</label>
              <input class="numberCantidad" type="number" name="cantidad"><br><br>
              <input type="submit" value="Filtrar">
            </form>
        </div>
        <div class="col-12 m-4">
            <!-- Aqui pintamos la tabla de incidencias-->
            <table class="table table-bordered">
              <th>Fecha</th>
              <th>Usuario</th>
              <th>Descripción</th>
              <th>Estado</th>
              <th>Actualizar</th>
              <?php

                print $_POST["estado"];

                if ($conexion = conexionDB($host,$user,$pass,$bda,$puerto)){

                  selectIncidenciasTabla($conexion);
                }

              ?>
            </table>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>