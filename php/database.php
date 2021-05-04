<?php


define("SERVER_NAME","localhost");
define("USER_NAME","root");
define("PASSWORD","");
define("DATABASE_NAME","login");

// Conectar a una Base de Datos

function openConnect(){
    
$con=mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,DATABASE_NAME);

    // false-> 0, true-> != 0

if (mysqli_connect_errno()){
    echo "Hubo un error de conexion".mysqli_connect_error();
    exit();
 }

return $con;

}


?>