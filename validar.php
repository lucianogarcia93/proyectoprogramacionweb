
<!DOCTYPE html>
<html>
<head>
    <title>VALIDAR REGISTRO DE USUARIO</title>
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

    $conexion=mysqli_connect("localhost","root","","electrodomesticos")or die("no se pudo conectar a la base de datos");

    $correo = array_key_exists('correo', $_POST) ? $_POST['correo'] : null;
    $nombre_apellido = array_key_exists('nombre_apellido', $_POST) ? $_POST['nombre_apellido'] : null;
    $edad = array_key_exists('edad', $_POST) ? $_POST['edad'] : null;
    $telefono = array_key_exists('telefono', $_POST) ? $_POST['telefono'] : null;
    $contrasena = array_key_exists('contrasena', $_POST) ? $_POST['contrasena'] : null;
    $repetirContrasena= array_key_exists('repetirContrasena', $_POST) ? $_POST['repetirContrasena'] : null;
    $contrasena = md5($contrasena);
    $repetirContrasena = md5($repetirContrasena);
    
    $insertar = "INSERT INTO usuarios VALUES (NULL, '$correo', '$nombre_apellido', '$edad', '$telefono', '$contrasena', '$repetirContrasena')";
    $verificar_usuario= mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");

    if(mysqli_num_rows($verificar_usuario)!=0) {
        echo "<center><h2>ERROR: No se pudo registrar debido a que el usuario ingresado ya existe</h2></center>";
        exit();
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $nombre_apellido)) {
        echo "<center><h2>ERROR: Los nombres y apellido ingresados no son validos</h2></center>"; 
        exit();
    }
    
    if(is_numeric($telefono)) {
        echo "";
    }else{
        echo "<center><h2>ERROR: El telefono ingresado no es un numero</h2></center>";
        exit();
    }

    if($contrasena!=$repetirContrasena) {
        echo "<center><h2>ERROR: Las contrasenas ingresadas no coinciden, por favor intentelo de nuevo</h2></center>";
        exit();
    }

    $resultado = mysqli_query($conexion, $insertar);
    if(!$resultado){
    	echo "<center><h2>HA OCURRIDO UN ERROR POR FAVOR INTENTELO DE NUEVO</h2></center>";
    }else{
    	echo "<center><h2>USUARIO REGISTRADO EXITOSAMENTE</h2><br><a href='sesion.php'>INICIAR SESION</a></center>";
    }
    mysqli_close($conexion);

?>
