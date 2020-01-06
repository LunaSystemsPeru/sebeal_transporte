<?php
require_once 'Conectar.php';

class Cliente
{
    private $id_cliente;
    private $documento;
    private $razon_social;
    private $direccion_factura;
    private $telefono;
    private $tipo_cliente;
    private $ultimo_envio;
    private $costo_kilo;
    private $costo_caja;

    private $c_conectar;

    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getDireccionFactura()
    {
        return $this->direccion_factura;
    }

    /**
     * @param mixed $direccion_factura
     */
    public function setDireccionFactura($direccion_factura)
    {
        $this->direccion_factura = $direccion_factura;
    }


    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param mixed $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * @param mixed $razon_social
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = $razon_social;
    }

    /**
     * @return mixed
     */


    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getTipoCliente()
    {
        return $this->tipo_cliente;
    }

    /**
     * @param mixed $tipo_cliente
     */
    public function setTipoCliente($tipo_cliente)
    {
        $this->tipo_cliente = $tipo_cliente;
    }

    /**
     * @return mixed
     */
    public function getUltimoEnvio()
    {
        return $this->ultimo_envio;
    }

    /**
     * @param mixed $ultimo_envio
     */
    public function setUltimoEnvio($ultimo_envio)
    {
        $this->ultimo_envio = $ultimo_envio;
    }

    /**
     * @return mixed
     */
    public function getCostoKilo()
    {
        return $this->costo_kilo;
    }

    /**
     * @param mixed $costo_kilo
     */
    public function setCostoKilo($costo_kilo)
    {
        $this->costo_kilo = $costo_kilo;
    }

    /**
     * @return mixed
     */
    public function getCostoCaja()
    {
        return $this->costo_caja;
    }

    /**
     * @param mixed $costo_caja
     */
    public function setCostoCaja($costo_caja)
    {
        $this->costo_caja = $costo_caja;
    }


    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_clientes) +1, 1) as codigo from clientes";
        $this->id_cliente = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function verFilas()
    {
        $sql = "SELECT * FROM clientes";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "INSERT INTO clientes 
                VALUES ('$this->id_cliente',
                        '$this->documento',
                        '$this->razon_social',
                        '$this->direccion_factura',
                        '$this->telefono',
                        '$this->tipo_cliente',
                        '1000-01-01',
                        '$this->costo_kilo',
                        '$this->costo_caja');";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE
                FROM clientes
                WHERE id_cliente = '$this->id_cliente';";
        return $this->c_conectar->ejecutar_idu($sql);
    }


}