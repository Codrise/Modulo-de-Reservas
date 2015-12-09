<meta charset='UTF-8'>
<?php 

class Kitreparacion
{

function Registrar($codigo,$usuario)
{   
$link=Conectarse();
$SQL="INSERT INTO [022BDCOMUN].DBO.KIT
(CODART,CODKIT,CANTIDAD,DESCRIPCION,UNIDAD,TIPO,USUARIO)
SELECT ACODIGO,CODKIT,CANART,ADESCRI,AUNIDAD,'REP','$usuario' FROM  
[022BDCOMUN].DBO.KITS_REPARACION AS  K 
INNER JOIN  [010BDCOMUN].DBO.MAEART AS M 
ON K.CODART=M.ACODIGO AND AESTADO='V' WHERE  CODKIT='$codigo' 
AND  KUNIDAD NOT LIKE'REP'";

$RESULT=mssql_query($SQL);

if (!$RESULT)
{
echo "error al registrar";
}

else

{
echo "<script>
 window.location='/reserva/pages/reserva-kit?tipo=rep';
     </script>";
}


}



function Crear($codigo,$descripcion)
{

$link=Conectarse();
$consulta="SELECT * from [022BDCOMUN].DBO.KITS_REPARACION WHERE 
CODKIT='$codigo'";  
$resultado=mssql_query($consulta) or die (mssql_error());  
if (mssql_num_rows($resultado) == 0)  
{  

$SQL="INSERT INTO KITS_REPARACION 
(CODART,CODKIT,CANART,KDESCRI,KUNIDAD,FECHA_CREACION)
VALUES('$codigo','$codigo',1,'$descripcion','REP',GETDATE())";
$RESULT=mssql_query($SQL);
if (!$RESULT)
{
echo "<script>
alert('Error al registrar');
window.location='/reserva/consulta/kit-reparacion';
</script>";
}

else
{
header('Location: /reserva/consulta/kit-reparacion');
}

}
else
{
echo "<script>
alert('Ya esta registrado el código');
window.location='/reserva/consulta/kit-reparacion';
</script>";
}


}


function MostrarAtributo($kit,$atributo)

{
$link=Conectarse();
$sql="SELECT  IDKITS_REPARACION,CODART,CODKIT,CANART,KDESCRI,
KUNIDAD,FECHA_CREACION FROM  
KITS_REPARACION WHERE KUNIDAD='REP' AND CODKIT='$kit'";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
echo $row[$atributo];
}



function AgregarArticulo($kit,$codigo,$cantidad)
{
 $link=Conectarse();
$consulta="SELECT * FROM [010BDCOMUN].DBO.MAEART WHERE ACODIGO='$codigo'";  
$resultado=mssql_query($consulta) or die (mssql_error());  
if (mssql_num_rows($resultado) == 0)  
{  
echo "<script>
alert('No existe el código');
window.location='/reserva/pages/kit-reparacion?id=$kit';
</script>";
}
else
{

$consulta="SELECT * FROM  [022BDCOMUN].DBO.KITS_REPARACION 
WHERE CODKIT='$kit' AND CODART='$codigo'";  
$resultado=mssql_query($consulta) or die (mssql_error());  
if (mssql_num_rows($resultado) == 0)  
{  
$SQL="INSERT INTO [022BDCOMUN].DBO.KITS_REPARACION
(CODART,CODKIT,CANART,KDESCRI,KUNIDAD,FECHA_CREACION)
 SELECT ACODIGO,'$kit','$cantidad',ADESCRI,AUNIDAD,GETDATE() from 
 [010BDCOMUN].DBO.MAEART  WHERE 
ACODIGO='$codigo'";
$RESULT=mssql_query($SQL);
if (!$RESULT)
 {
 	echo "error";
 }
 else

 {
	echo "<script>
	window.location='/reserva/pages/kit-reparacion?id=$kit';
	</script>";	
 }
}
else
{
 echo "<script>
alert('Ya esta registrado');
window.location='/reserva/pages/kit-reparacion?id=$kit';
</script>";

}


}

}



function EliminarArticulo($kit,$codigo)
{
$link=Conectarse();
$SQL="DELETE FROM [022BDCOMUN].dbo.KITS_REPARACION WHERE
CODKIT='$kit' AND CODART='$codigo'";
$RESULT=mssql_query($SQL);
if (!$RESULT)
{
echo "error";
}
else

{
echo "<script>
window.location='/reserva/pages/kit-reparacion?id=$kit';
</script>";	
}

}




}
?>