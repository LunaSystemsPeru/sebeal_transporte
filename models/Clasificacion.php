<?php
require_once 'Conectar.php';

class Clasificacion
{
private $id;
private $nombre;
private $c_conectar;

    /**
     * Clasificacion constructor.
     */
    public function __construct()
    {
        $this->c_conectar=Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_clasificacion) +1, 1) as codigo from clasificacion_movimientos";
        $this->id = $this->c_conectar->get_valor_query($sql, "codigo");
    }
    public function obtenerDatos()
    {
        $sql = "select * from clasificacion_movimientos 
        where id_clasificacion = '$this->id'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->nombre = $resultado['nombre'];

    }
    public function insertar(){
        $sql = "insert into clasificacion_movimientos values ('$this->id', '$this->nombre')";
        return $this->c_conectar->ejecutar_idu($sql);
    }
    public function verFilas()
    {
        $sql = "select * 
        from clasificacion_movimientos ";
        return $this->c_conectar->get_Cursor($sql);
    }
    public function eliminar(){
        $sql = "delete from clasificacion_movimientos where id_clasificacio n= '$this->id'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function modificar(){
        $sql = "update clasificacion_movimientos set nombre = '$this->nombre' where id_clasificacion = '$this->id'";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}