<?php
namespace Adolfocuadros\NubefactClient;


class BoletaElectronica extends DocumentoEmision
{
    public function __construct()
    {
        parent::__construct();

        $this->data['tipo_de_comprobante'] = $this::$BOLETA;
    }
}