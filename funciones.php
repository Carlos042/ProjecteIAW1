<?php

// Incluimos el fichero necesario para poder hacer la conexión de la BD
include("datos.php");

// Funcion para tener conexión en la BD
function conexionDB($host,$user,$pass,$bda,$puerto){

    $conexion = mysqli_connect($host,$user,$pass,$bda,$puerto);

    if (!$conexion){

        return false;

    }else{

        return $conexion;
    }
}

// Funcion para insertar un empleado "Registro de usuarios"
function insertEmpleado($conexion,$usuario,$nombreUsuario,$apellidosUsuario,$fechaNacUsuario,$direccionUsuario,$correoUsuario,$imagenUsuario,$tipoUsuario,$passwordCifrado){

    $consulta = "INSERT INTO usuarios(usuario,nombre,apellidos,fechaNac,direccion,correo,imagen,tipoUsuario,passwd) VALUES('$usuario','$nombreUsuario','$apellidosUsuario','$fechaNacUsuario','$direccionUsuario','$correoUsuario','$imagenUsuario','$tipoUsuario','$passwordCifrado')";

    if (mysqli_query($conexion,$consulta)){

        print "<h3>Bienvenido a la empresa " . $nombreUsuario . " !!!!</h3>";
        print "<a href='../principal.php?usuario=$usuario'>Entrar a nuestra pagina</a><br><br>";
        print "<a href='../index.php'>Volver</a>";
    
    }else {

        print "<h3>Error al insertar el usuario</h3>";
        print "<a href='../index.php'>Volver</a>";
    }

}

// Funcion para logerase con un usuario existente en la BD 
function login($conexion,$usuario,$passwordCifrado){
    
    $consulta =  "SELECT * FROM usuarios WHERE usuario = '$usuario' AND passwd = '$passwordCifrado'";
    

    if (($resultado = mysqli_query($conexion,$consulta)) && (mysqli_num_rows($resultado) == 1)){

        print "<h3>Bienvenido a la empresa " . $usuario . " !!!!</h3>";
        print "<a href='../principal.php?usuario=$usuario'>Entrar a nuestra pagina</a><br><br>";
        print "<a href='../index.php'>Volver</a>";

    }else{

        print "<h3>No se ha encontrado ninguna relacion entre usuario y contraseña</h3>";
        print "<a href='../index.php'>Volver</a>";
    }
}

// Funcion para seleccionar toda la información de un usuario en la tabla de usuarios
function selectUsuario($conexion,$usuario){

    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

    if ($datos = mysqli_query($conexion,$consulta)){

        while($fila = mysqli_fetch_array($datos)){

            $nombreUsuario = $fila["nombre"];
            $apellidosUsuario = $fila["apellidos"];
            $fechaNacUsuario = $fila["fechaNac"];
            $direccionUsuario = $fila["direccion"];
            $correoUsuario = $fila["correo"];
            $imagenUsuario = $fila["imagen"];
            $passwdUsuario = $fila["passwd"];
        }

        // Formulario que contiene toda la información del usuario seleccionado
        print "<fieldset>";
        print "<form method='post' action='usuarioActualizado.php?usuario=$usuario' enctype='multipart/form-data'>";
        print "<fieldset>";
        print "<legend>¿Quieres cambiar la contraseña?</legend>";
        print "<label for='password1'>Contraseña:</label><br>";
        print "<input type='password' name='password1' value='$passwdUsuario'><br><br>";
        print "<label for='password2'>Verificar Contraseña:</label><br>";
        print "<input type='password' name='password2'>";
        print "</fieldset>";
        print "<br>";
        print "<fieldset>";
        print "<legend>¿Quieres cambiar tus datos personales?</legend>";
        print "<label for='nombre'>Nombre:</label><br>";
        print "<input type='text' name='nombre' value='$nombreUsuario'><br><br>";
        print "<label for='apellidos'>Apellidos:</label><br>";
        print "<input type='text' name='apellidos' value='$apellidosUsuario'><br><br>";
        print "<label for='direccion'>Direccion:</label><br>";
        print "<input type='text' name='direccion' value='$direccionUsuario'><br><br>";
        print "<label for='correo'>Correo:</label><br>";
        print "<input type='text' name='correo' value='$correoUsuario'><br><br>";
        print "<label for='fechaNac'>Fecha de nacimiento:</label>";
        print "<input type='date' name='fechaNac' value='$fechaNacUsuario'><br><br>";
        print "Tu imagen actual:" . "<br>";
        print "<img width='200px' src='$imagenUsuario'><br><br>";
        print "<label for='imagen'>Imagen:</label><br>";
        print "<input type='file' name='imagen'><br><br>";
        print "</fieldset>";
        print "<input type='submit' value='Cambiar'>";
        print "</form>";
        print "</fieldset>";
    }

}

