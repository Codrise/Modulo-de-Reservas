<?php 

class Ensamble
{
	
	function Registrar($codigo,$usuario)
	{   
		$link=Conectarse();
		$SQL="INSERT INTO [022BDCOMUN].DBO.KIT
		(CODART,CODKIT,CANTIDAD,DESCRIPCION,UNIDAD,TIPO,USUARIO)
		SELECT  CODART,CODKIT,CANART,KDESCRI,KUNIDAD,'ASS','$usuario'
		FROM  [010BDCOMUN].DBO.KITS  AS  K
		INNER JOIN  [010BDCOMUN].DBO.MAEART AS M 
		ON K.CODKIT=M.ACODIGO AND AESTADO='V' AND K.CODKIT='$codigo' 
		AND KUNIDAD <> 'ASS'  AND KUNIDAD <> 'KIT'
		ORDER BY M.ADESCRI";
         
        $RESULT=mssql_query($SQL);

        if (!$RESULT)
         {
        	echo "error al registrar";
         }
    
         else

         {
         	echo "<script>
                 window.location='/reserva/pages/reserva-kit?tipo=ass';
         	     </script>";
         }


	}
}







 ?>