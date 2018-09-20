<?php
namespace Adolfocuadros\NubefactClient;


class Anulacion extends DocumentContract
{
    protected $data;

    public function __construct()
    {
        $this->data['operacion'] = 'generar_anulacion';
    }

    public function setTipoComprobante($tipo)
    {
        $this->data['tipo_de_comprobante'] = $tipo;
    }

    public function setSerie($serie)
    {
        $this->data['serie'] = $serie;
    }

    public function setNumero($numero)
    {
        $this->data['numero'] = $numero;
    }

    public function setMotivo($motivo)
    {
        $this->data['motivo'] = $motivo;
    }

    public function setCodigoUnico($codigo)
    {
        $this->data['codigo_unico'] = $codigo;
    }

    function getArray()
    {
        return $this->data;
    }
}