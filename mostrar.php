
<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if ($varsesion==null || $varsesion == '') {
	header("Location:sesion.php");
	//echo "<center><h2>ERROR: Usted no tiene autorizacion para poder ingresar, por favor inicie sesion para poder acceder al sitio</h2></center>";
	//echo "<center><a href='sesion.php'>INICIAR SESION</a></center>";
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LISTADO DE PEDIDOS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">
	<style type="text/css">
		
		body{
			background: lightblue;
		}
		td{
			text-align: center;
		}

		header h1{
			color: white;
			background: green;
			font-size: 40px;
		}

	</style>
</head>
<body>
	<center>
		<header><br>
			<h1>LISTADO DE PEDIDOS REALIZADOS</h1>
		</header>
		<table border= '1px' width='90%' height= '400px'>
			<br><tr>
				<td><b>NUMERO PEDIDO<b></td>
				<td><b>PRODUCTO<b></td>
				<td><b>PRECIO<b></td>
				<td><b>CANTIDAD<b></td>
				<td><b>MONTO TOTAL<b></td>
            </tr>

            <?php

            session_start();
            $correo=$_SESSION['usuario'];
            $conexion= mysqli_connect("localhost","root","","electrodomesticos") or die("No se pudo conectar a la base de datos");
            $consulta= mysqli_query($conexion, "SELECT ped.numeropedido, ped.nombre, ped.precio, ped.cantidad, ped.subtotal, usu.correo
                                                    FROM usuarios usu
                                                    INNER JOIN pedidos ped ON usu.id_usuario = ped.id_comprador WHERE usu.correo = '$correo'");
            while($mostrar=mysqli_fetch_assoc($consulta)) {
            ?>
                <tr>
				<td><?php echo $mostrar['numeropedido'];?></td>
				<td><?php echo $mostrar['nombre'];?></td>
				<td><?php echo $mostrar['precio'];?></td>
				<td><?php echo $mostrar['cantidad'];?></td>
				<td><?php echo ($mostrar['precio']*$mostrar['cantidad']);?></td>
                </tr>

            <?php
            
            }

            ?>

		</table>
	</center>
</body>
</html>