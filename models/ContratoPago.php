<?php
require_once 'Conectar.php';

class ContratoPago
{
    private $idMovimiento;
    private $idContrato;


    private $c_conectar;
    /**
     * ContratoPago constructor.
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
        return $this->idMovimiento;
    }

    /**
     * @param mixed $idMovimiento
     */
    public function setIdMovimiento($idMovimiento)
    {
        $this->idMovimiento = $idMovimiento;
    }

    /**
     * @return mixed
     */
    public function getIdContrato()
    {
        return $this->idContrato;
    }

    /**
     * @param mixed $idContrato
     */
    public function setIdContrato($idContrato)
    {
        $this->idContrato = $idContrato;
    }
    public function insertar()
    {
        $sql = "INSERT INTO contratos_pagos
                VALUES ('$this->idMovimiento',
                        '$this->idContrato');";
        return $this->c_conectar->ejecutar_idu($sql);
    }
    public function verFilas () {
        $sql = "SELECT bm.id_movimiento, bm.fecha, bm.sale, cb.nombre
        FROM contratos_pagos AS cp 
        INNER JOIN bancos_movimientos bm ON cp.id_movimiento = bm.id_movimiento
        INNER JOIN caja_bancos cb ON bm.id_banco = cb.id_banco
        WHERE cp.id_contrato ='$this->idContrato' ";

        return $this->c_conectar->get_Cursor($sql);
    }


}