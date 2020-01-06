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
    private $MontoFacturado;
    private $estado;
    private $idClasificacion;

    private $c_conectar;

    /**
     * Contrato constructor.
     */
    public function __construct()
    {
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
        return $this->MontoFacturado;
    }

    /**
     * @param mixed $MontoFacturado
     */
    public function setMontoFacturado($MontoFacturado)
    {
        $this->MontoFacturado = $MontoFacturado;
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

}