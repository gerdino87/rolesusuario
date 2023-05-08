<?php



$usuario=$_POST['user'];
$password=$_POST['pass'];

session_start();

$_SESSION['user']=$usuario;

$conn=mysqli_connect("localhost","root","","acceso");

$query="SELECT *FROM usuarios WHERE usuario='$usuario' and password ='$password'";

$resultado=mysqli_query($conn,$query);

$filas=mysqli_fetch_array($resultado);

if($filas['rol_id']==1){ //adminisdtrador

	header("location:GEJMadministracion.html");

}else 

	if($filas['rol_id']==2){//operacion

header("location:GEJMOperacion.html");

	}
else{
    
echo"Error de autentificacion";
}

mysqli_free_result($resultado);
mysqli_close($conn);
