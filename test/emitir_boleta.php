<?php
include_once '../vendor/autoload.php';

use Adolfocuadros\NubefactClient\BoletaElectronica;

$ruta = 'https://demo.nubefact.com/api/v1/03989d1a-6c8c-4b71-b1cd-7d37001deaa0';
$token = 'd0a80b88cde446d092025465bdb4673e103a0d881ca6479ebbab10664dbc5677';

$nubefact = new \Adolfocuadros\NubefactClient\Nubefact($ruta, $token);

$boleta = new BoletaElectronica();
$boleta->setPorcentajeIGV(18);
$boleta->setSerie('B001');
$boleta->setNumero(21);
$boleta->setTotal(118);
$boleta->setTotalIGV(18);
$boleta->setTotalGravada(100);
$boleta->setCliente(BoletaElectronica::$VARIOS, '47005688', 'Adolfo Cuadros', 'Jr. 123');
//$boleta->addClienteEmail('ronnie.adolfo@gmail.com');
$boleta->addItem(BoletaElectronica::$SERVICIO, 'C123', 'Venta de Computadora ABC', 1, 100, 100, 100, BoletaElectronica::$IGV_GRAVADO,18,100);

$response = $nubefact->sendDocument($boleta);

var_dump($response->getUrlPDF());