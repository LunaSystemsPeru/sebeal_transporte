<?php
require_once 'Conectar.php';

class Vehiculo
{
private $id_vehiculo;
private $placa;
private $marca;
private $modelo;
private $mtc;
private $capacidad;
private $idProveedor;
private $c_conectar;

    /**
     * Vehiculo constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdVehiculo()
    {
        return $this->id_vehiculo;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * @param mixed $idProveedor
     */
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    /**
     * @param mixed $id_vehiculo
     */
    public function setIdVehiculo($id_vehiculo)
    {
        $this->id_vehiculo = $id_vehiculo;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getMtc()
    {
        return $this->mtc;
    }

    /**
     * @param mixed $mtc
     */
    public function setMtc($mtc)
    {
        $this->mtc = $mtc;
    }

    /**
     * @return mixed
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * @param mixed $capacidad
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_vehiculo) +1, 1) as codigo from vehiculo";
        $this->id_vehiculo = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function verFilas()
    {
        $sql = "SELECT id_vehiculo, placa, marca, modelo, mtc, capacidad, p.documento
                FROM vehiculo 
                inner join proveedor p on vehiculo.id_proveedor = p.id_proveedor";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function verFilas_proveedor()
    {
        $sql = "SELECT * FROM vehiculo WHERE id_proveedor = '$this->idProveedor'";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function verProveedor_transportista()
    {
        $sql="SELECT id_proveedor, razon_social FROM `proveedor` WHERE tipo=2";
        return$this->c_conectar->get_Cursor($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from vehiculo 
        where id_vehiculo = '$this->id_vehiculo'";
        $resultado = $this->c_conectar->get_Row($sql);
        if ($resultado) {
            $this->placa = $resultado['placa'];
            $this->marca = $resultado['marca'];
            $this->modelo = $resultado['modelo'];
            $this->mtc = $resultado['mtc'];
            $this->idProveedor = $resultado['id_proveedor'];
            $this->capacidad = $resultado['capacidad'];
        }
    }


    public function insertar()
    {
        $sql = "INSERT INTO vehiculo  
                VALUES
                  (
                    '$this->id_vehiculo',
                    '$this->placa',
                    '$this->marca',
                    '$this->modelo',
                    '$this->mtc',
                    '$this->idProveedor',
                    '$this->capacidad'
                  ) ;";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}