<?php 

class Consultakit
{

function liberarkit()
{
$link=Conectarse();
$SQL="DELETE FROM [022BDCOMUN].DBO.KIT  WHERE 
TIPO='KIT' AND USUARIO='$_SESSION[id_usuario]'";

$RESULT=mssql_query($SQL);

if (!$RESULT)
{
echo "<script>
    alert('error al consultar');
   window.location='/reserva/pages/consulta-kit';
   </script>";
}

else 
{
echo "<script>
   window.location='/reserva/pages/kit';
  </script>";
}

}


function liberarass()
{
$link=Conectarse();
$SQL="DELETE FROM [022BDCOMUN].DBO.KIT  WHERE 
TIPO='ASS' AND USUARIO='$_SESSION[id_usuario]'";

$RESULT=mssql_query($SQL);

if (!$RESULT)
{
echo "<script>
    alert('error al consultar');
   window.location='/reserva/pages/consulta-kit';
   </script>";
}

else 
{
echo "<script>
    window.location='/reserva/pages/ensamble';
  </script>";
}
}


function liberarrep()

{
$link=Conectarse();
$SQL="DELETE FROM [022BDCOMUN].DBO.KIT  WHERE 
TIPO='REP' AND USUARIO='$_SESSION[id_usuario]'";

$RESULT=mssql_query($SQL);

if (!$RESULT)
{
echo "<script>
    alert('error al consultar');
   window.location='/reserva/pages/consulta-kit';
   </script>";
}
else 
{
echo "<script>
    window.location='/reserva/pages/reparacion';
  </script>";
}

}


function EliminarId($id,$tipo)
{

$link=Conectarse();
$SQL="DELETE FROM [022BDCOMUN].DBO.KIT  WHERE   IDKIT='$id'";

$RESULT=mssql_query($SQL);

if (!$RESULT)
{
echo "<script>
    alert('error al consultar');
   window.location='/reserva/pages/reserva-kit?tipo=$tipo';
   </script>";
}
else 
{
echo "<script>
    window.location='/reserva/pages/reserva-kit?tipo=$tipo';
  </script>";
}




}

function Registrar($nroreserva,$tipokit,$usuario)
{

$link=Conectarse();

$SQL="INSERT INTO RESERVA_DET(NRORESERVA,CODIGO,CANTIDAD,CANT_PEND)
SELECT $nroreserva,K.CODART ,K.CANTIDAD,K.CANTIDAD
FROM [022BDCOMUN].DBO.KIT  AS K  INNER JOIN 
[010BDCOMUN].DBO.STKART AS S ON 
K.CODART=S.STCODIGO AND S.STALMA='01' LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
K.CODART=D.CODIGO   WHERE K.USUARIO='$usuario' AND  TIPO='$tipokit'
GROUP BY  K.IDKIT,K.CODART,K.CODKIT,K.CANTIDAD,K.DESCRIPCION,K.UNIDAD,K.TIPO,S.STSKDIS 
HAVING K.CANTIDAD <=  (ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))) AND K.CANTIDAD <>0
";

$SQL1="INSERT INTO RESERVA_DET(NRORESERVA,CODIGO,CANTIDAD,CANT_PEND)
SELECT $nroreserva,K.CODART ,(ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))),
(ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))) 
FROM [022BDCOMUN].DBO.KIT  AS K  INNER JOIN 
[010BDCOMUN].DBO.STKART AS S ON 
K.CODART=S.STCODIGO AND S.STALMA='01' LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
K.CODART=D.CODIGO   WHERE K.USUARIO=$usuario AND  TIPO='$tipokit'
GROUP BY  K.IDKIT,K.CODART,K.CODKIT,K.CANTIDAD,K.DESCRIPCION,K.UNIDAD,K.TIPO,S.STSKDIS 
HAVING K.CANTIDAD >  (ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))) 
AND (ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))) <>0
";

$SQL2="DELETE FROM  [022BDCOMUN].DBO.KIT WHERE  TIPO='$tipokit' AND USUARIO='$usuario'";

$RESULT=mssql_query($SQL);

if (!$RESULT) 
{
echo "<script>
      alert('Error al Registrar');
      window.location='/reserva/pages/reserva-kit?tipo=$tipokit';
      </script>";
}
else
{
$RESULT1=mssql_query($SQL1);
$RESULT2=mssql_query($SQL2);
echo "<script>window.location='/reserva/pages/editar-reserva?id=$nroreserva';</script>";

}
}



function listaCompra($tipokit,$usuario,$usuariocorreo)
{
$link=Conectarse();

$SQL="INSERT INTO LISTA_COMPRA(CODART,CODKIT,CANART,KDESCRI,KUNIDAD,TIPO,USUARIO,FECHA)
SELECT K.CODART,K.CODKIT,(K.CANTIDAD-(ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0)))),
K.DESCRIPCION,K.UNIDAD,K.TIPO,K.USUARIO,GETDATE()
FROM [022BDCOMUN].DBO.KIT  AS K  INNER JOIN 
[010BDCOMUN].DBO.STKART AS S ON 
K.CODART=S.STCODIGO AND S.STALMA='01' LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
K.CODART=D.CODIGO  WHERE K.USUARIO='$usuario' AND  TIPO='$tipokit'
GROUP BY  K.IDKIT,K.CODART,K.CODKIT,K.CANTIDAD,K.DESCRIPCION,K.UNIDAD,K.TIPO,K.USUARIO,S.STSKDIS 
HAVING K.CANTIDAD >  (ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))) 
AND (ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))) <>0
";

$SQL1="INSERT INTO LISTA_COMPRA(CODART,CODKIT,CANART,KDESCRI,KUNIDAD,TIPO,USUARIO,FECHA)
SELECT K.CODART,K.CODKIT,K.CANTIDAD,
K.DESCRIPCION,K.UNIDAD,K.TIPO,K.USUARIO,GETDATE()
FROM [022BDCOMUN].DBO.KIT  AS K  INNER JOIN 
[010BDCOMUN].DBO.STKART AS S ON 
K.CODART=S.STCODIGO AND S.STALMA='01' LEFT JOIN 
[022BDCOMUN].DBO.RESERVA_DET AS D ON 
K.CODART=D.CODIGO  WHERE K.USUARIO='$usuario' AND  TIPO='$tipokit'
GROUP BY  K.IDKIT,K.CODART,K.CODKIT,K.CANTIDAD,K.DESCRIPCION,K.UNIDAD,K.TIPO,K.USUARIO,S.STSKDIS 
HAVING (ISNULL(S.STSKDIS,0)-SUM(ISNULL(D.CANT_PEND,0))) =0

";


$RESULT=mssql_query($SQL);

if (!$RESULT) 
{
echo "<script>
      alert('Error al Registrar');
      window.location='/reserva/pages/reserva-kit?tipo=$tipokit';
      </script>";
}
else
{
$RESULT1=mssql_query($SQL1);

header('Location: http://rockdrillgroup.net/correo/codrise/mail_lista_compra_c.php?tipo='.$tipokit.'&usuario='.$usuariocorreo);


}

}







}
?>