<?php

// Incluimos los dos fichero necesarios para poder trabajar.
include ("../datos.php");
include ("../funciones.php");


// Comprobamos si los campos no esten vacios y se pueda ejecutar el INSERT del usuario.
if (isset($_POST["nombre"],$_POST["apellidos"],$_POST["direccion"],$_POST["correo"],$_POST["fechaNac"])){

    // Creamos las variables con la información que contiene el POST del formulario.
    $nombreUsuario = $_POST["nombre"];
    $apellidosUsuario = $_POST["apellidos"];
    $direccionUsuario = $_POST["direccion"];
    $correoUsuario = $_POST["correo"];
    $fechaNacUsuario = $_POST["fechaNac"];

    // Comprobamos que hay conexión en nuestra BD
    if ($conexion = conexionDB($host,$user,$pass,$bda,$puerto)){

        //  Le pasamos a este fichero el usuario que estan utilizando para poder hacer la consulta
        $usuario = $_GET["usuario"];
        
        $consulta = "SELECT imagen FROM usuarios WHERE usuario = '$usuario'";

        $resultado = consultar($conexion,$consulta);

        // Cogemos el valor que contiene de iamgen el usuario en la BD
        foreach ($resultado as $fila) {

            $imagenUsuario = $fila['imagen'];
        }
        
        // Comprobamos que no han habido errores y no este vacia la parte de la imagen en el formulario
        if (isset($_FILES["imagen"]) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){

            // Adjudicamos la imagen seleccionada por el usuario (Guardamos la ruta donde se encuentra la imagen en la DB).
            $directorioImagen = "../img/"; 
            $imagenUsuario = $directorioImagen . $_FILES['imagen']['name'];
        }
        
        // Comprobamos que en la verificacion de la contraseña este vacia o no
        if (empty($_POST["password2"])){

            // Hacemos una consulta para obtener la contraseña del usuario
            $consulta = "SELECT passwd FROM usuarios WHERE usuario = '$usuario'";

            $resultado = consultar($conexion,$consulta);
            
            // Cogemos el valor de la columna de contraseña
            foreach ($resultado as $fila) {
    
                $passwordCifrado = $fila['passwd'];
            }
        
        // Si el campo de verificación de la contraseña tiene un valor comprobamos que son iguales al campo de contraseña y si es asi la ciframos y la guardamos
        }else{

            if ($_POST["password1"] == $_POST["password2"]){
                
                $passwordUsuario = $_POST["password1"];
                $passwordCifrado = hash('sha256', $passwordUsuario);

            // Si no coinciden las contraseñas les mandamos un error y usamos un return para que no continue el codigo
            }else{

                print "<h3>Las contraseñas no coiciden</h3>";
                print "<a href='../principal.php?usuario=$usuario'>Volver</a>";
                return;
            }
        }

        // Si todo ha funcionado correctamente, llamamos a la funcion 
        updateUsuario($conexion,$usuario,$nombreUsuario,$apellidosUsuario,$fechaNacUsuario,$direccionUsuario,$correoUsuario,$imagenUsuario,$passwordCifrado);
     }
}

?>