<?php

// Incluimos los dos fichero necesarios para poder trabajar.
include("../datos.php");
include("../funciones.php");

// Le pasa a este ficehero la id de la incidencia para poder actualizarla en esa incidencia en concreto
$idIncidencia = $_GET["idIncidencia"];

// Comoprobamos que el usuario ha enviado información para procesarla 
if (isset($_POST["usuario"],$_POST["categoria"],$_POST["descripcion"],$_POST["estado"],$_POST["mensaje"])){

    // Cada uno lo guardamos en una variable
    $usuario = $_POST["usuario"];
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];
    $estado = $_POST["estado"];
    $mensaje = $_POST["mensaje"];

    // Comprobamos que la categoria enviada es "General". Si es asi, le damos el valor a 1 para poder agregarla en la BD
    if ($categoria == "General"){
  
        $categoria = 1;
    }

    // Si el estado tiene de valor como "enRevision", Le damos valor como "En revison" para poder agregarla en la BD
    if ($estado == "enRevision"){

        $estado = "En revision";
    }

    // Comprobamos que hay conexión en nuestra BD
    if ($conexion = conexionDB($host,$user,$pass,$bda,$puerto)){

        // Si tenemos conexión llamamos a la funcion
        updateIncidencia($conexion,$idIncidencia,$usuario,$categoria,$descripcion,$estado,$mensaje);
    }

// Si no ha cumplido la condición, habra un error
}else{

    print "<h3>Error al actualizar la Incidencia</h3>";
    print "<a href='../principal.php?usuario=$usuario'>Volver</a>";
}

?>