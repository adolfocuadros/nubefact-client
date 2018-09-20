<?php
include_once '../vendor/autoload.php';

use Adolfocuadros\NubefactClient\FacturaElectronica;

$ruta = 'https://demo.nubefact.com/api/v1/03989d1a-6c8c-4b71-b1cd-7d37001deaa0';
$token = 'd0a80b88cde446d092025465bdb4673e103a0d881ca6479ebbab10664dbc5677';

$nubefact = new \Adolfocuadros\NubefactClient\Nubefact($ruta, $token);

$factura = new FacturaElectronica();
$factura->setPorcentajeIGV(18);
$factura->setSerie('F001');
$factura->setNumero(80);
$factura->setTotal(100);
$factura->setTotalIGV(18);
$factura->setTotalGravada(100);
$factura->setCliente(FacturaElectronica::$RUC, '10470056881', 'Adolfo Cuadros', 'Jr. ABC SN');
$factura->addClienteEmail('ronnie.adolfo@gmail.com');
$factura->addItem(FacturaElectronica::$SERVICIO, 'C123', 'Venta de Computadora ABC', 1, 100, 100, 100, FacturaElectronica::$IGV_GRAVADO,18,100);

$response = $nubefact->sendDocument($factura);

var_dump($response->getUrlPDF());

//var_dump($factura->getArray());