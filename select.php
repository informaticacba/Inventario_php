<!--INICIO  construccion del select con los nombres de los PROVEEDORES !-->
<!-- Creado por @ArturoGnuxdar -->
<?php
// INICIO  construccion consulta de de los ARTICULOS-->
$sql_options_tipo = "SELECT * FROM  `configuracion`"; 
	     
	      $result_options_tipo = mysql_query($sql_options_tipo); 
	      $options_tipo = ''; 
	      
	    while ($row_options_tipo = mysql_fetch_array($result_options_tipo))
		{	
			
			$options_tipo = $options_tipo.'<option value="'.$row_options_tipo['id_tipo'].'">'.$row_options_tipo['nombre_tipo'].'</option>';
		}
// FIN  construccion consulta de de los ARTICULOS-->

?>

<?php
// INICIO  construccion consulta para el nombre del articulo
$sql_options_tipo2 = "SELECT * FROM  `configuracion`"; 
	     
	      $result_options_tipo2 = mysql_query($sql_options_tipo2); 
	      $options_tipo2 = ''; 
	      
	    while ($row_options_tipo2 = mysql_fetch_array($result_options_tipo2))
		{	
			
			$options_tipo2 = $options_tipo2.'<option value="'.$row_options_tipo2['nombre_tipo'].'">'.$row_options_tipo2['nombre_tipo'].'</option>';
		}
// FIN  construccion consulta de de los ARTICULOS-->

?>

