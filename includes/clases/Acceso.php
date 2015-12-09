<?php 
class Acceso 
{
protected $user;
protected $pass;

function __construct($user,$pass)
{
$this->user=$user;
$this->pass=$pass;
}

function Login()
{


$link=Conectarse();	
$consulta= "SELECT * FROM [022BDCOMUN].DBO.USUARIOS
WHERE usuario='$this->user' AND contrasena='$this->pass'"; 
$resultado= mssql_query($consulta,$link) or die (mssql_error());
$fila=mssql_fetch_array($resultado);

 if (!$fila[0]) 
{
echo '<script>
alert("Usuario o Password errados, por favor verifique.")
self.location = "/reserva/"
</script>';
}
else 
{

if (!isset($_SESSION)) {
@session_start();
}

$_SESSION['id_usuario'] = $fila['id_usuario'];
$_SESSION['nombres'] = $fila['nombres'];
$_SESSION['apellidos'] = $fila['apellidos'];
$_SESSION['starsoft'] = $fila['starsoft'];
$_SESSION['idempresa'] = $fila['idempresa'];
$_SESSION['idarea'] = $fila['idarea'];
$_SESSION['aud_jefe'] = $fila['aud_jefe'];


header("Location: /reserva/home");
}

}



function Salir()
{
   @session_start();
	
	if ($_SESSION['id_usuario'])
	{	
	session_destroy();
	echo "
	<script language = javascript>
	alert('Su sesion ha terminado correctamente')
	self.location = '/reserva/'
	</script>";
	
	}
	else
	{
	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesion, por favor registrese")
	self.location = "/reserva/"
	</script>';}
}





}







 ?>