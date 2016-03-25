<?   
session_start();   
$usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../info.php'; ?>
<?php  require '../conectar.php'; ?>

<?php
//inicio paginador
$registros = 20; 

$pagina = $_GET["pagina"];

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
$inicio = ($pagina - 1) * $registros;
} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
//inicio borrado de registros
$nbrow = 0; //numero de registros
$cont = 0; //Para el checkbox

print "<form action ='borrar_tipo.php' method='post'>";

//$result = mysql_query("SELECT * FROM clientes ORDER BY cli_nombre ASC");

//inicio consulta 
$resultados = mysql_query("SELECT * FROM configuracion WHERE 'visible' = 0");
$total_registros = mysql_num_rows($resultados) or die ( "<center>No Existen Registros!!! <br><a href=\"../index.php\">Regresar</a></center>"); //or die ( "Error en query: $sql, el error  es: " . mysql_error());
$resultados = mysql_query("SELECT * FROM configuracion WHERE 'visible' = 0 ORDER BY id_tipo DESC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros); 
//fin consulta 
?>

<center>
<h2>Borrar Tipos</h2>
<table style="border:1px #FF0000; color:#000000; width:990px; text-align:center;">
<tr style="background:#FFD700;">
<?php
echo "<td>Seleccionar</td><td>Tipo</td> \n"; 
?>
</tr>

<?php
while($row=mysql_fetch_array($resultados))
{
$nbrow++;
$cont++;

$id_tipo = $row["id_tipo"];
$nombre_tipo = $row["nombre_tipo"];
print "<tr bgcolor='#FFFACD'> "; //color de fondo de la fila
print "<td>
        <div align=\"center\">
          <font color=\"#000000\">
            <font face=\"Verdana\">
              <input type=\"checkbox\" name=\"delete[]\" value=\"".$id_tipo."\">
            </font>
          </font>
        </div>
      </td>";
                                  //color de fondo de las letras
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$nombre_tipo</font></font></div></td>";
print "</tr>";


}
print "</form> \n";
echo "</table> \n <p><p>";
print "<div align=\"center\"><input type='submit' name='borrar' value='Borrar'></div>";

if (count($_POST['delete']))
{
foreach ($_POST['delete'] as $v)
{
$sql="DELETE FROM configuracion WHERE id_tipo = '$v'";
$res = mysql_query($sql);
}
}
//fin borrado de registros

//paginador
if(($pagina - 1) > 0) {
echo "<a href='../borrar_tipo.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='borrar_tipo.php?pagina=$i'>$i</a> ";
} }

if(($pagina + 1)<=$total_paginas) {
echo " <a href='borrar_tipo.php?pagina=".($pagina+1)."'>Siguiente ></a>";
} 
//fin paginador
?> 
</center>
</table><br />
</body>
</html>
<?php mysql_free_result($resultados); ?>