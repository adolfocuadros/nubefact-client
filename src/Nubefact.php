<?php
namespace Adolfocuadros\NubefactClient;

use Adolfocuadros\NubefactClient\Exceptions\BadRequestException;
use Adolfocuadros\NubefactClient\Exceptions\NotAuthorized;
use Adolfocuadros\NubefactClient\Exceptions\ServerErrorException;
use GuzzleHttp\Client;

class Nubefact
{
    private $ruta;
    private $token;
    private $client;

    public function __construct($ruta, $token)
    {
        $this->ruta = $ruta;
        $this->token = $token;
        $this->client = new Client([
            'base_uri' => $this->ruta,
            'headers' => [
                'Authorization' => $this->token
            ]
        ]);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function sendDocument(DocumentContract $document)
    {
        try {
            $response = $this->getClient()->request('POST', '', [
                'json' => $document->getArray()
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 400) {
                throw new BadRequestException($response->getBody());
            } elseif($response->getStatusCode() == 401) {
                throw new NotAuthorized($response->getBody());
            } else {
                throw new ServerErrorException('Hubo un error con el servidor');
            }
        }

        return new NubefactResponse($response);
    }
}