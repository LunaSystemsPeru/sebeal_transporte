<?php

require_once 'Conectar.php';

class Prestamo
{
    private $id_prestamo;
    private $fecha;
    private $observaciones;
    private $monto;
    private $devuelto;
    private $id_banco;
    private $c_conectar;

    /**
     * Prestamo constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdPrestamo()
    {
        return $this->id_prestamo;
    }

    /**
     * @param mixed $id_prestamo
     */
    public function setIdPrestamo($id_prestamo)
    {
        $this->id_prestamo = $id_prestamo;
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
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = strtoupper($observaciones);
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    /**
     * @return mixed
     */
    public function getDevuelto()
    {
        return $this->devuelto;
    }

    /**
     * @param mixed $devuelto
     */
    public function setDevuelto($devuelto)
    {
        $this->devuelto = $devuelto;
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
        $sql = "select ifnull(max(id_prestamo) +1, 1) as codigo from prestamo";
        $this->id_prestamo = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from prestamo 
        where id_prestamo = '$this->id_prestamo'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->fecha = $resultado['fecha'];
        $this->observaciones = $resultado['observaciones'];
        $this->id_banco = $resultado['id_banco'];
        $this->monto = $resultado['monto'];
        $this->devuelto = $resultado['devuelto'];
    }


    public function insertar()
    {
        $sql = "insert into prestamo 
        value ('$this->id_prestamo', '$this->fecha', '$this->observaciones', '0', '0', '$this->id_banco')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas($id_empresa)
    {
        $sql = "select p.id_prestamo, p.fecha, p.observaciones, p.monto, p.devuelto, b.nombre as nombanco 
        from prestamo as p 
        inner join banco b on p.id_banco = b.id_banco 
        where b.id_empresa = '$id_empresa' 
        order by p.fecha asc";
        return $this->c_conectar->get_Cursor($sql);
    }


}

