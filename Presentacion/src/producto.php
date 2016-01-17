<!Doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>CompTronics</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="..\css\estilos.css">
    <link rel="stylesheet" type="text/css" href="..\css\estilosproducto.css">
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
            <?php
               if (isset($_GET['id'])) {
                  $idProd = $_GET['id'];
                  $bean = bean::getInstance();
                  $productos = $bean->getProducto($idProd);
                     foreach($productos as $producto){
                        $id=$producto['IDPRODUCTO'];
                        $imagen=$producto['IMAGEN'];
                        $nombre=$producto['NOMBRE'];
                        $desc=$producto['DESCRIPCION'];
                        $precio=$producto['PRECIO'];
                        $stock=$producto['STOCK'];

                        ?>
         <div class="container">
            <div class="row">
               <div class="col-md-4"> <img class="imgproduc" src="<?php echo $imagen?>" width="100%" height="100%;"/></div>
               <div class="col-md-8">
               <p class="h2">Ref. articulo:<?php echo $id?></p>
               <p class="h2"><?php echo $nombre?></p>
               <p class="precio" ><strong>Precio:</strong><?php echo $precio?> €</p>
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
                    }?>
               </form>

               <p><h3>Descripción:</h3>
               <p id="descripcion"><?php echo $desc?></p>
             </div>
          </div>
       </div>
       <?php } ?>
       <?php
       }
       else {
          header('Location: index.php');
       }
       ?>
    </div>

</section>

        <footer>
           <?php include_once '_footer.php'; ?>
        </footer>
     </div>
    </body>
</html>
