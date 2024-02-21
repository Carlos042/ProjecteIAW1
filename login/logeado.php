<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logeado</title>
</head>
<body>
    <?php
        // Incluimos los dos fichero necesarios para poder trabajar
        include ("../datos.php");
        include ("../funciones.php");

        // Comoprobamos que el usuario ha enviado información para procesarla 
        if (isset($_POST["usuario"],$_POST["password"])){

            // Cada uno lo guardamos en una variable y la contraseña la ciframos
            $usuario = $_POST["usuario"];
            $passwordUsuario = $_POST["password"];
            $passwordCifrado = hash('sha256', $passwordUsuario);

            // Comprobamos que hay conexión en nuestra BD
            if ($conexion = conexionDB($host,$user,$pass,$bda,$puerto)){

                // Llamamamos a la funcion
                login($conexion,$usuario,$passwordCifrado);
            }

        }
    ?>
</body>
</html>