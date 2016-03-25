<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../conectar.php'; ?>
<?php require '../info.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INCES</title>

<link href="../css/menu.css" rel="stylesheet" type="text/css" />
<link href="../css/form2.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="principal">

  <div id="cabecera"> 
    <div id="titulo"> 
      <div id="logout">
        <?php 
        echo "Bienvenido <b>".$_SESSION['s_username']."</b> "; 
        ?>
      </div>
    </div>
  </div>
  
<div id="menu">
<ul>
   <li><a href="/Compu-Soft/index.php">Inicio</a> 
    </li>
    <li><a href="#">Registro</a> 
      <ul>
    <li><a href="/Compu-Soft/Registros/nuevo_ingreso.php">Ingreso De Articulos</a></li>
    <li><a href="/Compu-Soft/Registros/nueva_salida.php">Salida De Articulos</a></li>
    <li><a href="/Compu-Soft/Buscar/buscar_art.php">Buscar Articulos</a></li>
        </ul>
    </li>
  <li><a href="#">Reportes</a> 
      <ul>
      <li><a href="/Compu-Soft/Movimientos/movimiento_compu2.php">Inventario General</a></li>
      <li><a href="/Compu-Soft/Movimientos/movimiento_entrada.php">Entrada</a></li>
      <li><a href="/Compu-Soft/Movimientos/movimiento_salida.php">Salida</a></li>
       </ul>
    </li>
  <li><a href="#">Configuracion</a> 
      <ul>
        <li><a href="/Compu-Soft/Registros/r_articulos.php">Nuevo Articulo</a></li> 
        <li><a href="/Compu-Soft/Registros/tipo.php">Nuevo Tipo</a></li>
        <li><a href="/Compu-Soft/Borrar/borrar_tipo.php">Borrar Tipo</a></li>
        <li><a href="/Compu-Soft/Borrar/borrar_movimiento.php">Borrar Movimientos</a></li>
        <li><a href="/Compu-Soft/Borrar/borrar_art.php">Borrar Articulos</a></li>
        <li><a href="/Compu-Soft/Backup/backup.php">Copia de Seguridad</a></li>
        </ul>
    </li>
  <li><a href="/Compu-Soft/creditos.php">Acerca De</a> 
    </li>


    </li>
    <li><a href="/Compu-Soft/logout.php" onclick="if(confirm('&iquest;Esta seguro que desea cerrar la sesi&oacute;n?')) return true;  else return false;" >Salir</a>  
    </li>
    </ul>
</div>
</div> <!-- fin menu -->
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
// declarando las variables provenientes desde abono.php
$modelo = $_POST['modelo'];
$qty = $_POST['qty'];
$tipo = $_POST['tipo'];
$publico = $_POST['publico'];
$pago = $_POST['pago'];
$fecha = $_POST['fecha'];
$abono = $_POST['abono'];
$serial = $_POST['serial'];
$cli = $_POST['cli'];
$tel = $_POST['tel'];

//$horas_diferencia=0;
//$tiempo=time() + ($horas_diferencia * 60 *60);
//$fecha = date('Y-m-d H:i:s',$tiempo);   

// $ini es un contador, iniciado en cero, inserta los datos ingresados en abono.php hasta que sea igual al numero de cantidades.
$ini = 0 ;

    $publico = $publico[$ini];
	$pago = $pago[$ini];
	$modelo = $modelo[$ini];
	$qty = $qty[$ini];
	$fecha = $fecha[$ini];
	$abono = $abono[$ini];
	$serial = $serial[$ini];
	$cli = ucwords($cli[$ini]);//Primera Letra de cada palabra en Mayusculas
    $tel = $tel[$ini];
	
//$des = ucwords($des[$ini]);//Primera Letra de cada palabra en Mayusculas
//$articulo = ucwords($articulo);//Primera Letra de cada palabra en Mayusculas
	
$sql_insert = "INSERT INTO mov_servicios (serv_cli, serv_tel, serv_tipo, serv_pub,  serv_pago, serv_fecha, serv_modelo, serv_abono, serv_serial) VALUES ('$cli', '$tel', '$tipo', '$publico', '$pago', '$fecha', '$modelo', '$abono', '$serial')";
$sql_ganancia = "UPDATE mov_servicios, equipos SET ganancia = '$publico' - base WHERE serv_fecha = '$fecha' AND modelo = '$modelo'";
$sql_qty = "UPDATE equipos SET cantidad = cantidad - '$qty' WHERE modelo = '$modelo'";
$sql_base = "UPDATE equipos, mov_servicios SET base = base - '$publico' + '$publico' WHERE serv_modelo = '$modelo'";
$sql_pago = "UPDATE mov_servicios SET ganancia = ganancia - '$pago' WHERE serv_fecha = '$fecha'";
$sql_abono = "UPDATE mov_servicios SET serv_pub = serv_pub - '$abono' WHERE serv_modelo = '$modelo' AND serv_serial = '$serial'";
//$sql_mora = "UPDATE servicios SET g_total = g_total + '$publico' - '$pago'";
	                                
	mysql_query($sql_insert) or die(mysql_error(). " Query: " . $sql_insert);
	mysql_query($sql_ganancia)or die(mysql_error(). " Query: " . $sql_ganancia);
	mysql_query($sql_qty)or die(mysql_error(). " Query: " . $sql_qty);
	mysql_query($sql_base)or die(mysql_error(). " Query: " . $sql_base);
	mysql_query($sql_pago)or die(mysql_error(). " Query: " . $sql_pago);
	mysql_query($sql_abono)or die(mysql_error(). " Query: " . $sql_abono);
	//mysql_query($sql_mora)or die(mysql_error(). " Query: " . $sql_mora);
	$ini++ ;
	
	echo '<div align="center">Lo operacion ha resultado satisfactoria</div>';

?>

</body>
</html>



