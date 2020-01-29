<?php

require_once 'Conectar.php';

class EnvioCobro
{
    private $id_envio;
    private $id_movimiento;
    private $c_conectar;

    /**
     * EnvioCobro constructor.
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
        $sql = "INSERT INTO envios_cobro 
                VALUES ('$this->id_envio',
                        '$this->id_movimiento'
                        )";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas () {
        $sql = "SELECT bm.id_movimiento, bm.fecha, bm.ingresa, cb.nombre
        FROM envios_cobro AS ec 
        INNER JOIN bancos_movimientos bm ON ec.id_movimiento = bm.id_movimiento
        INNER JOIN caja_bancos cb ON bm.id_banco = cb.id_banco
        WHERE ec.id_envio ='$this->id_envio' ";

        return $this->c_conectar->get_Cursor($sql);
    }

}