<?php

require_once 'Conectar.php';

class MovimientoBanco
{
    private $id_movimiento;
    private $fecha;
    private $id_banco;
    private $id_tipo;
    private $ingresa;
    private $egresa;
    private $c_conectar;

    /**
     * MovimientoBanco constructor.
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
    public function getIdTipo()
    {
        return $this->id_tipo;
    }

    /**
     * @param mixed $id_tipo
     */
    public function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
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
    public function getEgresa()
    {
        return $this->egresa;
    }

    /**
     * @param mixed $egresa
     */
    public function setEgresa($egresa)
    {
        $this->egresa = $egresa;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_movimientos) +1, 1) as codigo from movimientos_banco";
        $this->id_movimiento = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from movimientos_banco 
        where id_movimientos = '$this->id_movimiento'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->fecha = $resultado['fecha'];
        $this->id_banco = $resultado['id_banco'];
        $this->id_tipo = $resultado['id_tipo'];
    }

    public function insertar()
    {
        $sql = "insert into movimientos_banco values ('$this->id_movimiento', '$this->fecha', '$this->id_banco', '$this->id_tipo', '$this->ingresa', '$this->egresa')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "delete from movimientos_banco where id_movimientos = '$this->id_movimiento'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas()
    {
        $sql = "select mb.id_movimientos, mb.fecha, mb.egresa, mb.ingresa, mt.nombre as nombre_tipo
        from movimientos_banco as mb
        inner join movimientos_tipo mt on mb.id_tipo = mt.id_tipo
        where mb.id_banco = '$this->id_banco' and mb.fecha = '$this->fecha' 
        order by mt.nombre asc";
        return $this->c_conectar->get_Cursor($sql);
    }

}