<?php
$host="localhost";
$user="root";
$pw="";
$db="electrodomesticos";

$conexion=mysql_connect($host, $user, $pw, $db);
$select=mysql_select_db($db, $conexion);

?>