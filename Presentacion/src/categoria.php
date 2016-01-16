<?php include("bean.php"); ?>
<html>
    <head>

    </head>
    <body>
    <?php

    $Bean = bean::getInstance();
    if (isset($_GET['categoria'])) {
        echo 'hola id= '.$_GET['categoria'];
        while ($productos = $Bean->getProductos($_GET['categoria'])) {
            $id = $productos['idcategoria'];
            $imagen = $productos['imagen'];
            $nombre = $productos['nombre'];
            $precio = $productos['precio'];
    ?>
    <div class="producto">;
        <img src="<?php echo $imagen ?>">;
        <a href="producto.php?id=<?php echo $id; ?>"><?php echo $nombre; ?></a>;
        <div class="precio"><?php echo $precio; ?></div>
    </div>;
    <?php
        }
    }
    else {
        header('Location: login.php');
    }
    ?>
    </body>
</html>
