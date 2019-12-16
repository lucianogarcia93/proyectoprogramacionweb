
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
	<title>Detalles de productos LGR</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">

	<style type="text/css">

		body{
			background: lightblue;
		}

		header h1{
			font-size: 50px;
			background: green;
			color:black;
			text-align: center;
		}

	</style>

</head>
<body>
		<a href="bienvenido.php" title="Pagina Principal">
			<img src="imagenes/inicio.jpg" align="right" width="5%" height="59px">
		</a>
	<header>
		<h1>DETALLES DEL PRODUCTO</h1>
	</header>
	<section>
		<?php
			$conexion= mysqli_connect("localhost","root","","electrodomesticos");
	        $consulta=mysqli_query($conexion, "SELECT * FROM productos WHERE id=" .$_GET['id']);
	        while ($re=mysqli_fetch_array($consulta)) {
	    ?>
	    		<center>
	    				<img src="imagenes/<?php echo $re['imagen'];?>" width="30%" height = "500px"><br>
				        <span>PRODUCTO: <?php echo $re['nombre'];?></span><br>
				        <span><?php echo $re['descripcion'];?></span><br>
				        <span>PRECIO: $<?php echo $re['precio'];?></span><br><br>
				        <a href="agregar.php?id=<?php echo $re['id'];?>">AÑADIR AL CARRITO DE COMPRAS<a><br><br><br>
		        </center>

	    <?php

	      } 
		
		?>
	</section>
</body>
</html>