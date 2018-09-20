<?php
namespace Adolfocuadros\NubefactClient;

class NotaCredito extends DocumentoEmision
{
    public static $NC_ANUNACION_OPERACION = 1;
    public static $NC_ANUNACION_ERROR_RUC = 2;
    public static $NC_CORRECCION_ERROR_DESCRIPCION = 3;
    public static $NC_DESCUENTO_GLOBAL = 4;
    public static $NC_DESCUENTO_ITEM = 5;
    public static $NC_DEVOLUCION_TOTAL = 6;
    public static $NC_DEVOLUCION_ITEM = 7;
    public static $NC_BONIFICACION = 8;
    public static $NC_DISMINUCION_VALOR = 9;

    public function __construct()
    {
        parent::__construct();

        $this->data['tipo_de_comprobante'] = $this::$NOTA_CREDITO;
    }

    public function setDocumentoModificaTipo($tipo)
    {
        $this->setRaw('documento_que_se_modifica_tipo', $tipo);
    }

    public function setDocumentoModificaSerie($serie)
    {
        $this->setRaw('documento_que_se_modifica_serie', $serie);
    }

    public function setDocumentoModificaNumero($numero)
    {
        $this->setRaw('documento_que_se_modifica_numero', $numero);
    }

    public function tipoNotaCredito($tipo)
    {
        $this->setRaw('tipo_de_nota_de_credito', $tipo);
    }
}