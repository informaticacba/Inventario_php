<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");}
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
<!-- scritp para el calendario -->
<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
<script language="javascript">
function tipo() {
      location.href="tipo.php";
    }

</script>  
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

<center>
<form method="POST" action="nuevo_ingreso2.php" name="formulario" id="formulario" autocomplete="off">

<fieldset><legend>Ingreso De Articulos</legend>
<?php  $tipo= "nombre_tipo[]";?>


          <table class="" width="89%" cellspacing=0 cellpadding=0 border=0>          
            <tr>
              <br><br>
              <td>Tipo:</td>
              <?php echo '<label><input type="hidden" name="tipo_m" value="Ingreso" /></label> ';?>
              <td><?php echo '<label><select name="nombre_tipo[]">'.$options_tipo2.'</select></label> ';?></td>
              <td><img src="../img/add.png" width="15" height="15" border="1" onClick="tipo()" onMouseOver="style.cursor=cursor"></td>
            </tr>

            <tr>
              <td>Unidades:</td>
              <td><?php echo '<label><input type="number" name="unidades[]" size="30" maxlength="10" autofocus onkeypress="return permite(event, \'num\')" placeholder="Ingrese..." required /></label> ';?>
              </td>
            </tr>

            <tr>
              <td>Descripcion:</td>
              <td><?php echo '<label><input type="text" name="descripcion[]" size="10" maxlength="30" onkeypress="return permite(event, \'num\')" placeholder="Ingrese..." required /></label> ';?></td>
            </tr>

            <tr>
              <td>Observacion:</td>
              <td><?php echo '<label><input type="text" name="obser[]" size="30" maxlength="30" onkeypress="return permite(event, \'num\')" placeholder="Ingrese..." required /></label> ';?></td>
            </tr>

            <tr>
              <td>    <input value="<?php echo date("Y-m-d h:i:s A"); ?>" name="fecha" type="hidden" /></label><br /></td>

            </tr>
          </table>
  <br>
  <label for="ingreso"></label>
        <input type="submit" name="aceptar" id="aceptar" value="Enviar" class="uno"/>
        <input type="reset" name="borrar" id="borrar" value="Borrar Formulario" class="uno"/>
        <label for="borrar">
  </label>
</form>


</fieldset>
  
</center>
</body>
</html>
