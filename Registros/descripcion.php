<?php
require '../conectar.php'; 

$tipo= $_POST['tipo'];


        $sql_descripcion = "SELECT descripcion FROM registro where tipo in(SELECT nombre_tipo FROM configuracion where id_tipo = '$tipo')"; 
	      $result_descripcion = mysql_query($sql_descripcion)or die(mysql_error()); 
	      $options_descripcion = ''; 
	    while ($row_descripcion = mysql_fetch_array($result_descripcion))
		{	$options_descripcion = $options_descripcion.'<option value="'.$row_descripcion['descripcion'].'">'.$row_descripcion['descripcion'] .'</option>'; } 
//
	echo $options_descripcion;
?>