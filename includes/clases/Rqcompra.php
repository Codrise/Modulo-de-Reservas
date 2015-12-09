<?php 

class Rqcompra 
{


function Registrar($nrorequi,$usuario,$nromaquina,$solicitante)
{

$SQL="INSERT INTO [010BDCOMUN].DBO.REQUISD(NROREQUI,codpro,DESCPRO,UNIPRO,CANTID,ESTREQUI,FECREQUE,REQITEM,SALDO,CENCOST,GLOSA,REMAQ,TIPOREQUI,ORDFAB_REQUI)
SELECT '$nrorequi',
PR.CODIGOPRE_REQUISD,M.ADESCRI,M.AUNIDAD,PR.CANTPRE_REQUISD,'P',GETDATE(),
(ROW_NUMBER() OVER(ORDER BY PR.CODIGOPRE_REQUISD))AS ITEM,
PR.CANTPRE_REQUISD,'','','$nromaquina','RQ',PR.OT
FROM [022BDCOMUN].dbo.PRE_REQUISD AS  PR INNER JOIN [010BDCOMUN].DBO.MAEART AS M 
ON PR.CODIGOPRE_REQUISD=M.ACODIGO WHERE  USUARIO='$usuario'
";

$SQL1="DELETE FROM [010BDCOMUN].DBO.REQUISD  WHERE  NROREQUI='$nrorequi' AND
codpro='TEXTO' AND DESCPRO='RESERVA'";

$SQL2="INSERT INTO AUD_RQ VALUES('$nrorequi','$solicitante','RQ','$usuario',GETDATE(),'P','','','')";

$SQLliberarprerq="DELETE FROM  [022BDCOMUN].dbo.PRE_REQUISD  WHERE USUARIO='$usuario'";

$RESULT=mssql_query($SQL);

if (!$RESULT)
 {
	echo "error al registrar";
 }

 else

 {

 	$RESULT1=mssql_query($SQL1);
 	$RESULT2=mssql_query($SQL2);
 	$RESULTliberarprerq=mssql_query($SQLliberarprerq);


    header('Location: /reserva/mensaje/rq-de-compra?nrorequi='.urlencode($nrorequi));

 }


}



function Existe($nrorequi,$usuario,$solicitante)

{

$link=Conectarse();
$consulta="SELECT * from [010BDCOMUN].DBO.REQUISC where NROREQUI='$nrorequi' AND 
CODSOLIC='$solicitante'";  
$resultado=mssql_query($consulta) or die (mssql_error());  
if (mssql_num_rows($resultado) == 0)  
{  
  echo "<script>
      alert('No existe el RQ o no te pertenece');
      window.location='/reserva/pages/registrar-rq';
      </script>";
 
}
else

{

$consulta1="SELECT * from [022BDCOMUN].DBO.AUD_RQ where NROREQUI='$nrorequi' AND 
CODSOLIC='$solicitante'";  
$resultado1=mssql_query($consulta1) or die (mssql_error());  
if (mssql_num_rows($resultado1) == 0)  
{  
 
$SQL="INSERT INTO AUD_RQ VALUES('$nrorequi','$solicitante','RQ','$usuario',GETDATE(),'P','','','')";
$RESULT=mssql_query($SQL);
if (!$RESULT) 
{
echo "<script>
alert('Error al Registrar);
window.location='/reserva/pages/registrar-rq';
</script>";	
}
else
{
echo "<script>
alert('Registro exitoso');
window.location='/reserva/pages/registrar-rq';
</script>";	
}
 
}
else

{

  echo "<script>
      alert('YA ESTA REGISTRADO');
      window.location='/reserva/pages/registrar-rq';
      </script>";
}
}

}




function ActualizarItem($id,$ot,$cc)
{
  $link=Conectarse();
  $SQL="UPDATE [022BDCOMUN].DBO.PRE_REQUISD SET OT='$ot',CENTROCOSTO='$cc' 
  WHERE IDPRE_REQUISD='$id'";
  $RESULT=mssql_query($SQL);
  if (!$RESULT)
   {
     echo "error";
   }
   else
   {
      header('Location: /reserva/consulta/pre-requerimiento');
   }

}


function EliminarItem($id)
{

   $link=Conectarse();
  $SQL="DELETE FROM [022BDCOMUN].DBO.PRE_REQUISD  WHERE IDPRE_REQUISD='$id'";
  $RESULT=mssql_query($SQL);
  if (!$RESULT)
   {
     echo "error";
   }
   else
   {
      header('Location: /reserva/consulta/pre-requerimiento');
   }


}


}


 ?>