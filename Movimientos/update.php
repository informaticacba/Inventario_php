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

// INICIO  construccion de la consulta -->
		  $comparar="SELECT * FROM registro WHERE serial='$serial'";
	      $result_celular = mysql_query($comparar)or die(mysql_error()); 
	      $options_celular = ''; 
	      $row_celular = mysql_fetch_array($result_celular);

// FIN  construccion de la consulta-->

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formulario")) {

$_POST['tipo']= trim($_POST['tipo']); //Trim, borrar espacios al inicio y final
$_POST['descripcion']= trim($_POST['descripcion']);
$_POST['obser']= trim($_POST['obser']);
$_POST['unidades']= trim($_POST['unidades']);
$_POST['serial']= trim($_POST['serial']);
$_POST['cliente']= trim($_POST['cliente']);




} //Validar Campos
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INCES</title>

<link href="../css/menu.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
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
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>

	<form method="POST" action="update_mod.php" name="formulario" id="formulario" autocomplete="off">
	<fieldset>
		<legend>Modificar</legend>

		<label><b>Descripcion:</b>
		<input value="<? echo $row_celular ['descripcion']?>" name="descripcion" type="text" /></label>

		<label><b>Tipo:</b>
    <? echo '<select name="tipo">'.$options_tipo2.'</select></label> ';?>
		<!-- <input value="<? //echo $row_celular ['tipo']?>" name="tipo" type="text" placeholder="Ingrese..."/></label> -->
		
		<input value="<? echo $row_celular ['serial']?>" name="serial" type="hidden" /></label>

		<label><b>Unidades:</b>
		<input value="<? echo $row_celular ['unidades'] ?>" name="unidades" type="number" placeholder="Ingrese..."/></label> 
		
       <label><b>Observacion:</b>
       <input value="<? echo $row_celular ['obser']?>" name="obser" type="text" placeholder="Ingrese..."/></label>
            
    <input value="<? echo date("Y-m-d h:i:s A"); ?>" name="fecha" type="hidden" /></label><br />
		<label for="enviar">
      <input type="submit" name="enviar" id="enviar" value="Actualizar" class="uno"/>  
    </label>
        
        <label for="borrar">        
          <input type="reset" name="borrar" id="borrar" value="Borrar Formulario" class="uno"/>
      </label>
        </fieldset>
    <input type="hidden" name="MM_insert" value="formulario" />
</form>


 
<?php if ($error) { //validar campos
  echo "$descripcion";
?>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
foreach ($error as $alerta) {
    echo "<script language='JavaScript'> alert('$alerta'); </script>";
	}
} //validar campos

?>

</body>
</html>

