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

    public function setUsuari($value) {
        $_SESSION['valid_user'] = $value;
    }

    public function getUsuari() {
        return $_SESSION['valid_user'];
    }

    public function validaUsuari($usuari, $contrasenya) {
        $BD = conexion::getInstance();
        return $BD->validaUsuari($usuari, $contrasenya);
    }

    public function getProductos($idCategoria) {
        $BD = conexion::getInstance();
        return $BD->getProductos($idCategoria);
    }

    public function getCategorias(){
        $BD = conexion::getInstance();
        return $BD->getCategorias();
    }
}
?>
