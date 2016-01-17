<?php
if(!isset($_SESSION))
{
    session_start();
}
require 'conexion.php';
class bean{

    private static $conn;

    private function __construct(){
    }

    public static function getInstance(){
        if (!(self::$conn instanceof self)){
            self::$conn=new self();
        }
        return self::$conn;
    }

    public function setUsuari($row) {
        $_SESSION['valid_user'] = $row['IDUSUARIO'];
        $_SESSION['nombre'] = $row['NOMBRE'];
        $_SESSION['apellido'] = $row['APELLIDO'];
        $_SESSION['password'] = $row['PASSWORD'];
    }

    public function getUsuari() {
        return $_SESSION['valid_user'];
    }

    public function validaUsuari($usuari, $contrasenya) {
        $BD = conexion::getInstance();
        return $BD->validaUsuari($usuari, $contrasenya);
    }

    public function getProducto($idProducto) {
        $BD = conexion::getInstance();
        return $BD->getProducto($idProducto);
    }

    public function getProductos($idCategoria) {
        $BD = conexion::getInstance();
        return $BD->getProductos($idCategoria);
    }

    public function getCategorias(){
        $BD = conexion::getInstance();
        return $BD->getCategorias();
    }

    public function registarUsuario($nom, $apellido, $user, $pw){
      $BD = conexion::getInstance();
      $BD->registarUsuario($nom, $apellido, $user, $pw);
   }

   public function eliminarUsuario($user){
     $BD = conexion::getInstance();
     $BD->eliminarUsuario($user);
  }

  public function modificarUsuario($nom, $apellido, $user, $pw){
    $BD = conexion::getInstance();
    $BD->modificarUsuario($nom, $apellido, $user, $pw);
  }

  public function realizarPedido($carrito, $direccion)
  {
    $BD = conexion::getInstance();
    $BD->realizarPedido($carrito, $direccion);
  }

  public function buscarProductos($texto) {
    $BD = conexion::getInstance();
    return $BD->buscarProductos($texto);
  }

}
?>
