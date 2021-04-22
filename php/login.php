<?php

$usr=$_POST['username'];

$pass=$_POST['password'];

//var_dump(((($usr=="maria") || ($usr=="maria@gmail.com")) && ($pass=="123456")));

if (((($usr=="maria") || ($usr=="maria@gmail.com")) && ($pass=="123456"))) {
    echo "<h1> Login Correcto </h1>";
} else {
    echo "<h1> Login Incorrecto </h1>";
}



?>