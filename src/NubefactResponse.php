<?php
namespace Adolfocuadros\NubefactClient;

use GuzzleHttp\Psr7\Response;

class NubefactResponse
{
    private $response;
    private $data;

    public function __construct(Response $response)
    {
        $this->response = $response;
        $this->data = \GuzzleHttp\json_decode($response->getBody());
    }

    public function getBody()
    {
        return $this->response->getBody();
    }

    public function getSunatResponse()
    {
        return [
            'aceptada_por_sunat' => $this->data->aceptada_por_sunat,
            'sunat_description' => $this->data->sunat_description,
            'sunat_note' => $this->data->sunat_note,
            'sunat_responsecode' => $this->data->sunat_responsecode,
            'sunat_soap_error' => $this->data->sunat_soap_error,
        ];
    }

    public function getHash()
    {
        return $this->data->codigo_hash;
    }

    public function getCodigoBarras()
    {
        return $this->data->codigo_de_barras;
    }

    public function getUrlPDF()
    {
        return $this->data->enlace_del_pdf;
    }

    public function getUrlXML()
    {
        return $this->data->enlace_del_xml;
    }

    public function getUrlCDR()
    {
        return $this->data->enlace_del_cdr;
    }
}