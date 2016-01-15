<?php
    include("bean.php");
    $Bean = bean::getInstance();
    if (isset($_GET['categoria'])) {
        while ($productos = $Bean->getProductos( $_GET['categoria'])) {
            $id = $productos['id'];
            $imagen = $productos['imagen'];
            $nombre = $productos['nombre'];
            $desc = $productos['descripcion'];
            $precio = $productos['precio'];
            $stock = $productos['stock'];
            echo "<div class='producto'>";
            echo "<img src='".$imagen."'>";
            echo "<p>".$nombre."</p>";
            echo "<p>".$desc."</p>";
            echo "</div>";
        }
    }
    else {
        header('Location: login.php');
    }
?>