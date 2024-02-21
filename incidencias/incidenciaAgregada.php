<?php
  
  // Incluimos los dos fichero necesarios para poder trabajar
  include("../datos.php");
  include("../funciones.php");

  // Le pasa a este ficehero el usuario para poder navegar en la aplicacion con el
  $usuarioG = $_GET["usuario"];
  
  // Nos aseguramos que no nos pase nada vacio, en lo contrario les mandamos un error 
  if (empty($_POST["usuario"]) && empty($_POST["descripcion"])) {

    print "<h3>ERROR: Debes completar todos los campos del formulario</h3>";
    print "<a href='../principal.php?usuario=$usuarioG'>Volver</a>";

  }

  // Comoprobamos que el usuario ha enviado información para procesarla 
  if (isset($_POST["usuario"],$_POST["categoria"],$_POST["descripcion"],$_POST["estado"])){

    // Cada uno lo guardamos en una variable
    $usuario = $_POST["usuario"];
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];
    $estado = $_POST["estado"];

    // Comprobamos que hay conexión en nuestra BD
    if ($conexion = conexionDB($host,$user,$pass,$bda,$puerto)){

      // Comprobamos que la categoria enviada es "general". Si es asi, le damos el valor a 1 para poder agregarla en la BD
      if ($categoria == "general"){
  
        $categoria = 1;
      }
      
      // Hacemos una consulta para comprobar si el usuario que nos ha introducido existe en la BD
      $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
      $existUser = consultar($conexion,$consulta);

      // Lo comprobamos y si no existe le mandamos un error
      if (!$existUser){
        
        print "<h3>Error el usuario no existe</h3>";
        print "<a href='../principal.php?usuario=$usuarioG'>Volver</a>";

      // Si no llamamos la funcion para insertar una incidencia
      }else{

        insertarIncidencia($conexion,$usuario,$categoria,$descripcion,$estado);
      }
    }

  }else{

    print "<h3>Error al insertar una Incidencia</h3>";
    print "<a href='../principal.php?usuario=$usuarioG'>Volver</a>";
  }

?>