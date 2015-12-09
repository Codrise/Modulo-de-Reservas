<?php 

class Rqmateriales
{



	
function correlativoRqmateriales()
{
$link=Conectarse();
$sql="SELECT CTNCODIGO,CTNNUMERO  FROM [010BDCOMUN].dbo.NUM_DOCCOMPRAS
Where ctncodigo = 'RM' ";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
$numero=$row['CTNNUMERO']+1;

echo sprintf("%0".'10'."s",$numero);
}






function Registrar($rqmateriales,$reserva,$ot,$centrocosto,$solicitante,$glosa,$fecha)
{
  $link=Conectarse();
$SQL="INSERT INTO [010BDCOMUN].DBO.INV_REQMATERIAL_CAB
(REQ_NUMERO,REQ_FECHA_EMISION,REQ_FECHA_ENTREGA,REQ_ESTADO,REQ_PERSONAL_SOLIC,REQ_GLOSA,REQ_USUARIO
,REQ_FECHA_CREACION,CENCOST_CODIGO,REQ_DEORDFAB)
VALUES('$rqmateriales',CONVERT (date, SYSDATETIME()),CONVERT (date, SYSDATETIME()),'00','$solicitante','$glosa',
	'USERWEB',CONVERT (date, SYSDATETIME()),'$centrocosto','$ot')";

$SQL1="INSERT INTO [010BDCOMUN].dbo.INV_REQMATERIAL_DET
(REQ_NUMERO,REQ_ITEM,ACODIGO,REQ_CANTIDAD_REQUERIDA,REQ_CANTIDAD_AUTORIZADA,REQ_CANTIDAD_DESPACHADA,
CENCOST_CODIGO,REQ_DEORDFAB )
SELECT '$rqmateriales',ROW_NUMBER() OVER (ORDER BY NRORESERVA ),CODIGO,CANTIDAD,'00',
'00','$centrocosto','$ot' FROM [022BDCOMUN].DBO.RESERVA_DET WHERE NRORESERVA='$reserva'";

$SQL2="UPDATE [010BDCOMUN].dbo.NUM_DOCCOMPRAS SET CTNNUMERO=CTNNUMERO+1 WHERE CTNCODIGO='RM' ";

$SQL3="UPDATE [022BDCOMUN].DBO.RESERVA_CAB SET ESTADO='01',
REQUERIMIENTO='$rqmateriales' WHERE NRORESERVA='$reserva' ";

$SQL4="UPDATE [022BDCOMUN].DBO.RESERVA_DET SET 
REQUERIMIENTO='$rqmateriales' WHERE NRORESERVA='$reserva' ";
  $RESULT=mssql_query($SQL);

  if (!$RESULT) 
  {
  	echo "<script>
          alert('Error al insertar');
          window.location='/reserva/pages/editar-reserva?id=$reserva';
         </script>";
  }
  
  else 
  {
    $RESULT1=mssql_query($SQL1);
    $RESULT2=mssql_query($SQL2);
    $RESULT3=mssql_query($SQL3);
    $RESULT4=mssql_query($SQL4);

    echo "<script>
          window.location='/reserva/consulta/rq-materiales';
         </script>";
  }


}



function MostrarAtributo($requerimiento,$atributo)

{
$link=Conectarse();
$sql="SELECT CONVERT(VARCHAR,REQ_FECHA_EMISION,103)AS FECHA ,REQ_GLOSA,TDESCRI FROM [010BDCOMUN].DBO.INV_REQMATERIAL_CAB  AS C 
 INNER JOIN [010BDCOMUN].DBO.TABAYU AS T ON  C.REQ_PERSONAL_SOLIC=T.TCLAVE 
 WHERE TCOD='12' AND  REQ_NUMERO='$requerimiento'";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
echo $row[$atributo];

}




}


 ?>