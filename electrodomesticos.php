
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
    <title>Electrodomesticos LGR</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">
	<style type="text/css">

	header h1{
		font-size: 50px;
		text-align: center;
		background: blue;
		color:black;
	}

	body{
		background: lightblue;
	}

</style>

</head>
<body>
		<a href="bienvenido.php" title="Pagina Principal">
			<img src="imagenes/inicio.jpg" align="right" width="5%" height="59px">
		</a>


	<header>
		<h1><span>ELECTRODOMOESTICOS LGR</span></h1>
	</header>

	<section>
	<?php
	$conexion= mysqli_connect("localhost","root","","electrodomesticos");
	$consulta=mysqli_query($conexion, "SELECT * FROM productos");
	while ($re=mysqli_fetch_array($consulta)) {
		?>
			<center>
				<img src="imagenes/<?php echo $re['imagen'];?>" width="30%" height = "500px"><br>
				<span>PRODUCTO: <?php echo $re['nombre'];?></span><br>
				<a href="detalles.php?id=<?php echo $re['id'];?>">VER DESCRIPCION</a><br><br><br>
	        </center>
	<?php

    }

    ?>

</body>
</html>