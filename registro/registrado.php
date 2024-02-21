<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrado</title>
</head>
<body>
    <?php
        // Incluimos los dos fichero necesarios para poder trabajar.
        include ("../datos.php");
        include ("../funciones.php");

        // Comprobamos si los campos estan vacios y si cumple le enviaremos error
        if (empty($_POST["usuario"]) && empty($_POST["password"]) && empty($_POST["nombre"]) && empty($_POST["apellidos"]) && empty($_POST["direccion"]) && empty($_POST["correo"]) && empty($_POST["fechaNac"])) {

            print "<h3>ERROR: Debes completar todos los campos del formulario</h3>";
            print "<a href='../index.php'>Volver</a>";

        }

        // Comprobamos si los campos tienen información y se pueda ejecutar el INSERT del usuario.
        if (isset($_POST["usuario"],$_POST["password"],$_POST["nombre"],$_POST["apellidos"],$_POST["direccion"],$_POST["correo"],$_POST["fechaNac"])){

            // Creamos las variables con la información que contiene el POST del formulario.
            $usuario = $_POST["usuario"];
            $passwordUsuario = $_POST["password"];
            $nombreUsuario = $_POST["nombre"];
            $apellidosUsuario = $_POST["apellidos"];
            $direccionUsuario = $_POST["direccion"];
            $correoUsuario = $_POST["correo"];
            $fechaNacUsuario = $_POST["fechaNac"];

            // Damos por defecto el Role de Trabajador a los que se registran en la empresa.
            $tipoUsuario = "trabajador";

            // Comprobamos si el usuario ha subido una imagen del formulario y con ello tampoco han habido errores de subida.
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){

                // Adjudicamos la imagen seleccionada por el usuario (Guardamos la ruta donde se encuentra la imagen en la DB).
                $directorioImagen = "../img/"; 
                $imagenUsuario = $directorioImagen . $_FILES['imagen']['name'];

            }else {

                // En el caso que el usuario no nos proporcione una imagen, la damos nosotros.
                $imagenPredeterminado = "../img/predeterminado.jpg";
                $imagenUsuario = $imagenPredeterminado;
            }

            // Con ello hacemos nuestra conexion con nuestra base de datos.
            if ($conexion = conexionDB($host,$user,$pass,$bda,$puerto)){

                // Ciframos la contraseña que nos proporciona dicho usuario.
                $passwordCifrado = hash('sha256', $passwordUsuario);
                
                // Llamamos a la funcion insertEmpleado para insertar al usuario correspondiente.
                insertEmpleado($conexion,$usuario,$nombreUsuario,$apellidosUsuario,$fechaNacUsuario,$direccionUsuario,$correoUsuario,$imagenUsuario,$tipoUsuario,$passwordCifrado);    
            }
        
        }
    ?>
</body>
</html>