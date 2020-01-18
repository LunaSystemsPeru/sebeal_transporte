<?php
require_once 'Conectar.php';

class PrestamoPago
{
    private $id_movimiento;
    private $id_prestamo;
    private $nro_cuota;

    private $c_conectar;

    /**
     * PrestamoPago constructor.
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
    public function getNroCuota()
    {
        return $this->nro_cuota;
    }

    /**
     * @param mixed $nro_cuota
     */
    public function setNroCuota($nro_cuota)
    {
        $this->nro_cuota = $nro_cuota;
    }

    public function siguienteCuota()
    {
        $sql = "select ifnull(max(nro_cuota) +1, 1) as cuota from prestamos_pago where id_prestamo = '$this->id_prestamo'";
        $this->nro_cuota = $this->c_conectar->get_valor_query($sql, "cuota");
    }

    public function verFilas()
    {
        $sql = "SELECT bm.id_movimiento, bm.fecha, bm.sale, cb.nombre, pa.nro_cuota
        FROM prestamos_pago AS pa 
        INNER JOIN bancos_movimientos bm ON pa.id_movimiento = bm.id_movimiento
        INNER JOIN caja_bancos cb ON bm.id_banco = cb.id_banco
        WHERE pa.id_prestamo = '$this->id_prestamo'";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "INSERT INTO prestamos_pago
                VALUES ('$this->id_movimiento',
                        '$this->id_prestamo',
                        '$this->nro_cuota')";
        return $this->c_conectar->ejecutar_idu($sql);
    }
    public function eliminar()
    {
        $sql = "DELETE
                FROM prestamos_pago
                WHERE id_movimiento = '$this->id_movimiento'
                    AND id_prestamo = '$this->id_prestamo'";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}