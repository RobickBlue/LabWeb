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
    <link rel="stylesheet" type="text/css" href="..\css\estilosignup.css">

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
        <div class="container">
           <div class="row">
             <div class="col-md-3"></div>
             <div class="col-md-6">
          			<div class="cont">
          				<h2>Regístrate</h2>
          				<form action="controlador.php?accion=signup" method="post">
                        <label>Nombre</label>
          					<input id="nombre" name="nombre" type="text" size="25" required/>
                        <label>Apellido</label>
          					<input id="apellido" name="apellido" type="text" size="25" required/>
          					<label>Usuario</label>
          					<input id="username" name="usuario" type="text" size="25" required/>
          					<label>Contraseña</label>
          					<input id="password" name="password" type="password" size="25" required/>
                        <button class="button" type="submit" value="signup">Regístrate</button>
          				</form>
          		</div>
           </div>
           <div class="col-md-3"></div>
           </div>
        </div>

    <footer>
    <?php include_once '_footer.php'; ?>
    </footer>
     </div>
    </body>
</html>