// Funcion para actualizar un usuario
function updateUsuario($conexion,$usuario,$nombreUsuario,$apellidosUsuario,$fechaNacUsuario,$direccionUsuario,$correoUsuario,$imagenUsuario,$passwordCifrado){

    $consulta = "UPDATE usuarios SET nombre = '$nombreUsuario', apellidos = '$apellidosUsuario', fechaNac = '$fechaNacUsuario', direccion = '$direccionUsuario', correo = '$correoUsuario', imagen='$imagenUsuario', passwd = '$passwordCifrado' WHERE usuario = '$usuario'";

    if ((mysqli_query($conexion,$consulta)) && (mysqli_affected_rows($conexion) == 1 )){
    
            print "<h3>" . $nombreUsuario . " " . $apellidosUsuario .  " tu usuario actualizado correctamente!!!" . "</h3>";
            print "<a href='../principal.php?usuario=$usuario'>Volver</a>";
    
    }else{
    
            print "<h3>No has actualizado el usuario</h3>";
            print "<a href='../principal.php?usuario=$usuario'>Volver</a>";
    }
    
}

// Funcion para insertar una nueva incidencia en la BD
function insertarIncidencia($conexion,$usuario,$categoria,$descripcion,$estado){

    $consulta = "INSERT INTO incidencias(fecha,usuario,categoria,descripcion,estado) VALUES(NOW(),'$usuario','$categoria','$descripcion','$estado')";

    if (mysqli_query($conexion,$consulta)){

        print "<h3>Incidencia agregada correctamente !!!!</h3>";
        print "<a href='../principal.php?usuario=$usuario'>Volver</a>";
    
    }else {

        print "<h3>Error al insertar una Incidencia</h3>";
        print "<a href='../principal.php?usuario=$usuario'>Volver</a>";
    }
}

// Funcion para mostrar la información de las incidencias mediante una tabla
function selectIncidenciasTabla($conexion){

    $consulta = "SELECT * FROM incidencias";

    if ($datos = mysqli_query($conexion,$consulta)){

        while($fila = mysqli_fetch_array($datos)){

            $idIncidencia = $fila["idIncidencia"];
            $fecha = $fila["fecha"];
            $usuario = $fila["usuario"];
            $descripcion = $fila["descripcion"];
            $estado = $fila["estado"];
            
            // Creación de la tabla acompañada en el fichero donde se muestra
            echo "<tr>";
            echo "<td>" . $fecha . "</td>";
            echo "<td>" . $usuario . "</td>";
            echo "<td>" . $descripcion . "</td>";

            if ($estado == "Pendiente"){

                echo "<td>" . "<a class='btn btn-danger'>" . $estado . "</a></td>";
            
            }elseif($estado == "En revision"){

                echo "<td>" . "<a class='btn btn-warning'>" . $estado . "</a></td>";

            }elseif($estado == "Cerrada"){

                echo "<td>" . "<a class='btn btn-success'>" . $estado . "</a></td>";
            }

            echo "<td>" . "<a class='btn btn-primary' href='incidencias/actualizarIncidencia.php?idIncidencia=$idIncidencia&usuario=$usuario'>Pulsa Aqui</a> ". "</td>";
            echo "</tr>";
        }
    }
}

