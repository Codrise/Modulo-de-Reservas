<script type="text/javascript" language="javascript"
src="listado/ni.js"></script>

<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="ni">
<?php require_once('../../includes/bd/conexion.php');
$link=  Conectarse();
$listado=  mssql_query("SELECT (ROW_NUMBER() OVER(ORDER BY MC.CANUMDOC))AS ITEM,MC.CANUMDOC AS  NI,
	OC_SOLICITA,TDESCRI,
	C.OC_CNUMORD AS OC,C.OC_CNRODOCREF AS RQ,CONVERT(VARCHAR,MC.CAFECDOC,103)AS FECHA,
	OC_ORDFAB AS OT,C.OC_CRAZSOC AS NOMPROV,C.oc_ccodpro AS CODPROV
,A.CC AS CENTROCOSTO FROM  [010BDCOMUN].DBO.COMOVC AS C INNER JOIN 
[010BDCOMUN].DBO.MOVALMCAB AS MC ON C.OC_CNUMORD=MC.CANUMORD  INNER JOIN 
[022BDCOMUN].DBO.AUD_RQ AS A ON 
C.OC_CNRODOCREF=A.NROREQUI INNER JOIN 
[010BDCOMUN].DBO.TABAYU AS T ON C.OC_SOLICITA=T.TCLAVE AND TCOD='12'
INNER JOIN [022BDCOMUN].DBO.CENCOSOT  AS O ON 
OC_ORDFAB=O.CODIGOOT
WHERE C.OC_CSITORD IN ('03','04')AND C.OC_CDOCREF='RQ'
AND MC.CAALMA='01' AND MC.CATD='NI' AND CACODMOV='CL' 
AND MC.CASITGUI='V' /*AND OC_SOLICITA='138' */    /* and 
MC.CAFECDOC  BETWEEN '2050-10-05' AND '2050-12-31' */ and 
MC.CANUMDOC  NOT IN (SELECT NRODOCUMENTO FROM 
[022BDCOMUN].DBO.DOCUMENTO ) ORDER BY MC.CANUMDOC 

",$link);
?>
<thead>
<tr class="info">
<th>IT</th>
<th>SOLICITANTE</th>
<th>NI</th>
<th>OC</th>
<th>RQ</th>
<th>FECHA</th>
<th>OT</th>
<th>RUC</th>
<th>RAZÓN SOCIAL</th>
<th><a href="#" class="btn btn-primary"><i class="fa fa-search fa-1x"></i></a></th>
</tr>
</thead>
<tbody>
<?php


while($reg= mssql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[ITEM]; ?></td>
<td><?php echo $reg[TDESCRI]; ?></td>
<td><?php echo $reg[NI]; ?></td>
<td><?php echo $reg[OC]; ?></td>
<td><?php echo $reg[RQ]; ?></td>
<td><?php echo $reg[FECHA]; ?></td>
<td><?php echo $reg[OT]; ?></td>
<td><?php echo $reg[CODPROV]; ?></td>
<td><?php echo $reg[NOMPROV]; ?></td>
<td><a href="../pages/ni?ni=<?php echo $reg[NI]; ?>" 
class="btn btn-primary" ><i class="fa fa-search fa-1x"></i></a></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
