<?php

require_once 'Conectar.php';

class VentasDetalle
{
    private $id_venta_detalle;
    private $id_venta;
    private $cantidad;
    private $descripcion;
    private $precio;
    private $c_conectar;

    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }


    /**
     * @return mixed
     */
    public function getIdVentaDetalle()
    {
        return $this->id_venta_detalle;
    }

    /**
     * @param mixed $id_venta_detalle
     */
    public function setIdVentaDetalle($id_venta_detalle)
    {
        $this->id_venta_detalle = $id_venta_detalle;
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
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_venta_detalle) +1, 1) as codigo from ventas_detalle";
        $this->id_venta_detalle = $this->c_conectar->get_valor_query($sql, "codigo");
    }
    public function insertar()
    {
        $sql = "INSERT INTO ventas_detalle 
                VALUES ('$this->id_venta_detalle',
                        '$this->id_venta',
                        '$this->descripcion',
                        '$this->cantidad',
                        '$this->precio');";
        return $this->c_conectar->ejecutar_idu($sql);
    }

}