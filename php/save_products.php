<?php

session_start();
if($_SESSION['logueado'])
{
    include_once("upload_image.php");
    $action       = $_POST['action'];
    $id_zapatilla = $_POST['id_zapatilla'];
    $modelo       = $_POST['modelo'];
    $precio       = $_POST['precio'];
    $descripcion  = $_POST['descripcion'];
    $genero       = $_POST['genero'];
    $disciplina   = $_POST['disciplina'];
    $marca        = $_POST['marca'];

    $path_img="images/".$nombre_img;
    include_once("config_productos.php");
    include_once("db.php");
    $conn = new db();

    // Se valida si viene de insertar o actualizar
    if( isset( $id_zapatilla ) && $id_zapatilla > 0 && $action == 'update' ){
        
        $string_alert = 'Actualizado';
        $uri_redirect = 'edit.php';
        $sql = "UPDATE zapatillas SET 
            modelo='$modelo',
            precio='$precio',
            genero='$genero',
            id_marca=$marca,
            imagen='$path_img',
            descripcion='$descripcion',
            disciplina='$disciplina'
             WHERE id_zapatilla = $id_zapatilla";

    }else if( isset( $id_zapatilla ) && $id_zapatilla > 0 && $action == 'trasch' ){
        
        $string_alert = 'Eliminado';
        $uri_redirect = 'delete.php';
        $sql = "DELETE FROM zapatillas WHERE id_zapatilla = $id_zapatilla";

    }else{
        $string_alert = 'Ingresado';
        $uri_redirect = 'insert_products.php';
        $sql = "insert into zapatillas (modelo,precio,genero,id_marca,imagen,descripcion,disciplina)
            values (?,?,?,?,?,?,?)";

    }

    $stmt=$conn->prepare($sql);
    $stmt->bind_param('sdsisss',$modelo,$precio,$genero,$marca,$path_img,$descripcion,$disciplina);
    if($stmt->execute()){
    ?>
    <script>
     alert("Producto  <?php  echo $string_alert;   ?>: + <?php  echo $modelo;   ?>");
     window.location="<?php echo $uri_redirect; ?>";
    </script>

<?php
    }
}
?>