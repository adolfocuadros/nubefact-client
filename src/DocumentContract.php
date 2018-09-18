<?php
namespace Adolfocuadros\NubefactClient;

abstract class DocumentContract
{
    //Tipos de Comprobante
    public static $FACTURA = 1;
    public static $BOLETA = 2;
    public static $NOTA_CREDITO = 3;
    public static $NOTA_DEBITO = 4;

    //Sunat Transaction
    public static $VENTA_INTERNA = 1;
    public static $EXPORTACION = 2;
    public static $NO_DOMICILIADO = 3;
    public static $VENTA_INTERNA_ANTICIPO = 4;
    public static $VENTA_ITINERANTE = 5;
    public static $FACTURA_GUIA = 6;
    public static $VENTA_ARROZ_PILADO = 7;
    public static $FACTURA_COMPROBANTE_PERCEPCION = 8;
    public static $FACTURA_GUIA_REMITENTE = 10;
    public static $FACTURA_GUIA_TRANSPORTISTA = 11;
    public static $BOLETA_COMPROBANTE_PERCEPCION = 12;
    public static $GASTO_DEDUCIBLE_PERSONA_NATURAL = 13;

    //Tipo de Documento
    public static $RUC = 6;
    public static $DNI = 1;
    public static $VARIOS = '-';
    public static $CARNET_EXTRANJERIA = 4;
    public static $PASAPORTE = 7;
    public static $CEDULA_DIPLOMATICA_IDENTIDAD = 'A';
    public static $NO_DOMICILIADO_SIN_RUC = 0; //Exportación

    //Monedas
    public static $SOL = 1;
    public static $DOLAR = 2;
    public static $EURO = 3;

    //Percepción Tipo
    public static $PERCEPCION_VENTA_INTERNA = 1; //Tasa 2%
    public static $PERCEPCION_ADQUISICION_COMBUSTIBLE = 2; //Tasa 1%
    public static $PERCEPCION_AL_AGENTE_TASA_ESPECIAL = 3; //Tasa 0.5%

    //Unidades de Medida por defecto
    public static $PRODUCTO = 'NIU';
    public static $SERVICIO = 'ZZ';

    //Tipo de IGV
    public static $IGV_GRAVADO = 1;
    public static $IGV_GRAVADO_RETIRO_PREMIO = 2;
    public static $IGV_GRAVADO_RETIRO_DONACION = 3;
    public static $IGV_GRAVADO_RETIRO = 4;
    public static $IGV_GRAVADO_RETIRO_PUBLICIDAD = 5;
    public static $IGV_GRAVADO_BONIFICACIONES = 6;
    public static $IGV_GRAVADO_RETIRO_ENTREGA_TRABAJADORES = 7;
    public static $IGV_EXONERADO = 8;
    public static $IGV_INAFECTO = 9;
    public static $IGV_INAFECTO_RETIRO_BONIFICACION = 10;
    public static $IGV_INAFECTO_RETIRO = 11;
    public static $IGV_INAFECTO_RETIRO_MUESTRAS_MEDICAS = 12;
    public static $IGV_INAFECTO_RETIRO_CONVENIO_COLECTIVO = 13;
    public static $IGV_INAFECTO_RETIRO_PREMIO = 14;
    public static $IGV_INAFECTO_RETIRO_PUBLICIDAD = 15;
    public static $IGV_EXPORTACION = 16;

    /**
     * Se usa para obtener Array generado de Acuerdo a las especificaciones Nubefact
     * @return mixed
     */
    abstract public function getArray();

    /**
     * Retorna el Tipo de Documento
     * 1 = FACTURA
     * 2 = BOLETA
     * 3 = NOTA DE CRÉDITO
     * 4 = NOTA DE DÉBITO
     * @return mixed
     */
    abstract public function getType();
}