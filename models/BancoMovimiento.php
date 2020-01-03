<?php

require_once 'Conectar.php';

class BancoMovimiento
{
    private $id_movimiento;
    private $id_banco;
    private $fecha;
    private $descripcion;
    private $ingresa;
    private $sale;
    private $id_clasificacion;
    private $id_usuario;
    private $c_conectar;

    /**
     * BancoMovimiento constructor.
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
    public function getIngresa()
    {
        return $this->ingresa;
    }

    /**
     * @param mixed $ingresa
     */
    public function setIngresa($ingresa)
    {
        $this->ingresa = $ingresa;
    }

    /**
     * @return mixed
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @param mixed $sale
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
    }

    /**
     * @return mixed
     */
    public function getIdClasificacion()
    {
        return $this->id_clasificacion;
    }

    /**
     * @param mixed $id_clasificacion
     */
    public function setIdClasificacion($id_clasificacion)
    {
        $this->id_clasificacion = $id_clasificacion;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_movimiento) +1, 1) as codigo from bancos_movimientos";
        $this->id_movimiento = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function insertar()
    {
        $sql = "insert into bancos_movimientos values ('$this->id_movimiento', '$this->id_banco', '$this->fecha', '$this->descripcion', '$this->ingresa', '$this->sale', '$this->id_clasificacion', '$this->id_usuario')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "delete from bancos_movimientos where  id_movimiento = '$this->id_movimiento'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verSaldoAnterior()
    {
        $sql = "select ifnull(sum(bm.ingresa - bm.sale), 0) as saldo  
        from bancos_movimientos as bm
        where id_banco = '$this->id_banco' and date_format(bm.fecha, '%Y%m') < date_format(curdate(), '%Y%m')";
        return $this->c_conectar->get_valor_query($sql, "saldo");
    }

    public function verFilas()
    {
        $sql = "select bm.id_movimiento, bm.fecha, bm.descripcion, bm.ingresa, bm.sale, cm.nombre as clasificacion, u.usuario  
        from bancos_movimientos as bm
        inner join clasificacion_movimientos cm on bm.id_clasificacion = cm.id_clasificacion
        inner join usuarios u on bm.id_usuario = u.id_usuario
        where id_banco = '$this->id_banco' 
        order by bm.fecha asc";
        return $this->c_conectar->get_Cursor($sql);
    }
}