<?php
//created by Gnuxdar
//14-08-2015
//base datos mysql
mysql_connect("localhost", "root", "123") OR DIE("No ha sido posible conectar a la base de datos, contactar con @ArturoGnuxdar");
@mysql_query("SET NAMES 'utf8'"); //solucion caracteres especiales como la ñ
mysql_select_db("compu")OR DIE("No ha sido posible conectar a la Base de Datos, contactar con @ArturoGnuxdar");
?>