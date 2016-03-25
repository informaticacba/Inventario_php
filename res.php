<?php

session_start();
    if(isset($_SESSION['usuario'])){
        header("Location: index.php");
    }
  
  require 'conectar.php';
  
  if ($_POST['username']) {
//Comprobacion del envio del nombre de usuario y password
$username=$_POST['username'];
$password=$_POST['password'];
if ($password==NULL) {
echo "Password Invalido";
}else{
$query = mysql_query("SELECT username,password FROM users WHERE username = '$username'") or die(mysql_error());
$data = mysql_fetch_array($query);
if($data['password'] != $password) {
//echo "Datos Incorrectos. Por Favor Intenta De Nuevo.";
echo "<script language='JavaScript'> alert('Datos Incorrectos. Por Favor Intenta De Nuevo'); </script>";

}else{
$query = mysql_query("SELECT username,password FROM users WHERE username = '$username'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["s_username"] = $row['username'];
echo "<script>location.href = 'index.php';</script>";  //redirecciona al index

echo "Bienvenido <b>".$_SESSION['s_username']."</b> <a href=\"logout.php\">Cerrar Sesion</a>";
}
}
}  
?>
<?php require 'info.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> </title>

<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/form2.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="principal">

  <div id="cabecera"> 
    <div id="titulo"> 
      <center>
      <h1>Inventario INCES</h1>
      </center>
    </div>
  </div>
  
<div id="menu">
<ul>
   <li>
    </li>
    </ul>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<center>
<?php
echo "No Estas Autorizado, Por Favor Ingresa Tus Datos Para Acceder Al Sistema.";
echo '<br />';
echo '<br />';
    // provee el formulario para hacer  log in
    echo "<form method=post action=\"res.php\" autocomplete=\"off\">";
    echo "<table>";
    echo "<tr><td><b>Usuario:</b></td>";
    echo "<td><input type=text name=username autofocus></td></tr>";
    echo "<tr><td><b>Password:</b></td>";
    echo "<td><input type=password name=password></td></tr>";
    echo "<tr><td colspan=2 align=center><br>";
    echo "<input type=submit value=\"Ingresar\"></td></tr>";
    echo "</table></form>";
  
?>
</center>
</body>
</html>