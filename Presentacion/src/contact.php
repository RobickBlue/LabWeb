<?php
if(isset($_POST['enviar'])){
    $destinatario = "email@example.com"; // email que recibira el mensaje
    $remitente = $_POST['email']; // email del que rellena el formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tema = "Formulario contacto";
    $tema_remitente = "Copia de tu mensaje";
    $mensaje = $nombre . " " . $apellido . " escribió lo siguiente:" . "\n\n" . $_POST['mensaje'];
    $mensaje2 = "Here is a copy of your message " . $nombre . "\n\n" . $_POST['mensaje'];

    $headers = "De:" . $remitente;
    $headers2 = "De:" . $destinatario;
    mail($destinatario,$tema,$mensaje,$headers);
    mail($remitente,$tema_remitente,$mensaje2,$headers2); // envia una copia al remitente
    //echo "Mensaje enviado. Gracias " . $nombre . ", le contactaremos en breve.";

    // You can also use header('Location: thank_you.php'); to redirect to another page.
}
?>

<!DOCTYPE html>
<head>
    <title>Form submission</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="..\css\estilos.css">
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
          <div class="col-md-3"></div>
          <div class="col-md-6">
             <div class="cont">
               <form action="" method="post">
                 First Name: <input type="text" name="nombre" required><br>
                 Last Name: <input type="text" name="apellido"><br>
                 Email: <input type="text" name="email" required><br>
                 Message:<br><textarea rows="5" name="mensaje" cols="30" required></textarea><br>
                 <input type="submit" name="enviar" value="Enviar">

                 <?php if(isset($_POST['enviar'])){
                   echo "\nMensaje enviado. Gracias " . $nombre . ", le contactaremos en breve.";
                 } ?>
               </form>
             </div>
           </div>
           <div class="col-md-3"></div>
         </div>
       </div>



  <footer>
  <?php include_once '_footer.php'; ?>
  </footer>

  </body>
</html>
