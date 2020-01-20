<?php

require_once 'Conectar.php';
class Chofer
{
private $id_chofer;
private $brevete;
private $datos;
private $vencimiento;
private $categoria;
private $c_conectar;

    /**
     * Chofer constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdChofer()
    {
        return $this->id_chofer;
    }

    /**
     * @param mixed $id_chofer
     */
    public function setIdChofer($id_chofer)
    {
        $this->id_chofer = $id_chofer;
    }

    /**
     * @return mixed
     */
    public function getBrevete()
    {
        return $this->brevete;
    }

    /**
     * @param mixed $brevete
     */
    public function setBrevete($brevete)
    {
        $this->brevete = $brevete;
    }

    /**
     * @return mixed
     */
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * @param mixed $datos
     */
    public function setDatos($datos)
    {
        $this->datos = $datos;
    }

    /**
     * @return mixed
     */
    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    /**
     * @param mixed $vencimiento
     */
    public function setVencimiento($vencimiento)
    {
        $this->vencimiento = $vencimiento;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_chofer) +1, 1) as codigo from chofer";
        $this->id_chofer = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function verFilas()
    {
        $sql = "SELECT id_chofer, brevete, datos, vencimiento, categoria
                FROM chofer";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "INSERT INTO envios 
                VALUES ('$this->id_chofer',
                        '$this->brevete',
                        '$this->datos',
                        '$this->vencimiento',
                        '$this->categoria');";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}