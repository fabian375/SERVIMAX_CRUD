<?php
session_start();
if($_SESSION['logueado']){
    echo "Bienvenido/a, ".$_SESSION['username'];
    echo "<br>";
    echo "Horario de Conexión: ".$_SESSION['time'];
    echo "<br>";
    echo "<a href='logout.php'> Logout </a>";

}






?>