<?php 
class Reserva
{
	
	
function correlativoReserva()
{
   
$link=Conectarse();
$sql="SELECT TOP 1 NRORESERVA FROM [022BDCOMUN].DBO.RESERVA_CAB
ORDER BY NRORESERVA DESC ";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
echo $row['NRORESERVA']+1;
}


function registrarReserva($solicitante,$ot,$usuario,$idarea,$jefe,$cc,$tipo)
{
$link=Conectarse();
$SQL="INSERT INTO [022BDCOMUN].DBO.RESERVA_CAB(SOLICITANTE,OT,ESTADO,USUARIO
	,IDAREA,AUD_JEFE,CENTROCOSTO,TIPO,FECHA) 
VALUES('$solicitante','$ot','00','$usuario','$idarea',
'$jefe','$cc','$tipo',GETDATE())";

$RESULT=mssql_query($SQL);

if (!$RESULT) 
{
echo  "<script>
   alert('Error al registrar');
   window.location='/reserva/consulta/reserva';
   </script>";
}
else
{
echo  "<script>
    window.location='/reserva/consulta/reserva';
   </script>";

}

}



function MostrarAtributo($idreserva,$atributo)

{
$link=Conectarse();
$sql="SELECT TDESCRI,OT,CENTROCOSTO FROM [022BDCOMUN].DBO.RESERVA_CAB 
AS C  INNER JOIN [010BDCOMUN].DBO.TABAYU AS T ON
 C.SOLICITANTE=T.TCLAVE WHERE TCOD='12' 
  AND  NRORESERVA='$idreserva' ";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
echo $row[$atributo];

}


function EditarDetalle($codigo,$cantidad,$reserva)
{
$link=Conectarse();
$consulta="SELECT ACODIGO,ADESCRI,
(ISNULL(STSKDIS,0)-SUM(ISNULL(CANT_PEND,0)))AS STOCK
FROM [010BDCOMUN].DBO.MAEART AS M LEFT JOIN [010BDCOMUN].DBO.STKART AS S ON
M.ACODIGO=S.STCODIGO AND STALMA='01' LEFT JOIN [022BDCOMUN].DBO.RESERVA_DET AS D ON
S.STCODIGO=D.CODIGO 

WHERE  AESTADO='V' AND AFSTOCK='S'  AND  ACODIGO='$codigo'

GROUP BY ACODIGO,ADESCRI,STSKDIS ";
$resultado=mssql_query($consulta) or die (mssql_error());
if (mssql_num_rows($resultado)>0)
{

$contar = mssql_fetch_array($resultado);


if ($_POST['cantidad']<=$contar['STOCK'])
 {
	$SQL ="IF EXISTS(SELECT * FROM [022BDCOMUN].DBO.RESERVA_DET  WHERE
CODIGO='$codigo' AND NRORESERVA=$reserva)
UPDATE [022BDCOMUN].DBO.RESERVA_DET  SET 
CANTIDAD=CANTIDAD+$cantidad,CANT_PEND=CANTIDAD+$cantidad
where NRORESERVA='$reserva'and CODIGO='$codigo'  
ELSE
INSERT INTO[022BDCOMUN].DBO.RESERVA_DET(NRORESERVA,CODIGO,CANTIDAD,CANT_PEND) 
VALUES('$reserva','$codigo','$cantidad','$cantidad')";

$RESULT=mssql_query($SQL);

if (!$RESULT) 
{
	echo "error al registrar";
}

else
{
	echo "<script>
	window.location='/reserva/pages/editar-reserva?id=$reserva';
	</script>";
}

 }

 else

 {
 	echo "<script>
 	alert('El Stock es Cero :( ');
	window.location='/reserva/pages/editar-reserva?id=$reserva';
	</script>";
 }


} 
else 
{

echo "<script>
alert('No existe el codigo o esta Mal escrito');
window.location='/reserva/pages/editar-reserva?id=$reserva';
</script>";

}



}



function ExisteDetalle($reserva)
{
$link=Conectarse();
$consulta="SELECT * FROM RESERVA_DET WHERE NRORESERVA='$reserva'";  
$resultado=mssql_query($consulta) or die (mssql_error());  
if (mssql_num_rows($resultado) == 0)  
{  
echo "";  
}
else
{
echo "<div class='form-group'>
<a  href='#modal-reserva-rqm' role='button' 
class='btn btn-warning btn-block' data-toggle='modal'>
<i class='fa fa-plus fa-2x'></i>
Crear Requerimiento de Materiales</a>
</div>";

}

}



