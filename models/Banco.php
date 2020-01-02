<?php

require_once 'Conectar.php';

class Banco
{
    private $id_banco;
    private $nombre;
    private $efectivo;
    private $virtual;
    private $id_empresa;
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
    public function getEfectivo()
    {
        return $this->efectivo;
    }

    /**
     * @param mixed $efectivo
     */
    public function setEfectivo($efectivo)
    {
        $this->efectivo = $efectivo;
    }

    /**
     * @return mixed
     */
    public function getVirtual()
    {
        return $this->virtual;
    }

    /**
     * @param mixed $virtual
     */
    public function setVirtual($virtual)
    {
        $this->virtual = $virtual;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresa()
    {
        return $this->id_empresa;
    }

    /**
     * @param mixed $id_empresa
     */
    public function setIdEmpresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_banco) +1, 1) as codigo from banco";
        $this->id_banco = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from banco 
        where id_banco = '$this->id_banco'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->nombre = $resultado['nombre'];
        $this->efectivo = $resultado['efectivo'];
        $this->virtual = $resultado['virtual'];
    }


    public function insertar()
    {
        $sql = "insert into banco values ('$this->id_banco', '$this->nombre', '$this->efectivo', '$this->virtual', '$this->id_empresa')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas()
    {
        $sql = "select * 
        from banco 
        where id_empresa = '$this->id_empresa'";
        return $this->c_conectar->get_Cursor($sql);
    }

}