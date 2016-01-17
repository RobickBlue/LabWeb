<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CompTronics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="..\css\estilos.css">
    <script src="..\js\jquery-1.11.3.min.js"></script>
    <script src="..\js\funciones.js"></script>
  </head>

  <body>
    <header>
    <?php include_once '_header.php'; ?>
    </header>

    <nav>
    <?php include_once '_nav.php'; ?>
    </nav>

        <div id="wrapper">

                <section>
                  <div class="container">
                    <div class="row" id="section">
                      <div class="col-md-4" id="arduino"><a href="producto.php?idProducto=p1"><img src="..\img\arduino.png" width="100%" height="100%"></a></div>
                      <div class="col-md-4" id="nanode"><a href="producto.php?idProducto=p2"><img src="..\img\nanode.png" width=100% height=100%></a></div>
                      <div class="col-md-4" id="beagle"><a href="producto.php?idProducto=p3"><img src="..\img\beaglebone.png" width=100% height=100%></div>
                    </div>
                    <div class="row" id="section">
                      <div class="col-md-4" id="arduino"><a href="producto.php?idProducto=p4"><img src="..\img\arduino.png" width="100%" height="100%"></a></div>
                      <div class="col-md-4" id="nanode"><a href="producto.php?idProducto=p5"><img src="..\img\nanode.png" width=100% height=100%></a></div>
                      <div class="col-md-4" id="beagle"><a href="producto.php?idProducto=p6"><img src="..\img\beaglebone.png" width=100% height=100%></a></div>
                    </div>
                  <div>
                </section>
      <footer>
      <?php include_once '_footer.php'; ?>
      </footer>
        </div>
      </body>
</html>
