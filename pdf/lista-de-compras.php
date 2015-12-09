<?php 
include('../includes/bd/conexion.php');
$link=Conectarse();
$consulta="SELECT  CODART,CODKIT,CANART,KDESCRI,KUNIDAD,TIPO,FECHA,nombres+' '+apellidos as FULLNAME
 from LISTA_COMPRA  AS LC  INNER  JOIN  USUARIOS AS U  ON 
LC.USUARIO=U.ID_USUARIO  ;";  
$resultado=mssql_query($consulta) or die (mssql_error());  
if (mssql_num_rows($resultado) == 0)  
{  
echo "no hay datos";  
}
else
{

date_default_timezone_set('America/Lima');

if (PHP_SAPI == 'cli')
die('Este archivo solo se puede ver desde un navegador web');

/** Se agrega la libreria PHPExcel */
require_once '../librerias/PHPExcel/PHPExcel.php';

// Se crea el objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Se asignan las propiedades del libro
$objPHPExcel->getProperties()->setCreator("usuario codrise") //Autor
->setLastModifiedBy("usuario codrise") //Ultimo usuario que lo modificó
->setTitle("Lista de Compra Codrise")
->setSubject("Lista de Comora Codrise")
->setDescription("Lista de Compra Codrise")
->setKeywords("Lista de Compra Codrise")
->setCategory("Reporte excel");

$tituloReporte = "LISTA DE COMPRA CODRISE";
$titulosColumnas=
array('CÓDIGO KIT', 'CÓDIGO ARTICULO', 'DESCRIPCIÓN','CANTIDAD','UNIDAD','TIPO','FECHA','USUARIO');

$objPHPExcel->setActiveSheetIndex(0)
->mergeCells('A1:H1');

// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1',$tituloReporte)
->setCellValue('A3',  $titulosColumnas[0])
->setCellValue('B3',  $titulosColumnas[1])
->setCellValue('C3',  $titulosColumnas[2])
->setCellValue('D3',  $titulosColumnas[3])
->setCellValue('E3',  $titulosColumnas[4])
->setCellValue('F3',  $titulosColumnas[5])
->setCellValue('G3',  $titulosColumnas[6])
->setCellValue('H3',  $titulosColumnas[7]);


//Se agregan los datos de los alumnos
$i = 4;
while ($fila=mssql_fetch_array($resultado)) {
$objPHPExcel->setActiveSheetIndex(0)
->setCellValueExplicit('A'.$i,  $fila['CODKIT'],PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('B'.$i,  $fila['CODART'],PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('C'.$i,  $fila['KDESCRI'],PHPExcel_Cell_DataType::TYPE_STRING)
//->setCellValueExplicit('D'.$i,  $fila['CANART'],PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('D'.$i,  $fila['CANART'])
->setCellValueExplicit('E'.$i,  $fila['KUNIDAD'],PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('F'.$i,  $fila['TIPO'],PHPExcel_Cell_DataType::TYPE_STRING)
->setCellValueExplicit('G'.$i,  $fila['FECHA'])
->setCellValueExplicit('H'.$i,  $fila['FULLNAME'],PHPExcel_Cell_DataType::TYPE_STRING);
$i++;
}

$estiloTituloReporte = array(
'font' => array(
'name'      => 'Verdana',
'bold'      => true,
'italic'    => false,
'strike'    => false,
'size' =>18,
'color'     => array(
'rgb' => 'FFFFFF'
)
),
'fill' => array(
'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
'color'	=> array('argb' => '2A55FF')
),
'borders' => array(
'allborders' => array(
'style' => PHPExcel_Style_Border::BORDER_NONE                    
)
), 
'alignment' =>  array(
'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
'rotation'   => 0,
'wrap'          => TRUE
)
);

$estiloTituloColumnas = array(
'font' => array(
'name'      => 'Arial',
'bold'      => true,
'size'     => 9  ,                       
'color'     => array(
'rgb' => 'FFFFFF'//color letra
)
),
'fill' 	=> array(
'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
'rotation'   => 90,
'startcolor' => array(
'rgb' => '2A55FF'//color cabecera reporte-inicio
),
'endcolor'   => array(
'argb' => '2A55FF'//color cabecera reporte-fin
)
),
'borders' => array(
'top'     => array(
'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
'color' => array(
'rgb' => '143860'
)
),
'bottom'     => array(
'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
'color' => array(
'rgb' => '143860'
)
)
),
'alignment' =>  array(
'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
'wrap'          => TRUE
));

$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray(
array(
'font' => array(
'name'      => 'Arial',  
'size'     => 9  ,               
'color'     => array(
'rgb' => '000000'
)
),
'fill' 	=> array(
'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
'color'		=> array('argb' => 'D4D4FF')//color de datos
),
'borders' => array(
'left'     => array(
'style' => PHPExcel_Style_Border::BORDER_THIN ,
'color' => array(
'rgb' => '3a2a47'
)
)             
)
));

$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($estiloTituloColumnas);		
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:H".($i-1));

for($i = 'A'; $i <= 'N'; $i++){
$objPHPExcel->setActiveSheetIndex(0)			
->getColumnDimension($i)->setAutoSize(TRUE);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle('LISTA DE COMPRA');

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);
// Inmovilizar paneles 
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadecompra.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');


}


 ?>