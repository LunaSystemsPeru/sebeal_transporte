<?php

require_once 'Conectar.php';

class Contrato
{
    private $id;
    private $fechaInicio;
    private $fechaFin;
    private $duracion;
    private $idProveedor;
    private $servicio;
    private $montoPactado;
    private $montoPagado;
    private $montoFacturado;
    private $estado;
    private $idClasificacion;

    private $c_conectar;

    /**
     * Contrato constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * @param mixed $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * @param mixed $fechaFin
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }

    /**
     * @return mixed
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * @param mixed $duracion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * @param mixed $idProveedor
     */
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    /**
     * @return mixed
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * @param mixed $servicio
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;
    }

    /**
     * @return mixed
     */
    public function getMontoPactado()
    {
        return $this->montoPactado;
    }

    /**
     * @param mixed $montoPactado
     */
    public function setMontoPactado($montoPactado)
    {
        $this->montoPactado = $montoPactado;
    }

    /**
     * @return mixed
     */
    public function getMontoPagado()
    {
        return $this->montoPagado;
    }

    /**
     * @param mixed $montoPagado
     */
    public function setMontoPagado($montoPagado)
    {
        $this->montoPagado = $montoPagado;
    }

    /**
     * @return mixed
     */
    public function getMontoFacturado()
    {
        return $this->montoFacturado;
    }

    /**
     * @param mixed $montoFacturado
     */
    public function setMontoFacturado($montoFacturado)
    {
        $this->montoFacturado = $montoFacturado;
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
        return $this->idClasificacion;
    }

    /**
     * @param mixed $idClasificacion
     */
    public function setIdClasificacion($idClasificacion)
    {
        $this->idClasificacion = $idClasificacion;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_contrato) +1, 1) as codigo from contratos";
        $this->id = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function insertar()
    {
        $sql = "INSERT INTO contratos
                VALUES ('$this->id',
                        '$this->fechaInicio',
                        '$this->fechaFin',
                        '$this->duracion',
                        '$this->idProveedor',
                        '$this->servicio',
                        '$this->montoPactado',
                        '$this->montoPagado',
                        '$this->montoFacturado',
                        '$this->estado',
                        '$this->idClasificacion');";
        return $this->c_conectar->ejecutar_idu($sql);
    }
    public function verFilas()
    {
        $sql = "SELECT con.*,pro.razon_social FROM contratos AS con INNER JOIN proveedor AS pro ON con.id_proveedor=pro.id_proveedor";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function obtener_datos()
    {
        $query = "SELECT * FROM contratos WHERE id_contrato = '" . $this->id . "' ";
        $columna = $this->c_conectar->get_Row($query);
        $this->fechaInicio=$columna["fecha_inicio"];
        $this->fechaFin=$columna["fecha_fin"];
        $this->duracion=$columna["duracion"];
        $this->idProveedor=$columna["id_proveedor"];
        $this->servicio=$columna["servicio"];
        $this->montoPactado=$columna["monto_pactado"];
        $this->montoPagado=$columna["monto_pagado"];
        $this->montoFacturado=$columna["monto_facturado"];
        $this->estado=$columna["estado"];
        $this->idClasificacion=$columna["id_clasificacion"];
    }

}