<?php

require_once 'Conectar.php';

class Gasto
{
    private $id_movimiento;
    private $c_conectar;

    /**
     * Gasto constructor.
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

    public function insertar()
    {
        $sql = "insert into gastos values ('$this->id_movimiento')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas($periodo)
    {
        $sql = "select bm.descripcion, bm.fecha, bm.ingresa, bm.sale, cb.nombre as banco, u.usuario, cm.nombre as clasificacion  
        from gastos as g 
        inner join bancos_movimientos bm on g.id_movimiento = bm.id_movimiento
        inner join clasificacion_movimientos cm on bm.id_clasificacion = cm.id_clasificacion
        inner join caja_bancos cb on bm.id_banco = cb.id_banco 
        inner join usuarios u on bm.id_usuario = u.id_usuario
        where date_format(bm.fecha, '%Y%m') = '$periodo'";
        return $this->c_conectar->get_Cursor($sql);
    }
}