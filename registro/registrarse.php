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

        <a href="index.php" class="navbar-brand">
          <img src="../img/logo.png" width="100px">
        </a>

        <!--Botón pera el mobil-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Menu de navegación-->
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 color='13aa'">
                <li class="nav-item p-2"><a href="registrarse.php" class="nav-link">Registrarse</a></li>
                <li class="nav-item p-2"><a href="../login/login.php" class="nav-link">Login</a></li>
            </ul>
        </div>
    </div>
  </nav>
<!-- Contenido de la pagina-->
  <div class="container text-center">
    <div class="row">
      <div class="col-12 m-2 titulo">
        <h2>Registrarse</h2>
      </div>
    <div class="row">
        <div class="col-12 m-4">
            <!-- Contenido del formulario-->
            <fieldset>
                <form method="post" action="registrado.php" enctype="multipart/form-data">
                    <label for="usuario">Usuario:</label><br>
                    <input type="text" name="usuario"><br><br>
                    <label for="password">Contraseña:</label><br>
                    <input type="password" name="password"><br><br>
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" name="nombre"><br><br>
                    <label for="apellidos">Apellidos:</label><br>
                    <input type="text" name="apellidos"><br><br>
                    <label for="direccion">Direccion:</label><br>
                    <input type="text" name="direccion"><br><br>
                    <label for="correo">Correo:</label><br>
                    <input type="text" name="correo"><br><br>
                    <label for="fechaNac">Fecha de nacimiento:</label>
                    <input type="date" name="fechaNac"><br><br>
                    <label for="imagen">Imagen:</label><br>
                    <input type="file" name="imagen"><br><br>
                    <input type="submit" value="Registrarse">
                </form>
            </fieldset>
        </div>
    </div>
  </div>
    <script src="../js/bootstrap.bundle.js"></script>  
</body>
</html>