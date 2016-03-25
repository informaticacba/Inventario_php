<?php require '../conectar.php'; ?>
<?php
	//DATOS DEL PROGRAMA==================================
	$CLIENTE= "INCES" ;
	$SISTEMA = "- Sistema De Inventario - " ;
	$VERSION = "Version 1.0" ;
	//========================================================
?>
<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../conectar.php'; ?>
<?php //require '../menu.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php echo "$CLIENTE $SISTEMA $VERSION"; ?></title>
	
	<link rel="stylesheet" type="text/css" href="../DataTables-1.10.5/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../DataTables-1.10.5/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../DataTables-1.10.5/examples/resources/demo.css">
	<link href="../css/menu.css" rel="stylesheet" type="text/css" />
	<link href="../css/form2.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" language="javascript" src="../DataTables-1.10.5/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables-1.10.5/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables-1.10.5/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables-1.10.5/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() { 
	    $('#example').dataTable( {
        "order": [[ 4, "desc" ]]
    } );
} );

	</script>
</head>

<body><!-- class="dt-example" -->

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


	<div class="container">	<!-- contenedor de tabla de busqueda -->
		<section>

<?php
 //comenzamos la consulta 
  $consulta = "SELECT * FROM registro ORDER BY fecha DESC";
  //$consulta = "SELECT * FROM registro ";
  $resultado = mysql_query($consulta) or die(mysql_error());

?>

<h2 align="center">Buscar Articulo</h2>
			<table id="example" class="display" cellspacing="0" width="100%"> 
			<br><br>
				<thead>
					<tr style="background:#FFD700;">
						<th>Tipo</th>						
						<th>Descripcion</th>
						<!-- <th>Serial</th>-->						
						<th>Observacion</th>
						<!-- <th>Cliente</th> -->
						<!-- <th>Telefono</th> -->
						<th>Unidades</th>
						<!-- <th>Precio</th> -->
						<th>Fecha Ingreso</th>
					</tr>
				</thead>

				<tfoot>
					<tr style="background:#FFD700;">
						<th>Tipo</th>						
						<th>Descripcion</th>
						<!-- <th>Serial</th> -->
						<th>Observacion</th>
						<!-- <th>Cliente</th> -->
						<!-- <th>Telefono</th> -->
						<th>Unidades</th>
						<!-- <th>Precio</th> -->
						<th>Fecha Ingreso</th>
					</tr>
				</tfoot>

				<tbody>
					
						<?php  
						  //mostramos los resultados
						     while($row = mysql_fetch_array($resultado)){
						     echo "<tr bgcolor='#FFFACD'>";
							 //echo " 		<td><a style=\"text-decoration:underline;cursor:pointer;\" onclick=\"pedirDatos('".$row['cli_id']."')\">".$row['cli_id']."</a></td>";
						    echo " 		<td>".stripslashes($row["tipo"])."</td>";
						    echo " 		<td>".stripslashes($row["descripcion"])."</td>";
						//	 echo " 		<td>".stripslashes($row["serial"])."</td>";
							 echo " 		<td>".stripslashes($row["obser"])."</td>";
						//	 echo " 		<td>".stripslashes($row["cliente"])."</td>";
						//	 echo " 		<td>".stripslashes($row["dir"])."</td>";
						//	 echo " 		<td>".stripslashes($row["tel"])."</td>";
						//	 echo " 		<td>".stripslashes($row["garantia"])."</td>";
							 echo " 		<td>".stripslashes($row["unidades"])."</td>";
						//	 echo " 		<td>".stripslashes($row["publico"])."</td>";
							 echo " 		<td>".stripslashes($row["fecha"])."</td>";
						     echo "</tr>";
							 //echo "<br />";
							 
						  }
						?>

					
				</tbody>
			</table>

			</div>
		</section>
	</div>

				</div>
			</div>
		</div>
	</section>
</body>
</html>