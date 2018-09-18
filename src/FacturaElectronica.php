<?php
namespace Adolfocuadros\NubefactClient;


class FacturaElectronica extends DocumentContract
{
    private $data;

    public function __construct()
    {
        $this->data['operacion'] = 'generar_comprobante';
        $this->data['tipo_de_comprobante'] = $this::$FACTURA;
        $this->data['sunat_transaction'] = $this::$VENTA_INTERNA;

        //Valores por defecto
        $this->setFechaEmision(Date('d-m-Y'));
        $this->setMoneda($this::$SOL);
    }

    public function setSunatEnvioAutomatico($bool)
    {
        $this->data['enviar_automaticamente_a_la_sunat'] = $bool;
    }

    public function setSerie($serie)
    {
        $this->data['serie'] = $serie;
    }

    public function setNumero($numero)
    {
        $this->data['numero'] = $numero;
    }

    public function setCliente($tipo, $numero, $denominacion, $direccion)
    {
        $this->data['cliente_tipo_de_documento'] = $tipo;
        $this->data['cliente_numero_de_documento'] = $numero;
        $this->data['cliente_denominacion'] = $denominacion;
        $this->data['cliente_direccion'] = $direccion;
    }

    public function addClienteEmail($email)
    {
        $this->data['enviar_automaticamente_al_cliente'] = true;
        if(!isset($this->data['cliente_email'])) {
            $this->data['cliente_email'] = $email;
        } elseif(!isset($this->data['cliente_email_1'])) {
            $this->data['cliente_email_1'] = $email;
        } elseif(!isset($this->data['cliente_email_2'])) {
            $this->data['cliente_email_2'] = $email;
        } else {
            throw new \Exception('Solo puede agregar máximo 3 correo electrónicos.');
        }
    }

    public function setFechaEmision($fecha)
    {
        if(!preg_match('/[0-9]{2}\-[0-9]{2}\-[0-9]{4}/i',$fecha)) {
            throw new \Exception('El formato de fecha debe de ser DD-MM-AAAA.');
        }
        $this->data['fecha_de_emision'] = $fecha;
    }

    public function setFechaVencimiento($fecha)
    {
        if(!preg_match('/[0-9]{2}\-[0-9]{2}\-[0-9]{4}/i',$fecha)) {
            throw new \Exception('El formato de fecha debe de ser DD-MM-AAAA.');
        }
        $this->data['fecha_de_vencimiento'] = $fecha;
    }

    public function setMoneda($moneda)
    {
        $this->data['moneda'] = $moneda;
    }

    public function setTipoCambio($tipoCambio)
    {
        $this->data['tipo_de_cambio'] = $tipoCambio;
    }

    public function setPorcentajeIGV($porcentaje)
    {
        $this->data['porcentaje_de_igv'] = $porcentaje;
    }

    public function setTotal($total)
    {
        $this->data['total'] = $total;
    }

    public function setTotalIGV($igv)
    {
        $this->data['total_igv'] = $igv;
    }

    public function setTotalGravada($totalGravada)
    {
        $this->data['total_gravada'] = $totalGravada;
    }

    public function setTotalInafecta($totalInafecta)
    {
        $this->data['total_inafecta'] = $totalInafecta;
    }

    public function setDetraccion($detraccion)
    {
        $this->data['detraccion'] = $detraccion;
    }

    public function setObservaciones($observaciones)
    {
        $observaciones = str_replace("\n",'<br>', $observaciones);
        $this->data['observaciones'] = $observaciones;
    }

    public function addItem($unidad, $codigoInterno, $descripcion, $cantidad, $valorUnitario, $precioUnitario, $subtotal, $tipo_igv, $igv, $total, $descuento = null, $anticipoRegularizacion = null)
    {
        $item = [
            'unidad_de_medida'  => $unidad,
            'codigo'            => $codigoInterno,
            'descripcion'       => $descripcion,
            'cantidad'          => $cantidad,
            'valor_unitario'    => $valorUnitario,
            'precio_unitario'   => $precioUnitario,
            'descuento'         => $descuento,
            'subtotal'          => $subtotal,
            'tipo_de_igv'       => $tipo_igv,
            'igv'               => $igv,
            'total'             => $total
        ];

        if(is_array($anticipoRegularizacion) && isset($anticipoRegularizacion['serie']) && isset($anticipoRegularizacion['numero'])) {
            $item['anticipo_regularizacion'] = true;
            $item['anticipo_documento_serie'] = $anticipoRegularizacion['serie'];
            $item['anticipo_documento_numero'] = $anticipoRegularizacion['numero'];
        }

        if(!isset($this->data['items'])) {
            $this->data['items'] = [];
        }
        $this->data['items'][] = $item;
    }

    public function setRaw($key, $value)
    {
        $this->data[$key] = $value;
    }

    function getArray()
    {
        return $this->data;
    }

    public function getType()
    {
        // TODO: Implement getType() method.
    }
}