<?php

define("SERVER_NAME","localhost");
define("USER_NAME","root");
define("PASSWORD","");
define("DATABASE_NAME","login");

$usr=$_POST['username'];

$pass=$_POST['password'];

// La variable está encriptada.

$newPass=md5($pass);


$con=mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,DATABASE_NAME);

if (mysqli_connect_errno()!=0){
   echo "Hubo un error de conexion".mysqli_connect_error();
}
else
{
   echo "La conexion fue exitosa";
}


?>