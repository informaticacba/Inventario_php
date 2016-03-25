<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../conectar.php'; ?>
<?php require '../info.php'; ?>
<?php require '../select.php'; ?>

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
    <li><a href="#">Articulos</a> 
      <ul>
        <li><a href="/Compu-Soft/Registros/r_articulos.php">Nuevo Articulo</a></li>
		<li><a href="/Compu-Soft/Registros/nuevo_ingreso.php">Ingreso De Articulos</a></li>
		<li><a href="/Compu-Soft/Registros/nueva_salida.php">Salida De Articulos</a></li>
		<li><a href="/Compu-Soft/Movimientos/movimiento_cel.php">Ver Movimientos</a></li>
		<li><a href="/Compu-Soft/Borrar/borrar_movimiento.php">Borrar Movimientos</a></li>
		<li><a href="/Compu-Soft/Buscar/buscar_art.php">Buscar Articulos</a></li>
		<li><a href="/Compu-Soft/Borrar/borrar_art.php">Borrar Articulos</a></li>
        </ul>
    </li>
	<li><a href="#">Ventas Y Servicios</a> 
      <ul>
        <li><a href="/Compu-Soft/Registros/mov.php">Ventas Y Servicios</a></li>
		<li><a href="/Compu-Soft/Borrar/borrar_vs.php">Borrar Movimientos</a></li>
		<li><a href="/Compu-Soft/Registros/act_valor.php">Actualizar Precio Base</a></li>
       </ul>
    </li>
	<li><a href="#">Kardex</a> 
      <ul>
	    <li><a href="/Compu-Soft/Kardex/kardex.php">Kardex Diario</a></li>
        <li><a href="/Compu-Soft/Kardex/kardex_semanal.php">Kardex Semanal</a></li>
		<li><a href="/Compu-Soft/Kardex/kardex_quince.php">Kardex Quincenal</a></li>
		<li><a href="/Compu-Soft/Kardex/kardex_mensual.php">Kardex Mensual</a></li>
		<li><a href="/Compu-Soft/Kardex/kardex_tipo.php">Kardex Movimiento</a></li>
	 </ul>
    </li>
	<li><a href="#">Copia De Seguridad</a> 
      <ul>
        <li><a href="/Compu-Soft/Backup/backup.php">Realizar Copia</a></li>
        </ul>
    </li>
	<li><a href="/Compu-Soft/creditos.php">Acerca De</a> 
    </li>

    </li>
  	<li><a href="../logout.php">Salir</a> 
    </li>
    </ul>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<center>
	<form method="post" action="nuevo_ingreso2.php" name="formulario" id="formulario">
	<fieldset>
<?php	

$horas_diferencia=0;
$tiempo=time() + ($horas_diferencia * 60 *60);
$fecha = date('Y-m-d H:i:s',$tiempo); 

    // INICIO construccion de los campos para ingresar los datos de los clientes.
	// tipo de movimiento I = ingreso , S = salida, oculto.
	echo '<input type="hidden" name="tipo" value="Ingreso" />';
	 // select con los nombres de los clientes, elije nombre y envia id.
	echo '<label><b>Marca:</b> <select name="marca[]">'.$options_marca.'</select></label>';
	//descripcion articulo
	echo '<label><b>Modelo:</b> <select name="modelo[]">'.$options_prd.'</select></label>';
	//descripcion articulo
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Cantidad:</b> <input type="text" name="qty[]" size="30" maxlength="10" onkeypress="return permite(event, \'num\')" /></label>';
	// campo para ingresar tipo de movimiento.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Proveedor:</b> <input type="text" name="prov[]" size="30" maxlength="10" onkeypress="return permite(event, \'num\')" /></label>';
	// campo para ingresar tipo de movimiento.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Fecha De Movimiento: </b><input value=" '.$fecha.' " name="fecha[]" type="text" /></label>';
	//numero de recibo
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Descripcion:</b> <input type="text" name="des[]" size="10" maxlength="30" onkeypress="return permite(event, \'num\')" /></label>';
	// campo de text para ingresar el Valor Abono.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Serial:</b> <input type="text" name="serial[]" size="30" maxlength="30" onkeypress="return permite(event, \'num\')" /></label>';
	// campo de text para ingresar la Cantidad De Cuotas.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Grarntia:</b> <input type="text" name="cuota[]" size="10" maxlength="20" onkeypress="return permite(event, \'num\')" /></label>';
	// campo de text para ingresar el Interes Por Mora.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Interes Por Mora: </b><input type="text" name="mora[]" size="30" maxlength="20" onkeypress="return permite(event, \'num\')" /></label>';
	// salto de linea ;-P
	echo '<br />';
	
 ?>
<!--// FIN construccion de los campos para ingresar los datos de los clientes.-->

        	
	<br>
		<label for="ingreso"></label>
        <input type="submit" name="aceptar" id="aceptar" value="Enviar" class="uno"/>
		<input type="reset" name="borrar" id="borrar" value="Borrar Formulario" class="uno"/>
        <label for="borrar"></label>
        </fieldset>
    </form>
</center>
</body>
</html>



