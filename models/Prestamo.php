<?php
require_once 'Conectar.php';


class Prestamo{
    private $id_prestamo;
    private $fecha;
    private $id_proveedor;
    private $monto;
    private $tot_cuotas;
    private $fecha_pago;
    private $monto_cuota;
    private $total_pagado;
    private $estado;
    private $id_movimiento;

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
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * @param mixed $id_proveedor
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
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
    public function getTotCuotas()
    {
        return $this->tot_cuotas;
    }

    /**
     * @param mixed $tot_cuotas
     */
    public function setTotCuotas($tot_cuotas)
    {
        $this->tot_cuotas = $tot_cuotas;
    }

    /**
     * @return mixed
     */
    public function getFechaPago()
    {
        return $this->fecha_pago;
    }

    /**
     * @param mixed $fecha_pago
     */
    public function setFechaPago($fecha_pago)
    {
        $this->fecha_pago = $fecha_pago;
    }

    /**
     * @return mixed
     */
    public function getMontoCuota()
    {
        return $this->monto_cuota;
    }

    /**
     * @param mixed $monto_cuota
     */
    public function setMontoCuota($monto_cuota)
    {
        $this->monto_cuota = $monto_cuota;
    }

    /**
     * @return mixed
     */
    public function getTotalPagado()
    {
        return $this->total_pagado;
    }

    /**
     * @param mixed $total_pagado
     */
    public function setTotalPagado($total_pagado)
    {
        $this->total_pagado = $total_pagado;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
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

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_prestamo) +1, 1) as codigo from prestamos";
        $this->id_prestamo = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function verFilas()
    {
        $sql = "SELECT pre.*, pro.documento,pro.razon_social FROM prestamos AS pre INNER JOIN proveedor  AS pro ON pre.id_proveedor = pro.id_proveedor";
        return $this->c_conectar->get_Cursor($sql);
    }
    public function insertar()
    {
        $sql = "INSERT INTO prestamos 
                VALUES ('$this->id_prestamo',
                        '$this->fecha',
                        '$this->id_proveedor',
                        '$this->monto',
                        '$this->tot_cuotas',
                        '$this->fecha_pago',
                        '$this->monto_cuota',
                        '$this->total_pagado',
                        '$this->estado',
                        '$this->id_movimiento')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function obtener_datos()
    {
        $query = "SELECT *  FROM prestamos WHERE id_prestamo = '" . $this->id_prestamo . "' ";
        $columna = $this->c_conectar->get_Row($query);
        $this->fecha=$columna["fecha"];
        $this->id_proveedor=$columna["id_proveedor"];
        $this->monto=$columna["monto"];
        $this->tot_cuotas=$columna["tot_cuotas"];
        $this->fecha_pago=$columna["fecha_pago"];
        $this->monto_cuota=$columna["monto_cuota"];
        $this->total_pagado=$columna["total_pagado"];
        $this->estado=$columna["estado"];
        $this->id_movimiento=$columna["id_movimiento"];
    }
    public function eliminar()
    {
        $sql = "DELETE
                FROM prestamos
                WHERE id_prestamo = '$this->id_prestamo';";
        return $this->c_conectar->ejecutar_idu($sql);
    }

}