function ObtenerCentrocosto($idreserva)

{
$link=Conectarse();
$sql="SELECT CODIGOCENTROCOSTO FROM   [022BDCOMUN].DBO.RESERVA_CAB  AS C 
INNER JOIN  [022BDCOMUN].DBO.CENCOSOT AS CCOT ON 
C.OT=CCOT.CODIGOOT WHERE  NRORESERVA='$idreserva'";
$result=mssql_query($sql);
$row=mssql_fetch_array($result);
echo $row['CODIGOCENTROCOSTO'];

}



function ReservaVentas($reserva,$bd,$rq)

{
  
 $link=Conectarse();

 $SQL="INSERT INTO [022BDCOMUN].DBO.RESERVA_DET(NRORESERVA,CODIGO,DESCRIPCION,UNIDAD,CANTIDAD,CANT_PEND,ITEM)
 (SELECT '$reserva',codpro,M.ADESCRI,M.AUNIDAD,CANTID,CANTID,REQITEM
FROM $bd.DBO.REQUISD  AS CD
LEFT JOIN [022BDCOMUN].DBO.RESERVA_DET AS RD ON CD.codpro=RD.CODIGO
LEFT JOIN [010BDCOMUN].DBO.STKART AS S  ON CD.codpro=S.STCODIGO AND S.STALMA='01'
LEFT JOIN [010BDCOMUN].DBO.MAEART AS M  ON CD.codpro=M.ACODIGO WHERE 
 CAST(NROREQUI AS INT)='$rq' AND
S.STALMA='01' AND M.AESTADO='V' AND M.AFSTOCK='S'
GROUP BY CD.REQITEM,CD.NROREQUI,codpro,CD.CENCOST,CD.ORDFAB_REQUI,M.ADESCRI,M.AUNIDAD,CANTID,S.STSKDIS
HAVING ISNULL(S.STSKDIS,0)-SUM(ISNULL(RD.CANT_PEND,0))>=CD.CANTID  AND  
ISNULL(S.STSKDIS,0)-SUM(ISNULL(RD.CANT_PEND,0))<>0  AND ISNULL(S.STSKDIS,0)-SUM(ISNULL(RD.CANT_PEND,0))>=1)
 UNION
 (SELECT '$reserva',codpro,M.ADESCRI,M.AUNIDAD,(ISNULL(S.STSKDIS,0)-SUM(ISNULL(RD.CANT_PEND,0))),
(ISNULL(S.STSKDIS,0)-SUM(ISNULL(RD.CANT_PEND,0))),REQITEM
FROM $bd.DBO.REQUISD  AS CD
LEFT JOIN [022BDCOMUN].DBO.RESERVA_DET AS RD ON CD.codpro=RD.CODIGO
LEFT JOIN [010BDCOMUN].DBO.STKART AS S  ON CD.codpro=S.STCODIGO AND S.STALMA='01'
LEFT JOIN [010BDCOMUN].DBO.MAEART AS M  ON CD.codpro=M.ACODIGO WHERE 
 CAST(NROREQUI AS INT)='$rq' AND
S.STALMA='01' AND M.AESTADO='V' AND M.AFSTOCK='S'
GROUP BY CD.REQITEM,CD.NROREQUI,codpro,CD.CENCOST,CD.ORDFAB_REQUI,M.ADESCRI,M.AUNIDAD,CANTID,S.STSKDIS
HAVING  (ISNULL(S.STSKDIS,0)-SUM(ISNULL(RD.CANT_PEND,0))) < CD.CANTID  AND
(ISNULL(S.STSKDIS,0)-SUM(ISNULL(RD.CANT_PEND,0))) <>0)";

$SQL1="UPDATE  [022BDCOMUN].dbo.RESERVA_CAB  SET ESTADO='02'  WHERE NRORESERVA='$reserva'";

 $RESULT=mssql_query($SQL);
if (!$RESULT)
{
   echo "<script>alert('error al insertar');
         window.location='/reserva/ventas/empresa';
         </script>";
}

else
{
 $RESULT1=mssql_query($SQL1);
  header('Location: /reserva/consulta/reserva-ventas');
}

}


