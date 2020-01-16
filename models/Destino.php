<?php
require_once 'Conectar.php';

class Destino
{
    private $id;
    private $nombre;
    private $direccion;
    private $ubigeo;

    private $c_conectar;

    /**
     * Destino constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getUbigeo()
    {
        return $this->ubigeo;
    }

    /**
     * @param mixed $ubigeo
     */
    public function setUbigeo($ubigeo)
    {
        $this->ubigeo = $ubigeo;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_destino) +1, 1) as codigo from destinos_empresa";
        $this->id = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from destinos_empresa 
        where id_destino = '$this->id'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->nombre = $resultado['nombre'];
        $this->nombre = $resultado['direccion'];
        $this->nombre = $resultado['ubigeo'];
    }

    public function insertar()
    {
        $sql = "insert into destinos_empresa values ('$this->id', '$this->nombre', '$this->direccion', '$this->ubigeo')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas()
    {
        $sql = "select * 
        from destinos_empresa ";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function verOtrosDestino()
    {
        $sql = "select * 
        from destinos_empresa 
        where id_destino != '$this->id'";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function eliminar()
    {
        $sql = "delete from destinos_empresa where id_destino = '$this->id'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update destinos_empresa set nombre, direccion, ubigeo = '$this->nombre', '$this->direccion', '$this->ubigeo' where id_destino = '$this->id'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

}