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
<!-- <link href="../bootstrap.css" rel="stylesheet" type="text/css" /> -->

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

</body>
</html>

<?php	
/*$criterio = $_POST['criterio'];*/
$query_movimiento = ("SELECT * FROM registro ORDER BY fecha DESC");/*WHERE  descripcion = '".$criterio."' */
// $movimiento = mysql_query($query_movimiento) or die ( "Error en query: $sql, el error  es: " . mysql_error() );//(mysql_error());
// $row_movimiento = mysql_fetch_assoc($movimiento);
$des = mysql_query($query_movimiento) or die ( "Error en query: $sql, el error  es: " . mysql_error() );//(mysql_error());
$row_des = mysql_fetch_assoc($des);
$totalRows_movimiento = mysql_num_rows($des);

?>


<center>
<h2>Inventario General</h2>
<table style="border:1px #FF0000; color:#000000; width:990px; text-align:center;">
<tr style="background:#FFD700;">
	<td>Articulo</td>
	<td>Tipo</td>
	<!-- <td>Serial</td> -->
	<td>Observacion</td>
	<td>Unidades</td>
<!-- 	<td>Garantia</td> -->
<!-- 	<td>Direccion</td> -->
	<td>Fecha</td>
 	<td>Accion</td> 
		
	
</tr>
    <?php do { ?>
	<tr bgcolor='#FFFACD'>
	  <td><?php echo $row_des['descripcion']; ?></td>
	  <td><?php echo $row_des['tipo']; ?></td>
<!-- 	  <td><?php echo $row_des['serial']; ?></td> -->
	  <td><?php echo $row_des['obser']; ?></td>
	  <td><?php echo $row_des['unidades']; ?></td>
<!-- 	  <td><?php echo $row_des['garantia']; ?></td> -->
<!-- 	  <td><?php echo $row_des['dir']; ?></td> -->
	  <td><?php echo $row_des['fecha']; ?></td>
 	  <td><a class="btn btn-primary" href="update.php?serial=<?php echo $row_des['serial']; ?>">Modificar</a> </td>
	  	  
	  
	</tr>
	
	<?php } while ($row_des= mysql_fetch_assoc($des)); ?>
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>

<!-- 	    <td bgcolor='#FFD700'><label><b>unidades Actual:</b></label></td>
		<td style="background:#FFFACD;"><b><?php /*echo $totalRows_movimiento['unidades']; */?></b></td>
 -->	</tr>

</table>
</center>

<?php mysql_free_result($des); ?>
