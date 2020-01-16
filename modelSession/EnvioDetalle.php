<?php


class EnvioDetalle
{
    private $id;
    private $descripcion;
    private $peso;
    private $cantidad;
    private $costo;
    private $id_unidad_medida;
    private $nombre_unidad;

    /**
     * EnvioDetalle constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = strtoupper($descripcion);
    }

    /**
     * @param mixed $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * @param mixed $id_unidad_medida
     */
    public function setIdUnidadMedida($id_unidad_medida)
    {
        $this->id_unidad_medida = $id_unidad_medida;
    }

    /**
     * @param mixed $nombre_unidad
     */
    public function setNombreUnidad($nombre_unidad)
    {
        $this->nombre_unidad = $nombre_unidad;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @return mixed
     */
    public function getIdUnidadMedida()
    {
        return $this->id_unidad_medida;
    }

    /**
     * @return mixed
     */
    public function getNombreUnidad()
    {
        return $this->nombre_unidad;
    }

    function agregar()
    {
        $fila = array();
        $fila['id'] = $this->id;
        $fila['descripcion'] = $this->descripcion;
        $fila['cantidad'] = $this->cantidad;
        $fila['costo'] = $this->costo;
        $fila['peso'] = $this->peso;
        $fila['id_unidad'] = $this->id_unidad_medida;
        $fila['nombre_unidad'] = $this->nombre_unidad;
        $_SESSION['enviodetalle'][$this->id] = $fila;
    }

    function eliminar()
    {
        unset($_SESSION['enviodetalle'][$this->id]);
    }
}