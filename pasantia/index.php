
<?php
{
$x=0;
$usuario = "root";
$password = "12345";
$servidor = "localhost";
$basededatos = "alrx";

$conexion = mysqli_connect( $servidor, $usuario, $password ) 
or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db( $conexion, $basededatos ) 
or die ( "no se ha podido conectar a la base de datos" );
$consulta = "SELECT nombres, apellidos, numerocedula, tel, correo, edad, genero FROM datos";
$resultado = mysqli_query( $conexion, $consulta,  ) 
or die ("Algo ha ido mal en la consulta a la base de datos");
$ip=$_SERVER['REMOTE_ADDR'];
if ($ip=='::1'){
  $ip="localhost";  
}

echo '<style>';
echo 'body {';
echo 'font-family: "Lato", sans-serif;';
echo '}';
echo '';
echo '.sidenav {';
echo 'height: 100%;';
echo 'width: 0;';
echo 'position: fixed;';
echo 'z-index: 1;';
echo 'top: 0;';
echo 'left: 0;';
echo 'background-color: #111;';
echo 'overflow-x: hidden;';
echo 'transition: 0.5s;';
echo 'padding-top: 60px;';
echo '}';
echo '.sidenav a {';
echo 'padding: 8px 8px 8px 32px;';
echo 'text-decoration: none;';
echo 'font-size: 25px;';
echo 'color: #818181;';
echo 'display: block;';
echo 'transition: 0.3s;';
echo '}';
echo '.sidenav a:hover {';
echo 'color: #f1f1f1;';
echo '}';
echo '.sidenav .closebtn {';
echo 'position: absolute;';
echo 'top: 0;';
echo 'right: 25px;';
echo 'font-size: 36px;';
echo 'margin-left: 50px;';
echo '}';
echo '@media screen and (max-height: 450px) {';
echo '.sidenav {padding-top: 15px;}';
echo '.sidenav a {font-size: 18px;}';
echo '}';
echo '</style>';
while ($columna = mysqli_fetch_array( $resultado))
{$x=$x+1;}

$resultado = mysqli_query( $conexion, $consulta,) ;
$columna=0;

echo '<!DOCTYPE HTML>';
echo '<html>';
echo '<head>';
echo '<title>Pagina</title>';
echo '<link rel="shortcut icon" href="images/clinica.JPG" type="image/x-icon">';
echo '<meta charset="utf-8" />';
echo '<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />';
echo '<link rel="stylesheet" href="assets/css/main.css" />';
echo '</head>';
echo '<body class="homepage is-preload">';
echo '<div id="mySidenav" class="sidenav">';
echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
echo '<a href="#top">Top</a>';
echo '<a href="#registros">registros</a>';
echo '<a href="#contacto">Contactos</a>';
echo '</div>';
echo '<h2  style="font-size:30px;cursor:pointer;color:white" onclick="openNav()" >  &#9776  Pagina Web</h2>';
echo '<script>';
echo 'function openNav() {';
echo 'document.getElementById("mySidenav").style.width = "250px";';
echo '}';
echo 'function closeNav() {';
echo 'document.getElementById("mySidenav").style.width = "0";';
echo '}';
echo '</script>';
echo '<div id="page-wrapper">';

echo '<section id="header">';
echo '<h1><a href="">Pagina</a></h1>';
echo '<section id="intro" class="container">';
echo '<div class="row">';
echo '<div class="col-4 col-12-medium">';
echo '<section class="first">';
echo '<i class="icon solid featured fa-cog"></i>';
echo '<header>';
echo '<h2>Registros Totales:'. "&nbsp;" .$x.'</h2>';
echo '</header>';
echo '</section>';
echo '</div>';
echo '<div class="col-4 col-12-medium">';
echo '<section class="middle">';
echo '<i class="icon solid featured alt fa-bolt"></i>';
echo '<header>';
echo '<h2>User IP</h2>';
echo '</header>';
echo "<h2>IP:  &nbsp; $ip </h2>";
echo '</section>';
echo '</div>';
echo '<div class="col-4 col-12-medium">';
echo '<section class="last">';
echo '<i class="icon solid featured alt2 fa-clock"></i>';
echo '<header>';
echo '<h2>Hora actual</h2>';
echo '</header>';
echo '<iframe src="https://free.timeanddate.com/clock/i9a3p234/n93/tlec4/tt0/th2" frameborder="0" width="318" height="18"></iframe>';
echo '</section>';
echo '</div>';
echo '</div>';
echo '<footer>';
echo '<ul class="actions">';
echo '</ul>';
echo '</footer>';
echo '</section>';
echo '</section>';
echo '<section id="footer">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-8 col-12-medium">';
echo '<section>';
echo '<header>';
echo '<h2 id="registros">Registros:</h2>';
echo '</header>';

$x=0;
while ($columna = mysqli_fetch_array( $resultado))
{
    $x=$x+1;
    echo '<hr>';
    echo "<table borde='0'>";
  echo '<ul class="dates" >';
  echo '<li>';
  echo '<span class="date" >N°<strong>' . $x . '</strong></span>';
  echo '<h3>' . $columna['nombres'] . "&nbsp;" . $columna['apellidos'] . '</h3>';
  echo '<p>' . 'Cedula:'. "&nbsp;" . $columna['numerocedula'] . "&nbsp;" . 'Telefono: +' . $columna['tel'] . '</p>' . 'Correo:'. "&nbsp;" . $columna['correo'] . "&nbsp;" . "&nbsp;" . "&nbsp;" . 'Fecha de Nacimiento:'. "&nbsp;" . $columna['edad'] . '</p>' . 'Genero:'. "&nbsp;" . $columna['genero'];
  echo '</li>';
  echo '<ul>';
  echo "</table>";
}
if ($x==0) {echo '<h2>----------------tabla vacia!--------------------';
    echo '<hr>';};

echo '</div>';
echo '<section>';
echo '</ul>';
echo '</section>';
echo '</div>';
echo '<section>';
echo '<header>';
echo '<h2 id="contacto">Redes sociales</h2>';
echo '</header>';
echo '<ul class="social">';
echo '<li><a class="icon brands fa-facebook-f" href="https://www.facebook.com/hospitalclinicasanfrancisco/?locale=es_LA"><span class="label">Facebook</span></a></li>';
echo '<li><a class="icon brands fa-twitter" href="https://twitter.com/i/flow/login?redirect_after_login=%2Fhc_sanfrancisco"><span class="label">Twitter</span></a></li>';
echo '<li><a class="icon brands fa-dribbble" href="https://hospitalsanfrancisco.com.ec/"><span class="label">Dribbble</span></a></li>';
echo '<li><a class="icon brands fa-linkedin-in" href="https://ec.linkedin.com/company/hospital-cl%C3%ADnica-san-francisco-de-guayaquil"><span class="label">LinkedIn</span></a></li>';
echo '</ul>';
echo '<ul class="contact">';
echo '<li>';
echo '<h3>Address</h3>';
echo '<p>';
echo 'hospital san francisco<br />';
echo 'Cdla. Kennedy Norte. Av. Alejandro Andrade y Juan Rolando<br />'; 
echo '</p>';
echo '</li>';
echo '<li>';
echo '<h3>Mail</h3>';
echo '<p><a href="#">info@hospitalsanfrancisco.com.ec</a></p>';
echo '</li>';
echo '<li>';
echo '<h3>Phone</h3>';
echo '<p>(+593) 983-345-875</p>';
echo '</li>';
echo '</ul>';
echo '</section>';
echo '<div class="col-12">';
echo '';
echo '<!-- Copyright -->';
echo '<div id="copyright">';
echo '<ul class="links">';
echo '<li>&copy; Clinica San Fransisco. All rights reserved.</li>';
echo '</ul>';
echo '</div>';
echo '';
echo '</div>';
echo '</div>';
echo '</section>';
echo '<!-- Scripts -->';
echo '<script src="assets/js/jquery.min.js"></script>';
echo '<script src="assets/js/jquery.dropotron.min.js"></script>';
echo '<script src="assets/js/browser.min.js"></script>';
echo '<script src="assets/js/breakpoints.min.js"></script>';
echo '<script src="assets/js/util.js"></script>';
echo '<script src="assets/js/main.js"></script>';
echo '<button class="button" onclick="openForm()">Registrar nueva entrada</button>';
echo '</body>';
echo '<style>';
echo '.open-button {';
echo 'background-color: #555;';
echo 'color: white;';
echo 'padding: 16px 20px;';
echo 'border: none;';
echo 'cursor: pointer;';
echo 'opacity: 0.8;';
echo 'position: fixed;';
echo 'bottom: 23px;';
echo 'right: 28px;';
echo 'width: 280px;';
echo '}';
echo '.button {';
echo 'background-color: #555;';
echo 'color: white;';
echo 'padding: 16px 20px;';
echo 'border: none;';
echo 'opacity: 0.8;';
echo 'position: fixed;';
echo 'bottom: 23px;';
echo 'right: 28px;';
echo 'width: 280px;';
echo '}';
/* The popup form - hidden by default */
echo '.form-popup {';
echo 'display: none;';
echo 'position: fixed;';
echo 'bottom: 0;';
echo 'right: 15px;';
echo 'border: 3px solid #f1f1f1;';
echo 'z-index: 9;';
echo '}';
echo '';
/* Add styles to the form container */
echo '.form-container {';
echo 'max-width: 300px;';
echo 'padding: 10px;';
echo 'background-color: white;';
echo '}';
echo '';
/* Full-width input fields */
echo '.form-container input[type=text], .form-container input[type=password] {';
echo 'width: 100%;';
echo 'padding: 15px;';
echo 'margin: 5px 0 22px 0;';
echo 'border: none;';
echo 'background: #f1f1f1;';
echo '}';
echo '';
/* When the inputs get focus, do something */
echo '.form-container input[type=text]:focus, .form-container input[type=password]:focus {';
echo 'background-color: #ddd;';
echo 'outline: none;';
echo '}';
echo '';
/* Set a style for the submit/login button */
echo '.form-container .btn {';
echo 'background-color: #04AA6D;';
echo 'color: white;';
echo 'padding: 16px 20px;';
echo 'border: none;';
echo 'cursor: pointer;';
echo 'width: 100%;';
echo 'margin-bottom:10px;';
echo 'opacity: 0.8;';
echo '}';
echo '';
/* Add a red background color to the cancel button */
echo '.form-container .cancel {';
echo 'background-color: red;';
echo 'color: white;';
echo '}';
echo '';
/* Add some hover effects to buttons */
echo '.form-container .open-button:hover {';
echo 'opacity: 1;';
echo '}';
echo '</style>';
echo '<nav id="nav">';
echo '<ul class="container">';

echo '</ul>';
echo '</nav>';
echo '<script>';
echo 'function openForm() {';
echo 'document.getElementById("myForm").style.display = "block";';
echo '}';
echo '';
echo 'function closeForm() {';
echo 'document.getElementById("myForm").style.display = "none";';
echo '}';
echo '</script>';
echo '<div class="form-popup" id="myForm">';
echo '<button class="cancel" onclick="closeForm()">cancelar</button>';
echo '<form action="conection.php" method="post" class="form-container">';
echo '<!--Nombres-->';
echo '<labed for="nombres" class="">Nombres</labed>';
echo '<input type="text" id="nombres" name="nombres" maxlength="" required></input>';
echo '<!--Apellidos-->';
echo '<labed for="apellidos" class="">Apellidos</labed>';
echo '<input type="text" id="apellidos" name="apellidos" maxlength="" required></input>';
echo '<!--Email-->';
echo '<labed for="correo" class="">Email</labed>';
echo '<input type="email" id="correo" name="correo" maxlength="" required></input>';
echo '<!--Edad-->';
echo '<labed for="edad" class="">Edad</labed>';
echo '<input type="date" id="edad" name="edad" min="1500-1-1" max="9999-12-12" required></input>';
echo '<br>';
echo '<!--Cedula-->';
echo '<labed for="numerocedula" class="">Cedula</labed>';
echo '<input type="text" id="numerocedula" name="numerocedula" minlength="13" maxlength="13" required></input>';
echo '<!--Telefono-->';
echo '<labed for="tel" class="">Telefono</labed>';
echo '<input type="text" id="tel" name="tel" minlength="7" maxlength="13" required value="+593"></input>';
echo '<!--Genero-->';

echo '<label for="genero">Genero</label>';
echo '<select name="genero" id="genero" required>';
echo '<option value="Hombre" selected>Hombre</option>';
echo '<option value="Mujer">Mujer</option>';
echo '</select>';
echo '<!--Boton-->';
mysqli_close( $conexion);
echo '<button class="btn" data-toggle="collapse">Guardar</button>';
echo '</form>';
echo '</div>';
echo '</html>';
}
?>