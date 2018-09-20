<?php
include_once '../vendor/autoload.php';

use Adolfocuadros\NubefactClient\NotaCredito;

$ruta = 'https://demo.nubefact.com/api/v1/03989d1a-6c8c-4b71-b1cd-7d37001deaa0';
$token = 'd0a80b88cde446d092025465bdb4673e103a0d881ca6479ebbab10664dbc5677';

$nubefact = new \Adolfocuadros\NubefactClient\Nubefact($ruta, $token);

$nota = new NotaCredito();
$nota->setPorcentajeIGV(18);
$nota->setSerie('B001');
$nota->setNumero(21);
$nota->setTotal(118);
$nota->setTotalIGV(18);
$nota->setTotalGravada(100);
$nota->setCliente(NotaCredito::$VARIOS, '47005688', 'Adolfo Cuadros', 'Jr. 123');

//$factura->addClienteEmail('ronnie.adolfo@gmail.com');
$nota->addItem(NotaCredito::$SERVICIO, 'C123', 'Venta de Computadora ABC', 1, 100, 100, 100, NotaCredito::$IGV_GRAVADO,18,100);

$response = $nubefact->sendDocument($nota);

var_dump($response->getUrlPDF());