function ActualizarItem($reserva,$codigo,$precio)
{
  $link=Conectarse();
  $SQL="UPDATE [022BDCOMUN].DBO.RESERVA_DET  SET PRECIO='$precio'
  WHERE  NRORESERVA='$reserva' AND CODIGO='$codigo'";
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

function EliminarItem($reserva,$codigo)
{
  $link=Conectarse();
  $SQL="DELETE FROM [022BDCOMUN].DBO.RESERVA_DET  WHERE
   NRORESERVA='$reserva' AND CODIGO='$codigo'";
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


function ListaStock($idusuario,$usuario,$reposicion)
{
  $link=Conectarse();
$SQL="INSERT INTO [022BDCOMUN].DBO.LISTA_COMPRA(CODART,CODKIT,CANART,KDESCRI,KUNIDAD,TIPO,USUARIO,FECHA) 
(SELECT DRV.CODIGO,'',DRV.CANTIDAD-(ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))),M.ADESCRI,M.AUNIDAD,
  '$reposicion','$idusuario',GETDATE()
FROM [022BDCOMUN].DBO.DATOS_RSV AS DRV LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
DRV.CODIGO=D.CODIGO  LEFT JOIN [010BDCOMUN].DBO.STKART AS S ON 
DRV.CODIGO=S.STCODIGO AND STALMA='01' LEFT JOIN [010BDCOMUN].DBO.MAEART AS M ON
DRV.CODIGO=M.ACODIGO  WHERE USUARIO='$idusuario'   AND
M.AFSTOCK='S' AND STALMA='01' AND AESTADO='V'
GROUP BY DRV.CODIGO,M.ADESCRI,DRV.CANTIDAD,DRV.TIPO,M.AUNIDAD,S.STSKDIS
HAVING  (ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))) < DRV.CANTIDAD  AND
(ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))) <>0)
UNION
(SELECT DRV.CODIGO,'',DRV.CANTIDAD,M.ADESCRI,M.AUNIDAD,'$reposicion','$idusuario',GETDATE()
FROM [022BDCOMUN].DBO.DATOS_RSV AS DRV LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
DRV.CODIGO=D.CODIGO  LEFT JOIN [010BDCOMUN].DBO.STKART AS S ON 
DRV.CODIGO=S.STCODIGO AND STALMA='01' LEFT JOIN [010BDCOMUN].DBO.MAEART AS M ON
DRV.CODIGO=M.ACODIGO  WHERE USUARIO='$idusuario'   AND
M.AFSTOCK='S' AND STALMA='01' AND AESTADO='V'
GROUP BY DRV.CODIGO,M.ADESCRI,DRV.CANTIDAD,DRV.TIPO,M.AUNIDAD,S.STSKDIS
HAVING (ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)))=0)";
  $RESULT=mssql_query($SQL);
  if (!$RESULT) 
  {
    echo "error";
  }
  else
  {
  header('Location: http://rockdrillgroup.net/correo/codrise/mail_lista_stock_c.php?usuario='.$usuario);
  }
}



function  ReservaVacia($reserva,$usuario)
{

$link=Conectarse();
$consulta="SELECT C.NRORESERVA,C.OT,C.USUARIO,C.CENTROCOSTO,
C.TIPO FROM [022BDCOMUN].DBO.RESERVA_CAB AS C
WHERE C.ESTADO='00' AND C.USUARIO='$usuario'  AND C.NRORESERVA='$reserva'
AND C.NRORESERVA NOT IN (SELECT D.NRORESERVA FROM [022BDCOMUN].DBO.RESERVA_DET AS D)
ORDER BY C.NRORESERVA";  
$resultado=mssql_query($consulta) or die (mssql_error());  
if (mssql_num_rows($resultado) == 0)  
{  
echo "";  
}
else
{
echo "<a href='../procesos/reserva?reserva=$reserva&tipo=reservavacia'>
<i class='fa fa-trash text-danger fa-3x'></i></a>";
}

}



function EliminarReservaVacia($reserva)
{

  $link=Conectarse();
  $SQL="UPDATE  [022BDCOMUN].DBO.RESERVA_CAB SET ESTADO='06' WHERE NRORESERVA='$reserva'";
  $RESULT=mssql_query($SQL);
  if (!$RESULT)
   {
     echo "error";
   }
   else
   {
      header('Location: /reserva/consulta/reserva');
   }



}


}

 ?>