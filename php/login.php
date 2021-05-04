<?php

include_once("database.php");
$usr=$_POST['username'];
$pass=$_POST['password'];
$newPass=md5($pass);
$conn=openConnect();
$sql="select * from usuarios where (username='$usr' or email='$usr') and (password='$newPass')";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if ($row==NULL)
 echo "<h1>Ingreso Invalido</h1>";
else
  header("location:welcome.php");



?> 