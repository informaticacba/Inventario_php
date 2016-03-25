<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: res.php");
    }
?>
<?php require 'info.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  <!-- permite introducir acentos y mas...-->
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/form2.css" rel="stylesheet" type="text/css" />
<title></title>
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
        <li><a href="/Compu-Soft/Registros/r_articulos.php" class="NULL">Nuevo Articulo</a></li> 
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
  
  <tr>
    <td>&nbsp;</td>
    <td><h2 align="center">Sistema de Inventario INCES</h2></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><h2 align="center">Author: <a href="https://twitter.com/ArturoGnuxdar" class="btn btn-info">@ArturoGnuxdar</h2></td>
    </div></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      
    </tr>
    <tr>
      <td>&nbsp;</td>
       <td><div align="center">Resolución óptima 1024 x 768 píxeles</div></td>
       <td>&nbsp;</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td width="62%"><div align="center">Aplicación optimizada para Firefox</div></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="62%"><div align="center"><br>Independencia Tecnologica</div></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>

       <td><div align="center"><br><br><br><br><br><br><br><b><hr>"La educación e instrucción pública son los principios 
       más seguros de la felicidad general y la más sólida base de la libertad de los pueblos" <br><br> Simon Bolivar<hr></b></div></td>
       <td>&nbsp;</td>
    </tr>
       
</table>
</body>
</html>
