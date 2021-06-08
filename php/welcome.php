<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/welcome.css">
</head>

<body>
    <nav class="navtop">
        <div>
            <h1>Area Privada</h1>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
        <?php
        session_start();
        if ($_SESSION['logueado']) {
            echo "Bienvenido/a, " . $_SESSION['username'];
            echo "<br>";
            echo "Horario de Conexión: " . $_SESSION['time'];
            echo "<br>";
        }

        ?>
        <br>
      
        <a href="insert_products.php" class="btn btn-primary" role="button">Ingresar Producto</a>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>

</html>