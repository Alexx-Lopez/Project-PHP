<?php
if(isset($_POST['btn_guardar']))
{
  //se crea una variable POST para guardar el estado
  $_POST['NUEVO']=true;

  //banderas
  $bandera=true;
  $bandera2=true;

  $campos="";

  if(verificar_empty('name'))
  {
    $bandera=false;
    $campos.="Nombre de usuario,";
  }else
  {
    $_SESSION['res_name']=$_POST['name'];
  }

  if(verificar_empty('pass'))
  {
    $bandera=false;
    $campos.="Contraseña, ";
  }else
  {
    $_SESSION['res_pass']=$_POST['pass'];
  }

  if(verificar_empty('type'))
  {
    $bandera=false;
    $campos.="Tipo de usuario, ";
  }else
  {
    $_SESSION['res_type']=$_POST['type'];
  }

  if($bandera==false)
  {
    echo "
    <script>
      setTimeout(function(){
        Mensaje_Error(\"Error, los campos: <?php echo $campos; ?> se encuentran vacios\");
      },1000);
    </script>";

  }else
  {
    //se procede a analizar los textos de los campos que respeten ciertas normas
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $type=$_POST['type'];
    $id_type;

    if(!texto($name))
    {
      $bandera2=false;
    }

    //en el caso todo cumpla con lo estipulado se procede a realizar el ingreso
    if($bandera2){
      $objeto_con=new Conexion();
      $objeto_con->Connect();

      //primero se extrae el id del tipo de usuario seleccionado
      $sql="SELECT id_tipo_usuario from tipo_usuario WHERE categoria_usuario='$type'";

      $result = $objeto_con->conexion->query($sql);

      if ($result->num_rows > 0)
      {
        while($row = mysqli_fetch_assoc($result)) {
          $id_type=$row["id_tipo_usuario"];
        }
      }

      //se procede a realizar la insercion
      $sql = "INSERT INTO usuario VALUES(NULL,'$name','$pass',$id_type)";

      if ($objeto_con->conexion->query($sql) === TRUE) {
        //Se procede a colocar null las variables POST
        $_POST['name']=NULL;
        $_POST['pass']=NULL;
        $_POST['type']=NULL;

        echo "
          <script>
            setTimeout(function(){
              Mensaje_Succes('Usuario Ingresado');
            },1000);
          </script>";
      } else {
        echo "
          <script>
            setTimeout(function(){
              Mensaje_Error(\"Error: \".$sql.\"<br>\".$conexion->error);
            },1000);
          </script>";
      }

      $objeto_con->Disconnect();
    }
  }
}
?>
