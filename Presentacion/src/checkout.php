<?php
require 'carrito.php';
if(!isset($_SESSION))
{
    session_start();
}

?>
<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>CompTronics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="..\css\estilos.css">
    <link rel="stylesheet" type="text/css" href="..\css\estilocatalogo.css">

    <script src="..\js\jquery-1.11.3.min.js"></script>
    <script src="..\js\funciones.js"></script>
</head>

<body>
<header>
    <?php include_once '_header.php'; ?>
</header>

<nav>
    <?php
    if(!isset($_SESSION['valid_user'])){
        include '_nav.php';
    }else{
        include '_navLogin.php';
    }?>
</nav>
<div id="wrapper">
    <section>
        <div class="producto">
            <div class="container">
                <div class="row">
                    <?php

                    $carrito = new carrito();
                    $productos = $carrito->get_content();
                    if($carrito)
                    {
                        foreach($productos as $producto)
                        {
                            echo "<p>Nombre:".$producto["nombre"]."</p>";
                            echo "<br />";
                            echo "<p>Referencia: ".$producto["id"]."</p>";
                            echo "<br />";
                            echo "<p>Precio: ".$producto["precio"]*$producto['cantidad']."</p>";
                            echo "<br />";
                            echo "<p>cantidad:".$producto['cantidad']."</p>";
                            echo "--------------------------";
                        }
                        echo "<p>Precio: ".$carrito->precio_total()."</p>";
                        ?>
                        <form action="controlador.php?accion=checkout" method="post" name="compra">
                            <input name="Confirmar" type="submit" value="Confirmar" />
                        </form>
                    <?php
                    }
                    else {
                        header('Location: index.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <?php include_once '_footer.php'; ?>
    </footer>

</div>
</body>
</html>