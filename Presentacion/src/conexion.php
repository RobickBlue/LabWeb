<?php
header("Content-Type: text/html;charset=utf-8");
if(!isset($_SESSION))
{
    session_start();
}

class conexion {
    private $dbhost = "localhost";  // host
    private $dbuser = "root";  // usuario
    private $dbpass = "";  // password
    private $dbname = "tienda";  // base de datos
    private  $conn;    // identificador de la conexión
    private static $instancia;

    private function __construct(){
        $this->conecta();
        mysqli_query($this->conn,"SET NAMES 'utf8'");
    }

    public static function getInstance(){
        if (!(self::$instancia instanceof self)){
            self::$instancia=new self();
        }
        return self::$instancia;
    }
    public function conecta(){
        $this->conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass,$this->dbname);
        if (mysqli_connect_errno()) {
            die('Error al conectar con mysql');
        }
    }

    public function consulta($query){
        $resultado = array();

        $result = mysqli_query($this->conn,$query);
        if (!$result) {
            die('Error query BD:' . mysqli_error());
        }else{
            $num_rows= mysqli_num_rows($result);
            for($i=0;$i<$num_rows;$i++){
                $row = mysqli_fetch_assoc($result);
                array_push($resultado, $row);
            }
        }
        return $resultado;
    }

    public function modificar($query){

      $result = mysqli_query($this->conn,$query);
      if (!$result) {
           die('Error query BD:' . mysqli_error());
      }
  }

    public function validaUsuari($usuari, $contrasenya){
      $resultado = array();
        $result = mysqli_query($this->conn,"select * from usuario where idusuario = '".$usuari."' and password = '".$contrasenya."'");
        if (!$result) {
            die('Error query BD:' . mysqli_error());
        }else{
            $num_rows = mysqli_num_rows($result);
            if($num_rows > 0){
              $row = mysqli_fetch_assoc($result);
            }
        }
       return $row;
    }

    public function getCategorias() {
        return $this->consulta("select * from categoria");
    }

    public function getProductos($categoria) {
        return $this->consulta("select * from producto where idcategoria='".$categoria."'");
    }

    public function getProducto($producto) {
        return $this->consulta("select * from producto where idproducto='".$producto."'");
    }

    public function desconecta(){
        mysqli_close($this->conn);
    }

    public function registarUsuario($nom, $apell, $usuari, $contrasenya){
        $result = mysqli_query($this->conn,"insert into usuario (nombre, apellido,idusuario,password) values ('".$nom."','".$apell."','".$usuari."' ,  '".$contrasenya."')");
      $_SESSION['valid_user'] = $usuari;
      $_SESSION['nombre'] = $nom;
      $_SESSION['apellido'] = $apell;
      $_SESSION['password'] = $contrasenya;
    }

    public function eliminarUsuario($user){
     return $this->consulta("delete from usuario where idusuario='".$user."'");
  }
  public function modificarUsuario($nom, $apellido, $user, $pw){
    $this->modificar("update usuario set nombre='".$nom."', apellido='".$apellido."', password='".$pw."' where idusuario='".$user."'");
    $_SESSION['valid_user'] = $user;
    $_SESSION['nombre'] = $nom;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['password'] = $pw;
  }
}
?>
