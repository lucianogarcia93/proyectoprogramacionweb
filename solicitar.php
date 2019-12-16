
<?php

session_start();

include 'conexion_solicitar.php';

$arreglo=$_SESSION['carrito'];
$correo=$_SESSION['usuario'];
$numeropedido=0;

$consulta= mysql_query("SELECT * FROM usuarios WHERE correo =  '$correo'");

if ($res= mysql_fetch_array($consulta)) {
	$id_comprador=$res['id_usuario'];
}

$consulta1=mysql_query("SELECT * FROM pedidos order by numeropedido DESC limit 1");
while ($re=mysql_fetch_array($consulta1)){
	$numeropedido=$re['numeropedido'];
}

if ($numeropedido==0) {
	$numeropedido=1;
}else{
	$numeropedido=$numeropedido+1;
}

if (isset($_SESSION['carrito'])) {
    for ($i=0; $i < count($arreglo) ; $i++) { 
	    mysql_query("INSERT INTO pedidos (id_comprador ,numeropedido, imagen, nombre, precio, cantidad, subtotal) VALUES (".$id_comprador.", ".$numeropedido.", '".$arreglo[$i]['Imagen']."', '".$arreglo[$i]['Nombre']."', '".$arreglo[$i]['Precio']."', '".$arreglo[$i]['Cantidad']."', '".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."')");
}
}

unset($_SESSION['carrito']);
header("Location: bienvenido.php");

?>