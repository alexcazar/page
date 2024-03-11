<?php
{
  //require_once 'm_conexion.php';
//post variables
  $nombres = $_POST["nombres"];
  $apellidos = $_POST["apellidos"];
  $numerocedula = $_POST["numerocedula"];
  $tel = $_POST["tel"];
  $correo = $_POST["correo"];
  $edad = $_POST["edad"];
  $genero = $_POST["genero"];
//log variables content
error_log(print_r(" ---------- ",true));
error_log(print_r($nombres,true));
error_log(print_r($apellidos,true));
error_log(print_r($numerocedula,true));
error_log(print_r($tel,true));
error_log(print_r($correo,true));
error_log(print_r($edad,true));
error_log(print_r($genero,true));
error_log(print_r(" ----- fin ----- ",true));
function redirect($url) {
  header('Location: '.$url);
  die();
}

//connect to base
$usuario = "root";
$password = "12345";
$servidor = "localhost";
$basededatos = "alrx";

// creación de la conexión a la base de datos con mysql_connect()
$conexion = mysqli_connect( $servidor, $usuario, $password ) 
or die ("No se ha podido conectar al servidor de Base de datos");
// Selección del a base de datos a utilizar
$db = mysqli_select_db( $conexion, $basededatos ) 
or die ( "no se ha podido conectar a la base de datos" );
// establecer y realizar consulta. guardamos en variable.
$consulta = "SELECT nombres, apellidos, numerocedula, tel, correo, edad, genero FROM datos";
//insertar datos en la base de datos
$sql_insert="INSERT INTO alrx.datos(nombres, apellidos, numerocedula, tel, correo, edad, genero)
values('".$nombres."', '".$apellidos."', '".$numerocedula."', '".$tel."', '".$correo."', '".$edad."', '".$genero."');";
$generoC = "SELECT (CASE WHEN Quantity = 1 THEN 'Hombre' WHEN Quantity = 2 THEN 'Mujer' END)genero FROM datos";
$insertar= mysqli_query($conexion, $sql_insert)
or die ("error al insertar, regrese a la pagina anterior");
$generoA= mysqli_query($conexion, $generoC);
$resultado = mysqli_query( $conexion, $consulta,  ) 
or die ("Algo ha ido mal en la consulta a la base de datos");
error_log(print_r(" ---------- ",true));
error_log(print_r($consulta,true));
error_log(print_r($generoA,true));
error_log(print_r($sql_insert,true));
// Motrar el resultado de los registro de la base de datos
// Encabezado de la tabla
echo "<table borde='2'>";
echo "<tr>";
echo "</tr>";
echo "<td>" . 'Nombres:' . "</td><td>" . 'Apellidos:' . "</td><td>" . 'Numero de cedula:' . "</td><td>" . 'Telefono:' . "</td><td>" . 'Correo:' . "</td><td>". 'Fecha de Nacimiento:' . "</td><td>". 'Genero:' . "</td><td>";

  

// Bucle while que recorre cada registro y muestra cada campo en la tabla.
while ($columna = mysqli_fetch_array( $resultado ))
{
    
  echo "</tr>";
  echo "<td>" . $columna['nombres'] . "</td><td>" . $columna['apellidos'] . "</td><td>" . $columna['numerocedula'] . "</td><td>" . $columna['tel'] . "</td><td>" . $columna['correo'] . "</td><td>". $columna['edad'] . "</td><td>". $columna['genero'] . "</td><td>";
  echo "</tr>";
}
echo "</table>"; // Fin de la tabla
// cerrar conexión de base de datos
mysqli_close( $conexion );
redirect("index.php#registros");   
}
?>