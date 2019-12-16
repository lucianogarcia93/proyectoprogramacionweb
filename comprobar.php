
<!DOCTYPE html>
<html>
<head>
	<title>COMPROBAR INICIO DE SESION</title>
	<style type="text/css">
		body{
			background: url("imagenes/fondo.jpg");
            background-size: 100%;
		}
	</style>
</head>
<body>
</body>
</html>

<?php

error_reporting(0);
$correo=$_POST['correo'];
$password=md5($_POST['contrasena']);

$conexion=mysqli_connect("localhost","root","","electrodomesticos");
$consulta=mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' and contrasena ='$password'");

    if(mysqli_num_rows($consulta)>0) {
        session_start();
        session_id();
        $_SESSION['usuario']= $contrasena;
        $_SESSION['usuario']= $correo;
    	header("Location:bienvenido.php");
    }else{
    	echo "<center><h2>ERROR: El usuario no esta registrado o los datos ingresados son erroneos por favor intentelo de nuevo</h2></center>";
    }

    
    mysqli_free_result($consulta);
    mysqli_close($conexion);


?>