
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

    $conexion= mysqli_connect("localhost","root","","electrodomesticos") or die("No se pudo conectar a la base de datos");

	if (isset($_SESSION['carrito'])) {
		if (isset($_GET['id'])) {
		    $arreglo=$_SESSION['carrito'];
		    $encontro=false;
		    $numero=0;

		    for ($i=0; $i < count($arreglo) ; $i++) { 
			     if ($arreglo[$i]['Id']==$_GET['id']) {
				    $encontro=true;
				    $numero=$i;			
			    }
		    }

		    if ($encontro==true) {
			    $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
			    $_SESSION['carrito']=$arreglo;
		        
		        }else{
			        $nombre='';
			        $precio=0;
			        $imagen='';
			        $consulta=mysqli_query($conexion, "SELECT * FROM productos WHERE id=" .$_GET['id']);
	                while ($re=mysqli_fetch_array($consulta)) {

	        	        $nombre=$re['nombre'];
	        	        $precio=$re['precio'];
	        	        $imagen=$re['imagen'];
		            }

		            $datosNuevos=array('Id' =>$_GET['id'], 
	                                   'Nombre' =>$nombre,
	                                   'Precio' =>$precio,
	                                   'Imagen' =>$imagen,
	                                   'Cantidad' => 1);

		            array_push($arreglo, $datosNuevos);
		            $_SESSION['carrito']=$arreglo;

		           }
		       }

	 }else{

		if (isset($_GET['id'])) {
			$nombre='';
			$precio=0;
			$imagen='';
			$consulta=mysqli_query($conexion, "SELECT * FROM productos WHERE id=" .$_GET['id']);

	        while ($re=mysqli_fetch_array($consulta)) {
	        	$nombre=$re['nombre'];
	        	$precio=$re['precio'];
	        	$imagen=$re['imagen'];
		}

		$arreglo[]=array('Id' =>$_GET['id'], 
	                     'Nombre' =>$nombre,
	                     'Precio' =>$precio,
	                     'Imagen' =>$imagen,
	                     'Cantidad' => 1);

		$_SESSION['carrito']=$arreglo;
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Carrito de Compras LGR</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">
	<script type="text/javascript" src = "https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src = "scripts.js"></script>
	<style type="text/css">

		body {
			background: lightblue;
		}

		header h1 {
			font-size: 50px;
			text-align: center;
			background: black 100%;
			color:white;
		}

		.boton1 {
			background: red;
			font-size: 18px;
			cursor: pointer;
		}

		.boton2 {
			background: chartreuse;
			font-size: 18px;
			cursor: pointer;
		}

		 div a {
			text-decoration: none;
			background: red;
			color: black;
			font-size: 22px;

		}


	</style>

</head>
<body>
	<a href="bienvenido.php" title="Pagina Principal">
		<img src="imagenes/inicio.jpg" align="right" width="5%" height="59px">
	</a>
	<a href="agregar.php" title="Vaciar Carrito">
		<img src="imagenes/carrito.jpg" align="left" width="5%" height="59px">
	</a>

    <header>
	<h1><span>CARRITO DE COMPRAS</span></h1>
    </header>
	

	<section>
		<?php
		     $total=0;
		     if(isset($_SESSION['carrito'])){
		     	$datos=$_SESSION['carrito'];
		     	
		     	for($i=0;$i<count($datos); $i++){
		?>

		     	<div class = "producto">
	             	<center>
		        		<img src="imagenes/<?php echo $datos[$i]['Imagen'];?>" width = "30%" height = "500px"><br>
		        		<span>PRODUCTO: <?php echo $datos[$i]['Nombre'];?></span><br>
		        		<span>PRECIO: $ <?php echo $datos[$i]['Precio'];?></span><br>
		        		<span>CANTIDAD: <?php echo $datos[$i]['Cantidad'];?></span><br>
		        		<span class="subtotal">SUBTOTAL: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br><br>
		        		<a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id'];?>">Eliminar Producto</a><br><br>


		        	</center>
		        </div>
		<?php

		    $total=$total+($datos[$i]['Cantidad']*$datos[$i]['Precio']);
		}	

		}else{
			echo "<center><h2>NO HAS AÑADIDO NINGUN PRODUCTO AL CARRITO DE COMPRAS</h2></center>";
		     }

		echo'<center><h2 id = "total" > Total: $' .$total. '</h2></center>';

		if($total!=0) {

			echo "<center><h3>Si no desea agregar mas productos confirmar su pedido haga click aqui</h3><form action='solicitar.php'>
			<input type= 'submit' value= 'ENVIAR PEDIDO' class='boton2'></form></center><br><br>";
		}
		
		?>

		<center><a href="electrodomesticos.php">AÑADIR PRODUCTOS</a></center><br><br>

	</section>
</body>
</html>

