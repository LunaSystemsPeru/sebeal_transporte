<?php
require_once 'Conectar.php';

class ClienteDireccion
{
    private $id_cliente;
    private $id_direccion;
    private $direccion;
    private $id_destino;
    private $c_conectar;

    /**
     * ClienteDireccion constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @return mixed
     */
    public function getIdDireccion()
    {
        return $this->id_direccion;
    }

    /**
     * @param mixed $id_direccion
     */
    public function setIdDireccion($id_direccion)
    {
        $this->id_direccion = $id_direccion;
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
    public function getIdDestino()
    {
        return $this->id_destino;
    }

    /**
     * @param mixed $id_destino
     */
    public function setIdDestino($id_destino)
    {
        $this->id_destino = $id_destino;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_direccion) +1, 1) as codigo from clientes_direccion";
        $this->id_direccion = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function verFilas()
    {
        $sql = "SELECT * FROM clientes_direccion where id_clientes = '$this->id_cliente'";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "INSERT INTO clientes_direccion 
                VALUES ('$this->id_direccion',
                        '$this->id_cliente',
                        '$this->direccion',
                        '$this->id_destino');";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE
                FROM clientes_direccion
                WHERE id_direccion = '$this->id_direccion';";
        return $this->c_conectar->ejecutar_idu($sql);
    }

}