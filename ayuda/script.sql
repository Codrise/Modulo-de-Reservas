|TABLAS NECESARIAS PARA TRABAJAR EL MODULO DE RESERVA

/*****************************************************/
TABLAS RESERVA DE MATERIALES
/****************************************************/
SELECT * FROM [022BDCOMUN].DBO.RESERVA_CAB

SELECT * FROM [022BDCOMUN].DBO.RESERVA_DET

/*****************************************************/
TABLAS REQUERIMIENTO DE MATERIALES
/****************************************************/
SELECT * FROM [010BDCOMUN].DBO.INV_REQMATERIAL_CAB

SELECT * FROM [010BDCOMUN].DBO.INV_REQMATERIAL_DET

/*****************************************************/
TABLA ASOCIACION CENTRO DE COSTO Y OT
/****************************************************/
SELECT * FROM [022BDCOMUN].DBO.CENCOSOT

/*****************************************************/
TABLA DOCUMENTOS NOTA DE INGRESO RESERVADA
/****************************************************/
SELECT * FROM [022BDCOMUN].DBO.DOCUMENTO

/*****************************************************/
TABLAS CORRELATIVOE DE REQ DE MATERIALES
/****************************************************/
SELECT * FROM [010BDCOMUN].DBO.NUM_DOCCOMPRAS WHERE CTNCODIGO='RM'

/*****************************************************/
TABLAS CARGA DE RESERVA EXCEL
/****************************************************/
SELECT * FROM [010BDCOMUN].DBO.DATOS_RSV


/*****************************************************/
TABLAS CORRELATIVOE DE RESERVAS
/****************************************************/
SELECT * FROM [022BDCOMUN].DBO.NUM_DOCCOMPRAS   WHERE CTNCODIGO='RM'


/*****************************************************/
TABLAS DE PRE_REQUERIMIENTO
/****************************************************/

SELECT * FROM [022BDCOMUN].DBO.PRE_REQUISD 

/*****************************************************/
TABLAS DE AUDITORIA DE REQUERIMIENTO
/****************************************************/
SELECT NROREQUI,CODSOLIC,TIPOREQUI,USUARIO,FECHA,ESTADO FROM AUD_RQ

-----------------------------------------------------

REINICIO DE TABLAS
-----------------------------------------------------
 TRUNCATE TABLE [022BDCOMUN].DBO.RESERVA_DET

TRUNCATE TABLE [022BDCOMUN].DBO.RESERVA_CAB

TRUNCATE TABLE [022BDCOMUN].DBO.DOCUMENTO

TRUNCATE TABLE [022BDCOMUN].DBO.CENCOSOT

TRUNCATE TABLE [010BDCOMUN].DBO.INV_REQMATERIAL_CAB

TRUNCATE TABLE [010BDCOMUN].DBO.INV_REQMATERIAL_DET

UPDATE [010BDCOMUN].DBO.NUM_DOCCOMPRAS SET CTNNUMERO=0 WHERE  CTNCODIGO='RM' 

UPDATE [022BDCOMUN].DBO.NUM_DOCCOMPRAS SET  CTNNUMERO='0' WHERE CTNCODIGO='RV' 

TRUNCATE TABLE [022BDCOMUN].DBO.DATOS_RSV

TRUNCATE TABLE [022BDCOMUN].DBO.PRE_REQUISD
TRUNCATE TABLE [022BDCOMUN].DBO.AUD_RQ
TRUNCATE TABLE [022BDCOMUN].DBO.AUD_DOCUMENTO







