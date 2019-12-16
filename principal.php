
<!DOCTYPE html>
<html>
<head>
	<title>SISTEMAS DE VENTAS ONLINE</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">

	<style type="text/css">

		body{
			padding: 20px;
			background:url("imagenes/fondo.jpg");
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
		}
		input{
			width: 100%;
			margin-bottom: 20px;
			height: 20px;

		}
		input[type="submit"]{
			height: 30px;
		    background: #1668C4;
		    cursor:pointer;
		    font-weight: bolder;
		    color: white;

		}

		h3{
			text-align: center;
		}

		p, h4, h1{
			margin: 18px;
		}
		
		h1{
			font-size: 43px;
			font-family: arial;
			}
	</style>
</head>
<body>
	<h1>VENTAS  DE ELECTRODOMESTICOS LGR</h1><hr/>
	<p><b>Registrate gratis ahora y encarga los diferentes tipos de electrodomesticos que tenemos para ofrecerte en nuestro sitio web</b></p>
	<div class="form">
		<form action="validar.php" method="POST">
			<h3>REGISTRAR USUARIO</h3><hr/><br>
			<label for="correo">Correo Electronico</label>
			<input type="email" name="correo" placeholder="Ingresar Correo Electronico" required>
			<br><br>
			<label for="nombre_apellido">Nombre_Apellido</label>
			<input type="text" name="nombre_apellido" placeholder="Ingresar Nombre y Apellido" required>
			<br><br>
			<label for="edad">Edad</label>
			<input type="number" name="edad" placeholder="Ingresar Edad" min="18" max="50" required>
			<br><br>
			<label for="telefono">Telefono/Celular</label>
			<input type="telefono" name="telefono" placeholder="Ingresar N° de Telefono" required>
			<br><br>
			<label for="contrasena">Contraseña</label>
			<input type="password" name="contrasena" placeholder="Ingresar Contraseña" required>
			<br><br>
			<label for="repetirContrasena">Confirmar Contraseña</label>
			<input type="password" name="repetirContrasena" placeholder="Repetir Contrasena" required>
			<br><br>
			<input type="submit" name="registrar" value="REGISTRARSE"><br><br> 
		</form>
	</div>
	<hr/>
	<h4> Si ya estas registrado en nuestro sitio web inicia sesion ahora <a href="sesion.php">INICIAR SESION</a></h4>
</body>
</html>