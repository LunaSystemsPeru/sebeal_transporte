<?php
require_once 'Conectar.php';

class HojaRuta
{
    private $id_hoja_ruta;
    private $fecha;
    private $capacidad_contratada;
    private $c_conenctar;

    /**
     * HojaRuta constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdHojaRuta()
    {
        return $this->id_hoja_ruta;
    }

    /**
     * @param mixed $id_hoja_ruta
     */
    public function setIdHojaRuta($id_hoja_ruta)
    {
        $this->id_hoja_ruta = $id_hoja_ruta;
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
    public function getCapacidadContratada()
    {
        return $this->capacidad_contratada;
    }

    /**
     * @param mixed $capacidad_contratada
     */
    public function setCapacidadContratada($capacidad_contratada)
    {
        $this->capacidad_contratada = $capacidad_contratada;
    }
    public function inserta(){
        $sql = "INSERT INTO hoja_ruta
                VALUES()";
        return $this->c_conenctar->ejecutar_idu($sql);
    }
    public function ver_filas(){
        $sql = "SELECT * 
                FROM hoja_ruta";
        return $this->c_conenctar->ejecutar_idu($sql);
    }
}