<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../conectar.php'; ?>
<?php require '../info.php'; 
 require '../select.php'; 
?>

<?php
//resives el serial del equipo
$serial= $_GET['serial'];
  print('<meta http-equiv="refresh" content="0; URL=javascript:history.back()">');

//******************************************************************************

$error = array(); //Validar Campos

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formulario")) {

$tipo        = $_POST['tipo'];
$descripcion =  $_POST['descripcion'];
$observacion =  $_POST['obser'];
$unidades    =  $_POST['unidades'];
$serial      =  $_POST['serial'];

//Primera Letra de cada palabra en Mayusculas
$descripcion = ucwords($descripcion);
$observacion = ucwords($observacion);
//$serial = $_POST['serial'];
$cliente = ucwords($cliente);
//$dir = ucwords($dir);
$des = ucwords($des);//Primera Letra de cada palabra en Mayusculas

if(empty($_POST['tipo'])){ //Validar Campos
$error['tipo']= 'El Campo Tipo No Se Puede Dejar Vacio';
}
if(empty($_POST['descripcion'])){
$error['descripcion']= 'El Campo Descripcion No Se Puede Dejar Vacio';
}

if(empty($_POST['unidades'])){
$error['unidades']= 'El Campo Unidades No Se Puede Dejar Vacio';
}

if(!$error){ //Validar Campos
 // $serial=uniqid(); 
  $SQL = "UPDATE registro set descripcion = '$descripcion', tipo = '$tipo', unidades = '$unidades', obser = '$observacion' WHERE serial = '$serial' ";
//  echo "$SQL";
       
  $Result = mysql_query($SQL) or die ( "<center>El Equipo Ya Existe!!! <br><<a href=\"movimiento_compu2.php\">Regresar</a></center>");//or die(mysql_error());
echo "<script language='JavaScript'> alert('La operacion ha resultado satisfactoria'); </script>";
print('<meta http-equiv="refresh" content="0; URL=movimiento_compu2.php">');
 //header("Location: movimiento_compu2.php");

}
} //Validar Campos
?>