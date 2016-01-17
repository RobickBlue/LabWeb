<?php
require 'bean.php';
header("Content-Type: text/html;charset=utf-8");
if(!isset($_SESSION))
{
    session_start();
}

$Beans = bean::getInstance();

if (isset($_GET['id_categoria'])) {
    //$Beans-> setCategoria($_POST['id_categoria']);
    header('Location: categoria.php?categoria='.$_GET['id_categoria'].'');
}
else if (isset($_POST['id_producto'])) {

}
else if (isset($_POST['articulo'])) {
    $Beans->insertaProdCarrito($_POST['articulo']);
}
else if (isset($_POST['gestionCarrito'])) {
    header('Location: carrito.php');
}
else if (isset($_POST['registro'])) {
    header('Location: registro.php');
}
else if(isset($_GET['accion']) and strcmp ($_GET['accion'], "signup") == 0){
   $Beans->registarUsuario($_POST['nombre'],$_POST['apellido'],$_POST['usuario'],$_POST['password']);

   header('Location: index.php');

}else if(isset($_GET['accion']) and strcmp ($_GET['accion'], "login") == 0){
   $dadesUsuario=$Beans->validaUsuari($_POST['usuario'], $_POST['password']);
   if ($dadesUsuario) {
      $Beans->setUsuari($dadesUsuario);
   }else{
   }
   header('Location: index.php');

}else if(isset($_GET['accion']) and strcmp ($_GET['accion'], "config") == 0){
   if(isset($_POST['eliminar'])){
      $Beans->eliminarUsuario($_SESSION['valid_user']);
      eliminarSesion();
   }else if(isset($_POST['modificar'])){
      $Beans->modificarUsuario($_POST['nombre'],$_POST['apellido'],$_SESSION['valid_user'],$_POST['password']);
      header('Location: index.php');
   }
}else if(isset($_GET['accion']) and strcmp ($_GET['accion'], "logout") == 0){
    eliminarSesion();
}

function eliminarSesion(){
   Unset($_SESSION['valid_user']);
   Unset($_SESSION['password']);
   Unset($_SESSION['nombre']);
   Unset($_SESSION['apellido']);
   Session_destroy();
   header('Location: index.php');
}

?>
