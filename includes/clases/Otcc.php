<?php 

/**
* 
*/
class Otcc 

{

function MostrarAtributo($ot)

{
$link=Conectarse();
$sql="SELECT * FROM CENCOSOT WHERE  CODIGOOT='$ot'";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
echo $row['CODIGOCENTROCOSTO'];

}


function Registrar($ot,$cc,$usuario,$ip)
{
$link=Conectarse();
$SQL="INSERT INTO [022BDCOMUN].DBO.CENCOSOT
(CODIGOCENTROCOSTO,CODIGOOT,FECHA,HORA,USUARIO,NOMBRE_PC)
VALUES('$cc','$ot',GETDATE(),Convert(varchar(8),GetDate(), 108),'$usuario','$ip')";
$RESULT=mssql_query($SQL);

if (!$RESULT)
{
echo "error";

}

else
{
header('Location: /reserva/consulta/cencos-ot');
}
}



function Eliminar($id)
{
  
$link=Conectarse();
$SQL="DELETE FROM  [022BDCOMUN].DBO.CENCOSOT WHERE IDCENCOSOT='$id'";
$RESULT=mssql_query($SQL);

if (!$RESULT)
{
echo "error";

}

else
{
header('Location: /reserva/consulta/cencos-ot');
}


}


}








?>