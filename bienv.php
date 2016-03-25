<?php
session_start();
    if(isset($_SESSION['usuario'])){
        header("Location: index.php");
    }
?>
<?php require 'info.php';

      if($_GET['mensaje']){
        echo "<script>alert('".$_GET['mensaje']."');</script>";
          }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INCES</title>

<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/form2.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="principal">
  <div id="cabecera">
    <div id="titulo">
      <div id="logout">
        <?php
        //echo "Bienvenido <b>".$_SESSION['s_username']."</b> ";
        ?>
      </div>

    </div>
  </div>

<div id="menu">
<ul>
	<!-- <li><a href="../Compu-Soft/creditos.php">Acerca De</a>
    </li> -->

 <!--  <li><a href="../Compu-Soft/logout.php">Salir</a>
    </li> -->
    </ul>
</div><!--fin menu-->

<div id="" align="center">


    <div id="bienvenido" align="center" class=""><br><br><br<b>BIENVENIDO</b><br><br></div>

  <img class="btn" align="center" src="img/principal.png" WIDTH="150"  HEIGHT="140" alt="INCES" />
</div>

<div align="center" ><br><br><b>Sistema automatizado para el control y gestion de inventario<br><br> del departamento de almacen del CFS-INCES Tunapuy <br><br><br><br></b>
<!-- class="modal-content" -->
<a class="btn btn-primary" href="res.php">Entrar</a>
<!-- <input type="button" value="Entrar" href="res.php" > -->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a class="btn btn-primary"   action="logout.php">Salir</a>
<!-- <input type="button" value="Salir" action="res.php"> -->


</div>

</div><!--fin principal-->
<p>&nbsp;</p>
<p>&nbsp;</p>


</body>
</html>
