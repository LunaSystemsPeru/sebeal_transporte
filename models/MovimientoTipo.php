<?php

require_once 'Conectar.php';

class MovimientoTipo
{
    private $id_tipo;
    private $nombre;
    private $tipo;
    private $c_conectar;

    /**
     * MovimientoTipo constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function obtenerDatos()
    {
        $sql = "select * from movimientos_tipo 
        where id_tipo = '$this->id_tipo'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->nombre = $resultado['nombre'];
        $this->tipo = $resultado['tipo'];
    }

    public function verFilas()
    {
        $sql = "select * 
        from movimientos_tipo 
        order by nombre asc";
        return $this->c_conectar->get_Cursor($sql);
    }

}