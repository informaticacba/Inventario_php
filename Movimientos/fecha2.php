<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INCES</title>

<link href="../css/menu.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<!-- scritp para el calendario -->
<input type="date" name="fecha" autocomplete="off"> <!--date es de html5-->

<br/><br/>

Fecha nacimiento: 
<input type="date" name="cumpleanios" step="1" min="2013-01-01" max="2013-12-31" value="2013-01-01">
<br/><br/>
Fecha nacimiento php:
<input type="date" name="cumpleanios" step="1" min="2013-01-01" max="2013-12-31" value="<?php echo date("Y-m-d");?>">
</body>
</html>