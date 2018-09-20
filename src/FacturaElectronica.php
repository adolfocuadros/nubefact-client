<?php
namespace Adolfocuadros\NubefactClient;


class FacturaElectronica extends DocumentoEmision
{
    public function __construct()
    {
        parent::__construct();

        $this->data['tipo_de_comprobante'] = $this::$FACTURA;
    }
}