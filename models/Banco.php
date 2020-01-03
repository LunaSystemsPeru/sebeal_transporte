<?php

require_once 'Conectar.php';

class Banco
{
    private $id_banco;
    private $nombre;
    private $nrocuenta;
    private $monto;
    private $c_conectar;

    /**
     * Banco constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNrocuenta()
    {
        return $this->nrocuenta;
    }

    /**
     * @param mixed $nrocuenta
     */
    public function setNrocuenta($nrocuenta)
    {
        $this->nrocuenta = $nrocuenta;
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

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_banco) +1, 1) as codigo from caja_bancos";
        $this->id_banco = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from caja_bancos 
        where id_banco = '$this->id_banco'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->nombre = $resultado['nombre'];
        $this->nrocuenta = $resultado['nro_cuenta'];
        $this->monto = $resultado['monto'];
    }


    public function insertar()
    {
        $sql = "insert into caja_bancos values ('$this->id_banco', '$this->nombre', '$this->nrocuenta', '$this->monto')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas()
    {
        $sql = "select * 
        from caja_bancos ";
        return $this->c_conectar->get_Cursor($sql);
    }

}