<?php
require 'bean.php';
include_once 'carrito.php';
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
} else if (isset($_GET['accion']) and strcmp($_GET['accion'], "addProducto") == 0){
    $carrito = new carrito();
    $producto = array(
        "id"			=>		$_POST['id'],
        "cantidad"		=>		$_POST['cantidad'],
        "precio"		=>		$_POST['precio'],
        "nombre"		=>		$_POST['nombre']
    );
    $carrito->add($producto);
    header('Location: cesta.php');

} else if (isset($_GET['accion']) and strcmp($_GET['accion'], "modificarCesta") == 0) {
    $carrito = new carrito();
    if (isset($_POST['Eliminar'])) {
        $carrito->remove_producto($_POST['id']);
    } else if (isset($_POST['Modificar'])) {
        $carrito->modificar_cantidad($_POST['id'], $_POST['cantidad']);
    }
    header('Location: cesta.php');
} else if (isset($_GET['accion']) and strcmp($_GET['accion'], "confirmar") == 0){
    header('Location: checkout.php');

} else if (isset($_GET['accion']) and strcmp($_GET['accion'], "checkout") == 0){
    $carrito = new carrito();
    if (isset($_POST['direccion']) && trim($_POST['direccion']) != "") {
        try {
            $Beans->realizarPedido($carrito->get_content(), $_POST['direccion']);
            header('Location: index.php');
        } catch (Exception $e) {
            header("Location: checkout.php?error=".$e->getMessage());
        }
    } else {
        header("Location: checkout.php?error=La direccion no puede estar vacia");
    }


} else if (isset($_GET['accion']) and strcmp($_GET['accion'], "listarCarrito") == 0){
    header('Location: cesta.php');
} else if (isset($_GET['accion']) and strcmp($_GET['accion'], "buscar") == 0) {
    if (isset($_POST['textBuscar']) && trim($_POST['textBuscar']) != "") {
        header('Location: resultado.php?q='.$_POST['textBuscar']);
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

function eliminarSesion(){
   Unset($_SESSION['valid_user']);
   Unset($_SESSION['password']);
   Unset($_SESSION['nombre']);
   Unset($_SESSION['apellido']);
   Unset($_SESSION['carrito']);
   Session_destroy();
   header('Location: index.php');
}

?>
