<?php
include_once '../vendor/autoload.php';

use Adolfocuadros\NubefactClient\Anulacion;

$ruta = 'https://demo.nubefact.com/api/v1/03989d1a-6c8c-4b71-b1cd-7d37001deaa0';
$token = 'd0a80b88cde446d092025465bdb4673e103a0d881ca6479ebbab10664dbc5677';

$nubefact = new \Adolfocuadros\NubefactClient\Nubefact($ruta, $token);

$anulacion = new Anulacion();
$anulacion->setTipoComprobante(Anulacion::$BOLETA);
$anulacion->setSerie('B001');
$anulacion->setNumero(21);
$anulacion->setMotivo('Error en el sistema');

$response = $nubefact->sendDocument($anulacion);

var_dump($response->getBody());