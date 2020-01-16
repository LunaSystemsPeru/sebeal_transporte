<?php
require_once 'Conectar.php';

class UnidadMedida
{
    private $id_unidad;
    private $nombre;
    private $abreviatura;
    private $cod_sunat;

    /**
     * UnidadMedida constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdUnidad()
    {
        return $this->id_unidad;
    }

    /**
     * @param mixed $id_unidad
     */
    public function setIdUnidad($id_unidad)
    {
        $this->id_unidad = $id_unidad;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * @param mixed $abreviatura
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    }

    /**
     * @return mixed
     */
    public function getCodSunat()
    {
        return $this->cod_sunat;
    }

    /**
     * @param mixed $cod_sunat
     */
    public function setCodSunat($cod_sunat)
    {
        $this->cod_sunat = $cod_sunat;
    }


}