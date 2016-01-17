<?php
require 'carrito.php';
session_start();
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
                    if($carro)
                    {
                        foreach($carro as $producto)
                        {
                            echo $producto["id"];
                            echo "<br />";
                            echo $producto["cantidad"];
                            echo "<br />";
                            echo $producto["precio"];
                            echo "<br />";
                            echo $producto["nombre"];
                            echo "<br />";
                        }
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