<?php

require_once 'Conectar.php';

class VentaSunat
{
    private $id_venta;
    private $fecha;
    private $id_documento;
    private $serie;
    private $numero;
    private $monto;
    private $id_envio;
    private $id_clientes;
    private $estado;
    private $c_conectar;

    /**
     * VentaSunat constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->id_venta;
    }

    /**
     * @param mixed $id_venta
     */
    public function setIdVenta($id_venta)
    {
        $this->id_venta = $id_venta;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getIdDocumento()
    {
        return $this->id_documento;
    }

    /**
     * @param mixed $id_documento
     */
    public function setIdDocumento($id_documento)
    {
        $this->id_documento = $id_documento;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    /**
     * @return mixed
     */
    public function getIdEnvio()
    {
        return $this->id_envio;
    }

    /**
     * @param mixed $id_envio
     */
    public function setIdEnvio($id_envio)
    {
        $this->id_envio = $id_envio;
    }

    /**
     * @return mixed
     */
    public function getIdClientes()
    {
        return $this->id_clientes;
    }

    /**
     * @param mixed $id_clientes
     */
    public function setIdClientes($id_clientes)
    {
        $this->id_clientes = $id_clientes;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_ventas) +1, 1) as codigo from ventas_sunat";
        $this->id_venta = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from ventas_sunat 
        where id_ventas = '$this->id_venta'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->fecha = $resultado['fecha'];
        $this->id_documento = $resultado['id_documento'];
        $this->serie = $resultado['serie'];
        $this->numero = $resultado['numero'];
        $this->monto = $resultado['monto'];
        $this->id_envio = $resultado['id_envio'];
        $this->id_clientes = $resultado['id_clientes'];
        $this->estado = $resultado['estado'];
    }

    public function verFilas()
    {
        $sql = "SELECT vs.id_ventas, vs.fecha, vs.monto, ds.abreviatura, vs.serie, vs.numero, vs.estado, c.documento, c.razon_social  
        from ventas_sunat as vs 
        inner join documentos_sunat ds on vs.id_documento = ds.id_documento
        inner join clientes c on vs.id_clientes = c.id_clientes";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "INSERT INTO ventas_sunat  
                VALUES
                  (
                    '$this->id_venta',
                    '$this->fecha',
                    '$this->id_documento',
                    '$this->serie',
                    '$this->numero',
                    '$this->monto',
                    $this->id_envio,
                   '$this->id_clientes', 
                   1
                  ) ";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}