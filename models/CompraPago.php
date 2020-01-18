<?php

require_once 'Conectar.php';

class CompraPago
{
    private $id_compra;
    private $id_movimiento;
    private $c_conectar;

    /**
     * CompraPago constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdCompra()
    {
        return $this->id_compra;
    }

    /**
     * @param mixed $id_compra
     */
    public function setIdCompra($id_compra)
    {
        $this->id_compra = $id_compra;
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
        $sql = "INSERT INTO compras_pagos
                VALUES ('$this->id_compra',
                        '$this->id_movimiento');";
        return $this->c_conectar->ejecutar_idu($sql);
    }
    public function verFilas () {
        $sql = "SELECT bm.id_movimiento, bm.fecha, bm.sale, cb.nombre
        FROM compras_pagos AS cp 
        INNER JOIN bancos_movimientos bm ON cp.id_movimiento = bm.id_movimiento
        INNER JOIN caja_bancos cb ON bm.id_banco = cb.id_banco
        WHERE cp.id_compras ='$this->id_compra' ";

        return $this->c_conectar->get_Cursor($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE
                    FROM compras_pagos
                    WHERE id_movimiento = '$this->idMovimiento'
                        AND id_compras = '$this->id_compra'";

        return $this->c_conectar->ejecutar_idu($sql);
    }
}