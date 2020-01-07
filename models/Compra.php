<?php
require_once 'Conectar.php';

class Compra
{
    private $id_compra;
    private $periodo;
    private $fecha;
    private $id_proveedor;
    private $id_documento;
    private $serie;
    private $numero;
    private $monto_total;
    private $monto_pagado;
    private $estado;
    private $id_clasificacion;

    private $c_conectar;

    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdCompra()
    {
        return $this->id_compra;
    }

    /**
     * @param mixed $id_compra
     */
    public function setIdCompra($id_compra)
    {
        $this->id_compra = $id_compra;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
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
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * @param mixed $id_proveedor
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
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
    public function getMontoTotal()
    {
        return $this->monto_total;
    }

    /**
     * @param mixed $monto_total
     */
    public function setMontoTotal($monto_total)
    {
        $this->monto_total = $monto_total;
    }

    /**
     * @return mixed
     */
    public function getMontoPagado()
    {
        return $this->monto_pagado;
    }

    /**
     * @param mixed $monto_pagado
     */
    public function setMontoPagado($monto_pagado)
    {
        $this->monto_pagado = $monto_pagado;
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

    /**
     * @return mixed
     */
    public function getIdClasificacion()
    {
        return $this->id_clasificacion;
    }

    /**
     * @param mixed $id_clasificacion
     */
    public function setIdClasificacion($id_clasificacion)
    {
        $this->id_clasificacion = $id_clasificacion;
    }
    public function verFilas_mostrar()
    {
        $sql = "SELECT 
                  co.id_compra,
                  co.fecha,
                  co.monto_total,
                  co.monto_pagado,
                  co.monto_total,
                  pro.documento,
                  pro.razon_social,
                  co.numero,
                  co.serie 
                FROM
                  compras AS co 
                  INNER JOIN proveedor AS pro 
                    ON co.id_proveedor = pro.id_proveedor ";
        return $this->c_conectar->get_Cursor($sql);
    }
    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_compra) +1, 1) as codigo from compras";
        $this->id_compra = $this->c_conectar->get_valor_query($sql, "codigo");
    }
    public function insertar()
    {
        $sql = "insert into compras 
                values ('$this->id_compra',
                        '$this->periodo',
                        '$this->fecha',
                        '$this->id_proveedor',
                        '$this->id_documento',
                        '$this->serie',
                        '$this->numero',
                        '$this->monto_total',
                        '$this->monto_pagado',
                        '$this->estado',
                        '$this->id_clasificacion')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

}