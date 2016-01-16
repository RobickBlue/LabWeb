<?php include("bean.php") ?>
<?php if (isset($_GET['id_prod'])) { ?>
<html>
<head>
</head>
    <body>
        <div class="producto">
            <?php
            $idProd = $_GET['id_prod'];
            $bean = bean::getInstance();
            while($bean->getProducto($idProd)){
                $id=$idProd['id'];
                $imagen=$idProd['imagen'];
                $nombre=$idProd['nombre'];
                $desc=$idProd['descripcion'];
                $precio=$idProd['precio'];
                $stock=$idProd['stock'];

                ?>
                <h2>Ref. articulo:<?php echo $id?></h2>
                <h2><?php echo $nombre?></h2>
                <img src="<?php echo $imagen?>" width="600 px" height="600 px"   >
                <p><strong>Precio:</strong><?php echo $precio?> €</p>
                <form action="carrito.php" method="post" name="compra">
                    <input name="id_txt" type="hidden" value="<?php echo $id ?>" />
                    <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
                    <input name="precio" type="hidden" value="<?php echo $precio ?>" />
                    <input name="cantidad" type="hidden" value="1" />
                    <input name="enStock" type="hidden" value="<?php echo $stock ?>" />
                    <?php if ($stock>0){?>
                        <input name="Comprar" type="submit" value="Añadir al carrito" />
                    <?php }
                    else{
                        echo "<p>Este Producto esta agotado, pero si le interesa pongase en contacto con nosotros.</p>";
                    }
                    ?>
                </form>
                <p><h3>Descripción:</h3>
                <p><?php echo $desc?></p>

        </div>

        <?php
        }
        ?>


    </body>
</html>
<?php
}
else {
    header('Location: index.php');
}
?>
