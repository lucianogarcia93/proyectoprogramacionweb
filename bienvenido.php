
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
	<title>Bienvenido a Ventas LGR</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">
	<style type="text/css">

		body {
			background: lightblue;
		}

		div {
			width: 100%;
			height: 100px;
			background: orange;
			overflow: hidden;
		}

		div ul {
			list-style: none;
		}

		div ul li a {
			float: left;
			font-size:45px;
			padding: 10px 40px;
			display: block;
			text-decoration: none;

		}

		h1{
			font-size: 55px;
			margin: 20px;
			font-family: arial;
		}

		h3 {
			margin-left: 40px;
		}

		.buscar {
			width: 15%;
			height: 35px;
		    cursor: pointer;
		    font-weight: bolder;
		    margin-left: 80px;
		    font-size: 15px;
		}

		input[type="text"] {
			width: 30%;
			height: 24px;
			text-align: center;

		}

		.finalizar{
			margin-left: 1500px;
			width: 9%;
			height: 35px;
			font-weight: bolder;
			font-size: 16px;
			cursor: pointer;
			color:white;
			background: red;
			border-radius: 10px;
			border: 1px solid red;
		}

		</style>
</head>
<body>
	 <form action= 'cerrar.php'><br><input type= 'submit' value= 'CERRAR SESION' class='finalizar'></form><h1>VENTAS DE ELECTRODOMESTICOS LGR</h1>
	<header>
		<div>
		<ul>
			<li><a href="electrodomesticos.php" title="Ver catalogo">CATALOGO COMPLETO LGR</a></li><br>
			<form action = "buscar.php" method = "post">
				<input type="submit" name= "buscar" value ="Buscar Producto" class="buscar">
				<input type= "text" name = "nombre" placeholder="Ingresar Nombre Del Producto" required>
			</form>
		</ul>
		</div>   
	</header>
	<img src="imagenes/portada.jpg" width="100%" height="500px"></img>
	<h3>Ver listado de pedido de compras realizadas aqui: <a href="mostrar.php">PEDIDOS REALIZADOS</a></h3>
</body>
</html>