// Funcion para recoger toda la información de las incidencias pero en esta parte es para actualizar mediante un formulario
function selectIncidencias($conexion,$idIncidencia){

    $consulta = "SELECT * FROM incidencias WHERE idIncidencia = $idIncidencia";

    if ($datos = mysqli_query($conexion,$consulta)){

        while($fila = mysqli_fetch_array($datos)){

            $idIncidencia = $fila["idIncidencia"];
            $usuario = $fila["usuario"];
            $categoria = $fila["categoria"];
            $descripcion = $fila["descripcion"];
            $estado = $fila["estado"];
            $mensaje = $fila["mensaje"];
            
            // Creación del formulario acompañada con el fichero de actualizar una incidencia
            print "<fieldset>";
            print "<form method='post' action='incidenciaActualizada.php?idIncidencia=$idIncidencia'>";
            print "<label for='usuario'>Usuario:</label><br>";
            print "<input type='text' name='usuario' value='$usuario'><br><br>";
            print "<label for='categoria'>Categoria:</label><br>";
            print "<select name='categoria'>";
            
            if ($categoria == 1){

                $categoria = "General";
            }

            print "<option value=$categoria>$categoria</option>";
            print "</select><br><br>";
            print "<label for='descripcion'>Descripcion:</label><br>";
            print "<textarea name='descripcion' rows='4' cols='50'>$descripcion</textarea><br>";
            print "<label for='estado'>Estado:</label><br>";
            print "<select name='estado'>";

            if ($estado == "Pendiente"){

                print "<option value=$estado selected>$estado</option>";
                print "<option value='enRevision'>En revision</option>";
                print "<option value='Cerrada'>Cerrada</option>";
            
            }elseif ($estado == "En revision"){

                print "<option value='Pendiente'>Pendiente</option>";
                print "<option value='enRevision' selected>$estado</option>";
                print "<option value='Cerrada'>Cerrada</option>";
            
            }elseif ($estado == "Cerrada"){

                print "<option value='Pendiente'>Pendiente</option>";
                print "<option value='enRevision'>En revision</option>";
                print "<option value=$estado selected>$estado</option>";
            }

            print "</select><br><br>";
            print "<h3>Es obligatorio enviar un mensaje al actualizarlo</h3>";
            print "<textarea name='mensaje' rows='4' cols='50' required>$mensaje</textarea><br><br>";
            print "<input type='submit' value='Actualizar Incidencia'>";
            print "</form>";
            print "</fieldset>";
        }
    }
}

// Funcion para actualizar una incidencia
function updateIncidencia($conexion,$idIncidencia,$usuario,$categoria,$descripcion,$estado,$mensaje){

    $consulta = "UPDATE incidencias SET fecha = NOW(), usuario = '$usuario', categoria = $categoria, descripcion = '$descripcion', estado = '$estado', mensaje = '$mensaje' WHERE idIncidencia = $idIncidencia";

    if ((mysqli_query($conexion,$consulta)) && (mysqli_affected_rows($conexion) == 1 )){
    
        print "<h3>La Incidencia ha sido actualizada correcatmente !!!</h3>";
        print "<a href='../principal.php?usuario=$usuario'>Volver</a>";

    }else{
    
        print "<h3>No has actualizado la incidencia</h3>";
        print "<a href='../principal.php?usuario=$usuario'>Volver</a>";
    }
    
}

// Funcion especificamente para consultar alguna información necesaria en el momento del desarrollo del codigo
function consultar($conexion,$consulta){

    if ($datos = mysqli_query($conexion,$consulta)){

        $resultado = array();

        while($fila = mysqli_fetch_array($datos)){

            $resultado[] = $fila;
        }

        return $resultado;
    }
}

?>