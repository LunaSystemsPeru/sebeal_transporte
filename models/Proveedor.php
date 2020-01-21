<?php
require_once 'Conectar.php';

class Proveedor
{
    private $id_proveedor;
    private $documento;
    private $razon_social;
    private $direccion;
    private $nombre_comercial;
    private $tipo;

    private $c_conectar;

    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * @param mixed $id_proveedor
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param mixed $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * @param mixed $razon_social
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = $razon_social;
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
    public function getNombreComercial()
    {
        return $this->nombre_comercial;
    }

    /**
     * @param mixed $nombre_comercial
     */
    public function setNombreComercial($nombre_comercial)
    {
        $this->nombre_comercial = $nombre_comercial;
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

    /**
     * @return Conectar
     */
    public function getCConectar()
    {
        return $this->c_conectar;
    }

    /**
     * @param Conectar $c_conectar
     */
    public function setCConectar($c_conectar)
    {
        $this->c_conectar = $c_conectar;
    }
    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_proveedor) +1, 1) as codigo from proveedor";
        $this->id_proveedor = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function verFilas()
    {
        $sql = "SELECT * FROM proveedor";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function obtenerDatos_documento()
    {
        $sql = "select * from proveedor 
        where documento = '$this->documento'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->id_proveedor=-1;
        if ($resultado){
            $this->id_proveedor= $resultado['id_proveedor'];
            $this->razon_social= $resultado['razon_social'];
            $this->direccion= $resultado['direccion'];
            $this->nombre_comercial= $resultado['nombre_comercial'];
            $this->tipo= $resultado['tipo'];
        }
    }
    public function verTransportista()
    {
        $sql = "SELECT id_proveedor, documento, razon_social, direccion, nombre_comercial, tipo FROM `proveedor` WHERE tipo=2";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from proveedor 
        where id_proveedor = '$this->id_proveedor'";
        $resultado = $this->c_conectar->get_Row($sql);

        if ($resultado){
            $this->documento= $resultado['documento'];
            $this->razon_social= $resultado['razon_social'];
            $this->direccion= $resultado['direccion'];
            $this->nombre_comercial= $resultado['nombre_comercial'];
            $this->tipo= $resultado['tipo'];
        }



    }

    public function buscarProveedorJson($term)
    {
        $sql = "SELECT * FROM proveedor
        where razon_social like '%$term%' or documento like '%$term%' 
        order by razon_social asc";
        return $this->c_conectar->get_Cursor($sql);
    }
    public function buscarProveedorTransportistaJson($term)
    {
        $sql = "SELECT * FROM proveedor
        where tipo=2 AND razon_social like '%$term%' or documento like '%$term%' 
        order by razon_social asc";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "INSERT INTO proveedor 
                VALUES
                  (
                    '$this->id_proveedor',
                    '$this->documento',
                    '$this->razon_social',
                    '$this->direccion',
                    '$this->nombre_comercial',
                    '$this->tipo'
                  ) ;";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE
                FROM proveedor
                WHERE id_proveedor = '$this->id_proveedor';";
        return $this->c_conectar->ejecutar_idu($sql);
    }

}