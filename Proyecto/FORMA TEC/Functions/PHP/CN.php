<?php
class Conexion
{
  private $servername;
  private $username;
  private $password;
  private $database;
  public $conexion;

  function __construct()
  {
    $this->servername= "127.0.0.1:33060";
    $this->username= "root";
    $this->password = "";
    $this->database= "forma_tec";
  }

  function Connect()
  {
    $this->conexion=mysqli_connect("127.0.0.1:33060","root","$this->password","$this->database");

    if(!$this->conexion)
    {
      //echo "<p>Error al conectar a la base de datos</p>";
      echo "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Error al conectar a la base de datos</strong>.
            </div>";
    }else
    {
      //echo "<p>Conectado a la base de datos</p>";
    }
  }

  function Disconnect()
  {
    $this->conexion->close();
  }
}


?>
