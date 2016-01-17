<?php
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
    <link rel="stylesheet" type="text/css" href="..\css\estilosconfig.css">
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
      <div class="container">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                 <div class="cont">
                    <h2>Modificar Datos</h2>
                    <form action="controlador.php?accion=config" method="post">
                              <div class="col-md-6" id="col1">

                       <label>Nombre</label>
                       <input id="nombre" name="nombre" type="text" size="25" value="<?php echo $_SESSION['nombre']; ?>"/>
                       <label>Usuario</label>
                       <input id="username" name="usuario" type="text" size="25" value="<?php echo $_SESSION['valid_user']; ?>" disabled/>
                    </div>
                    <div class="col-md-6" id="col2">
                       <label>Apellido</label>
                       <input id="apellido" name="apellido" type="text" size="25" value="<?php echo $_SESSION['apellido']; ?>"/>

                       <label>Contraseña</label>
                       <input id="password" name="password" type="password" size="25" value="<?php echo $_SESSION['password']; ?>"/>
                    </div>
                        <button class="button" type="submit" name ="eliminar" value="eliminar" id="eliminar">Borrar cuenta</button>
                       <button class="button" type="submit" name="modificar" value="modificar" id="modificar">Modificar</button>
                    </form>
              </div>
          </div>
          <div class="col-md-2"></div>
          </div>
      </div>

   <footer>
      <?php include_once '_footer.php'; ?>
   </footer>

</div>
</body>
</html>
