<?php 

class Cotizacion
{



function Registrar($cotizacion,$tipocambio,$igv1,$igv2,$igv3,$usuario)
{
$link=Conectarse();
$SQL="INSERT INTO [010BDCOMUN].dbo.COTDET(CDNUMDOC,CDSECUEN,CDCODIGO,CDDESCRI,CDCANTID
,CDPREC_VEN,CDPREC_ORI,CDFECDOC,CDDESCTO,CDPORDES,CDDESCLI,CDDESESP,CDIGV,
CDIGVPOR,CDIMPUS,CDIMPMN,CDSERIE,CDVENDE,CDPUNVEN,CDALMA,CDTEXTO,CDESTADO,
CDLOTE,CDUNIDAD,CDCODLIS,CDARTIGV,CDFICHA,CDFACTOR,CDMARGEN,CDPRECIOBRUTO,
CDITEM,CDCODIGOCOTI,CDPORDES2,CDDESCTO2,COD_LISTAPRECIO)
SELECT '$cotizacion'AS CDNUMODC,(ROW_NUMBER() OVER(ORDER BY CODIGO)) AS CDSECUEN,
CODIGO AS CDCODIGO,
M.ADESCRI AS CDESCRI,CANTIDAD AS CDCANTID,
(PRECIO*1.18)-((PRECIO*1.18)*(PORCENTAJE/100)) AS CDEPREC_VEN,
PRECIO AS CDPREC_ORI,NULL AS CDFECDOC,
((CANTIDAD*PRECIO)*(PORCENTAJE/100)) AS CDESCTO,
PORCENTAJE AS CDPORDES,
0 as CDESCLI,0 AS CDESESP,
(((PRECIO *0.18)-((PRECIO*0.18)*(PORCENTAJE/100)))*CANTIDAD)  AS CDIGV,
'18'AS CDIGVPOR,
((PRECIO*1.18)-((PRECIO*1.18)*(PORCENTAJE/100)))*CANTIDAD AS CDIMPUS,
(((PRECIO*1.18)-((PRECIO*1.18)*(PORCENTAJE/100)))*CANTIDAD)*$tipocambio AS CDIMPMN,
''AS CDSERIE,NULL AS CDVENDE,NULL AS CDPUNVEN,'01'AS CDALMA,''AS CDTEXTO,'' AS CDESTADO,
'' AS CDLOTE,M.AUNIDAD AS CDUNIDAD,NULL AS CDCODLIS,'0' AS CDARTIGV,NULL AS CDFICHA,
'1'AS CDFACTOR,'0' AS CDMARGEN,
PRECIO AS CDPRECIOBRUTO,NULL AS CDITEM,'0' AS CDCODIGOOTI,NULL AS CDPORDES2,NULL AS CDDESCTO02,
''AS COD_LISTAPRECIO 
FROM [022BDCOMUN].DBO.COTIZACIONES AS C INNER JOIN [010BDCOMUN].DBO.MAEART AS M ON 
C.CODIGO=M.ACODIGO WHERE  USUARIO='$usuario';
 ";

$SQL1="DELETE FROM [010BDCOMUN].dbo.COTDET  WHERE CDNUMDOC='$cotizacion' AND CDCODIGO='COTIZACION'";
$SQL2="DELETE FROM [022BDCOMUN].dbo.COTIZACIONES  WHERE USUARIO='$usuario'";

$RESULT=mssql_query($SQL);
if (!$RESULT) 
{
  echo "error";
}
else

{
$RESULT1=mssql_query($SQL1);
$RESULT2=mssql_query($SQL2);

header('Location: /reserva/mensaje/cotizacion?cotizacion='.urlencode($cotizacion));
}



}




function  LiberarCarga($usuario)
{

 $link=Conectarse();
 $SQL="DELETE  FROM [022BDCOMUN].DBO.COTIZACIONES  WHERE USUARIO='$usuario'";
 $RESULT=mssql_query($SQL);
if (!$RESULT)
{
	echo "error";
}

else
{
   header('Location: /reserva/pages/carga-cotizacion');
}



}



function Actualizar($codigo,$cantidad,$precio,$porcentaje,$usuario)
{

	$link=Conectarse();
	$SQL="UPDATE [022BDCOMUN].DBO.COTIZACIONES SET CANTIDAD='$cantidad',PRECIO='$precio',
	PORCENTAJE='$porcentaje' WHERE  CODIGO='$codigo' AND USUARIO='$usuario'
	";
	$RESULT=mssql_query($SQL);
	if (!$RESULT)
	{
	echo "error";
	}
	else
	{
	header('Location: /reserva/ventas/consulta-carga');
	}


}



function EliminarItem($codigo,$usuario)
{

	$link=Conectarse();
	$SQL="DELETE FROM  [022BDCOMUN].DBO.COTIZACIONES 
	 WHERE  CODIGO='$codigo' AND USUARIO='$usuario'	";
	$RESULT=mssql_query($SQL);
	if (!$RESULT)
	{
	echo "error";
	}
	else
	{
	header('Location: /reserva/ventas/consulta-carga');
	}


}



function ActualizarCotizacion($reserva,$cotizacion)
{
  
  $link=Conectarse();
  $SQL="UPDATE [022BDCOMUN].DBO.RESERVA_DET  SET COTIZACION='$cotizacion'
  WHERE NRORESERVA='$reserva'";
  $RESULT=mssql_query($SQL);
  if (!$RESULT)
   {
  	 echo "error";
   }
   else

   {
   	 header('Location: /reserva/pages/editar-reserva-ventas?id='.$reserva);
   }


 
}



}


 ?>