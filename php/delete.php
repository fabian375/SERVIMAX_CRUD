<?php
    include_once("config_productos.php");
    include_once("db.php");
    $conn = new db();

    // Capturar los datos del producto para su actualizacion
    if( $_GET['id'] ){
        $id = $_GET['id'];
        $sql_products = "select * from zapatillas where id_zapatilla= $id";
        $rows = $conn->query($sql_products);
        $detail = $rows->fetch_object();
    }
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">ELIMINAR PRODUCTOS</h3>
                <br>
            </div>
            <div class="col-md-12">
                <form action="save_products.php" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-group">
                    <?php if( $detail->id_zapatilla > 0 ){ ?>
                        <input type="hidden" name="action" value="trasch">
                        <input type="hidden" name="id_zapatilla" value="<?php echo $detail->id_zapatilla; ?>">
                    <?php } ?>
                    <div class="form-group">
                        <label for="search_modelo" class="control-label">Buscar producto</label>
                        <select id="search_modelo" class="form-control">
                            <option value="">---</option>
                            <?php
                            $sql = "select id_zapatilla as id,modelo as descripcion from zapatillas order by modelo";
                            $result = $conn->query($sql);

                            while ($rowBrands = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $rowBrands['id'] ?>"><?php echo $rowBrands['descripcion'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modelo" class="control-label">MODELO</label>
                        <input type="text" id="modelo" class="form-control" name="modelo" required="" placeholder="MODELO" value="<?php echo $detail->modelo; ?>">
                    </div>
                    <div class="form-group">
                        <label for="precio" class="control-label">PRECIO</label>
                        <input type="text" class="form-control" name="precio" required="" placeholder="PRECIO" value="<?php echo $detail->precio; ?>">
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="control-label">DESCRIPCION</label>
                        <textarea class="form-control" name="descripcion" rows=3><?php echo $detail->descripcion; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="genero" class="control-label">GÉNERO</label>
                        <select name="genero" id="genero" class="form-control">
                            <option value="mujer">MUJER</option>
                            <option value="hombre">HOMBRE</option>
                            <option value="niño">NIÑO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="disciplina" class="control-label">DISCIPLINA</label>
                        <select name="disciplina" id="disciplina" class="form-control">
                            <option value="futbol">FUTBOL</option>
                            <option value="tenis">TENIS</option>
                            <option value="basket">BASKET</option>
                            <option value="moda">MODA</option>
                            <option value="running">RUNNING</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="marca" class="control-label">MARCA</label>
                        <select name="marca" id="marca" class="form-control">
                            <?php
                            $sql = "select id_marca as id,descripcion as descripcion from marcas order by descripcion";
                            $result = $conn->query($sql);

                            while ($rowBrands = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $rowBrands['id'] ?>"><?php echo $rowBrands['descripcion'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                        <div class="form-group">
                            <label for="imagen" class="control-label">Seleccione la imagen a subir</label>
                            <input type="file" id="imagen" class="form-control" name="imagen" size="30">
                            <?php if( $detail->imagen !='' ){ ?>
                            <small style="color:red;"><?php echo $detail->imagen; ?></small>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Eliminar Producto">
                            <a href="welcome.php">
                                <input type="button" class="btn btn-warning" value="Regresar">
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Se montan los valores de los selects -->
    <input type="hidden" id="value-genero" value="<?php echo $detail->genero; ?>">
    <input type="hidden" id="value-disciplina" value="<?php echo $detail->disciplina; ?>">
    <input type="hidden" id="value-marca" value="<?php echo $detail->id_marca; ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $("select").select2();
        var value_genero = $("#value-genero").val();
        $("#genero").select2('val',[value_genero]);
        var value_disciplina = $("#value-disciplina").val();
        $("#disciplina").select2('val',[value_disciplina]);
        var value_marca = $("#value-marca").val();
        $("#marca").select2('val',[value_marca]);
    </script>
    <script type="text/javascript">
        
        $( "#search_modelo" ).change(function() {
          var id = $(this).val();
          window.location.href = "delete.php?id="+id;
        });

    </script>

</body>

</html>