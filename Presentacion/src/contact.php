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
    echo "Mensaje enviado. Gracias " . $nombre . ", le contactaremos en breve.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}
?>

<!DOCTYPE html>
<head>
    <title>Form submission</title>
</head>
<body>

<form action="" method="post">
    First Name: <input type="text" name="nombre" required><br>
    Last Name: <input type="text" name="apellido"><br>
    Email: <input type="text" name="email" required><br>
    Message:<br><textarea rows="5" name="mensaje" cols="30" required></textarea><br>
    <input type="submit" name="enviar" value="Enviar">
</form>

</body>
</html>