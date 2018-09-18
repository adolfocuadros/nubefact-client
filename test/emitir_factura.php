<?php
include_once '../vendor/autoload.php';

use Adolfocuadros\NubefactClient\FacturaElectronica;

$ruta = 'https://www.nubefact.com/api/v1/c1d12dbd-4455-46bb-854a-649b5095a238';
$token = '18a617b970f34d12ab2727381e4f6196872c17746f024fd8b359a63f8f7b925c';

$nubefact = new \Adolfocuadros\NubefactClient\Nubefact($ruta, $token);

$factura = new FacturaElectronica();
$factura->setPorcentajeIGV(18);
$factura->setSerie('F001');
$factura->setNumero(7);
$factura->setTotal(100);
$factura->setTotalIGV(18);
$factura->setTotalGravada(100);
$factura->setCliente(FacturaElectronica::$RUC, '10470056881', 'Adolfo Cuadros', 'Jr. ABC SN');
$factura->addClienteEmail('ronnie.adolfo@gmail.com');
$factura->addItem(FacturaElectronica::$SERVICIO, 'C123', 'Venta de Computadora ABC', 1, 100, 100, 100, FacturaElectronica::$IGV_GRAVADO,18,100);

$response = $nubefact->sendDocument($factura);

var_dump($response->getUrlPDF());

//var_dump($factura->getArray());