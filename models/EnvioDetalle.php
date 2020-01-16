<?php

require_once 'Conectar.php';

class EnvioDetalle
{
    private $id_envio;
    private $id_detalle;
    private $descripcion;
    private $peso;
    private $cantidad;
    private $costo;
    private $id_unidad;
    private $c_conectar;

    /**
     * EnvioDetalle constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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
    public function getIdDetalle()
    {
        return $this->id_detalle;
    }

    /**
     * @param mixed $id_detalle
     */
    public function setIdDetalle($id_detalle)
    {
        $this->id_detalle = $id_detalle;
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
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param mixed $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
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

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_envio_detalle) +1, 1) 
                    as codigo 
                from envios_detalle
                where id_envio = '$this->id_envio'";
        $this->id_detalle = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function verFilas()
    {
        $sql = "SELECT *
        from envios_detalle 
        where id_envio = '$this->id_envio' 
        order by descripcion asc";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "INSERT INTO envios_detalle 
                VALUES ('$this->id_detalle',
                        '$this->id_envio',
                        '$this->descripcion',
                        '$this->peso',
                        '$this->cantidad',
                        '$this->costo',
                        '$this->id_unidad')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE
                FROM envios_detalle
                WHERE id_envio = '$this->id_envio'";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}