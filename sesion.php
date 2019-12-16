<!DOCTYPE html>
<html>
<head>
	<title>INICIAR SESION AHORA</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<style type="text/css">

		body{
			padding: 10px;
			background: url("imagenes/fondo.jpg");
			background-size: 100%;
		}

		form{
			width: 50%;
			border:1px solid black;
			margin:20px;
			padding: 20px;
		}

		label{
			font-size: 20px;
			display: block;
			width: 100%;
			text-align: left;
		}
		input{
			width: 100%;
			margin-bottom: 20px;
			height: 20px;		}

		h4{
			text-align: center;
		}

		h1{
			margin-left: 15px;
			font-size: 44px;
			width: 70%;
			font-family: arial;
		}

		input[type="submit"]{
			height: 30px;
			background: #1668C4;
			cursor:pointer;
			font-weight: bolder;
			color: white;
		}


	</style>
</head>
<body>
	<h1>VENTAS DE ELECTRODOMESTICOS LGR</h1><hr/>
	<div class="form">
		<form action="comprobar.php" method="POST">
			<h4>INICIAR SESION</h4><hr/><br>
			<label for="correo">Correo Electronico</label>
			<br>
			<input type="email" name="correo" placeholder="Ingresar Correo Electronico" required>
			<br><br>
			<label for="contrasena">Contraseña</label>
			<br>
			<input type="password" name="contrasena" placeholder="Ingresar Contraseña" required>
			<br><br><br>
			<center>
			<input type="submit" name="iniciar" value="INGRESAR">
		    </center>
		</form>
	</div>
</body>
</html>