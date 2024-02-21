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
                <li class="nav-item p-2"><a href="registro/registrarse.php" class="nav-link">Registrarse</a></li>
                <li class="nav-item p-2"><a href="login/login.php" class="nav-link">Login</a></li>
            </ul>
        </div>
    </div>
  </nav>
<!-- Contenido de la pagina-->
  <br> <br>
  <div class="container text-center">
    <div class="row">
      <div class="col-12 m-2 titulo">
        <h2>¡Bienvenido a nuestra sede XATIVA!</h2>
        <h2>¿Que te trae por aqui?</h2>
      </div> 
    </div>
    <br><br>
    <img src="img/xativa.png">
  
    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>