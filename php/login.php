<?php

include_once("config_login.php");
include_once("db.php");

$usr=$_POST['username'];

$pass=$_POST['password'];

$newPass=md5($pass);

$conn=new db();

$sql="select * from usuarios where (username='$usr' or email='$usr') and (password='$newPass')";

$result=$conn->query($sql);

$row=$result->fetch_assoc();


if ($row==NULL){
 echo "<h1>Ingreso Invalido</h1>";
}
else{
  session_start();
  $_SESSION['time']=date('H:i:s');
  $_SESSION['username']=$usr;
  $_SESSION['logueado']=true;
  header("location:welcome.php");
}


$conn->close();

?> 