<?php
require_once 'Conectar.php';

class Vehiculo
{
private $id_vehiculo;
private $placa;
private $marca;
private $modelo;
private $mtc;
private $capacidad;
private $c_conectar;

    /**
     * Vehiculo constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdVehiculo()
    {
        return $this->id_vehiculo;
    }

    /**
     * @param mixed $id_vehiculo
     */
    public function setIdVehiculo($id_vehiculo)
    {
        $this->id_vehiculo = $id_vehiculo;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getMtc()
    {
        return $this->mtc;
    }

    /**
     * @param mixed $mtc
     */
    public function setMtc($mtc)
    {
        $this->mtc = $mtc;
    }

    /**
     * @return mixed
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * @param mixed $capacidad
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
    }

    public function obtenerDatos()
    {
        $sql = "select * from vehiculo 
        where id_vehiculo = '$this->id_vehiculo'" ;
        $resultado = $this->c_conectar->get_Row($sql);
        $this->placa = $resultado['placa'];
        $this->marca = $resultado['marca'];
        $this->modelo = $resultado['modelo'];
        $this->mtc = $resultado['mtc'];
        //$this->id = $resultado['id_proveedor'];
        $this->capacidad = $resultado['capacidad'];
    }

    public function verFilas()
    {
        $sql = "SELECT id_vehiculo, placa, marca, modelo, mtc, capacidad
                FROM vehiculo";
        return $this->c_conectar->get_Cursor($sql);
    }

}