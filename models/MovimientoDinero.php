<?php

require_once 'Conectar.php';

class MovimientoDinero
{
    private $id_movimiento;
    private $fecha;
    private $descripcion;
    private $ingresa;
    private $egresa;
    private $id_banco;
    private $c_conectar;

    /**
     * MovimientoDinero constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdMovimiento()
    {
        return $this->id_movimiento;
    }

    /**
     * @param mixed $id_movimiento
     */
    public function setIdMovimiento($id_movimiento)
    {
        $this->id_movimiento = $id_movimiento;
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getIngresa()
    {
        return $this->ingresa;
    }

    /**
     * @param mixed $ingresa
     */
    public function setIngresa($ingresa)
    {
        $this->ingresa = $ingresa;
    }

    /**
     * @return mixed
     */
    public function getEgresa()
    {
        return $this->egresa;
    }

    /**
     * @param mixed $egresa
     */
    public function setEgresa($egresa)
    {
        $this->egresa = $egresa;
    }

    /**
     * @return mixed
     */
    public function getIdBanco()
    {
        return $this->id_banco;
    }

    /**
     * @param mixed $id_banco
     */
    public function setIdBanco($id_banco)
    {
        $this->id_banco = $id_banco;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_movimientos) +1, 1) as codigo from movimientos_dinero";
        $this->id_movimiento = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function insertar () {
        $sql = "insert into movimientos_dinero 
        value ('$this->id_movimiento', '$this->fecha', '$this->descripcion', '$this->ingresa', '$this->egresa', '$this->id_banco')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar () {
        $sql = "delete from movimientos_dinero 
        where id_movimientos = '$this->id_movimiento'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

}