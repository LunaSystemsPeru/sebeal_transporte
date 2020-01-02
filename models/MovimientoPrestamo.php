<?php

require_once 'Conectar.php';

class MovimientoPrestamo
{

    private $id_prestamo;
    private $id_movimiento;
    private $c_conectar;

    /**
     * MovimientoPrestamo constructor.
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

    public function insertar()
    {
        $sql = "insert into prestamo_movimientos_dinero 
        value ('$this->id_prestamo', '$this->id_movimiento')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "delete from prestamo_movimientos_dinero 
        where id_prestamo = '$this->id_prestamo' and id_movimientos = '$this->id_movimiento'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas()
    {
        $sql = "select md.fecha, md.id_movimientos, md.egresa, md.ingresa, md.descripcion 
        from prestamo_movimientos_dinero as pmd 
        inner join movimientos_dinero md on pmd.id_movimientos = md.id_movimientos 
        where pmd.id_prestamo = '$this->id_prestamo'";
        return $this->c_conectar->get_Cursor($sql);
    }
}