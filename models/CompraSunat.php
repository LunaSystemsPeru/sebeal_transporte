<?php
require_once 'Conectar.php';

class CompraSunat
{
    private $id_compras;
    private $fecha;
    private $id_documento;
    private $serie;
    private $numero;
    private $id_proveedor;
    private $total;

    private $c_conectar;

    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdCompras()
    {
        return $this->id_compras;
    }

    /**
     * @param mixed $id_compras
     */
    public function setIdCompras($id_compras)
    {
        $this->id_compras = $id_compras;
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
    public function getIdDocumento()
    {
        return $this->id_documento;
    }

    /**
     * @param mixed $id_documento
     */
    public function setIdDocumento($id_documento)
    {
        $this->id_documento = $id_documento;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
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
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_compras) +1, 1) as codigo from compras_sunat";
        $this->id_compras = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function insertar()
    {
        $sql = "insert into compras_sunat 
                values ('$this->id_compras',
                        '$this->fecha',
                        '$this->id_documento',
                        '$this->serie',
                        '$this->numero',
                        '$this->id_proveedor',
                        '$this->total');";
        return $this->c_conectar->ejecutar_idu($sql);
    }
    public function eliminar()
    {
        $sql = "DELETE
                FROM compras_sunat
                WHERE id_compras = '$this->id_compras'";
        $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas_mostrar()
    {
        $sql = "SELECT 
                  co.id_compras,
                  co.fecha,
                  co.total,
                  pro.documento,
                  pro.razon_social,
                  co.numero,
                  co.serie 
                FROM
                  compras_sunat AS co 
                  INNER JOIN proveedor AS pro 
                    ON co.id_proveedor = pro.id_proveedor ";
        return $this->c_conectar->get_Cursor($sql);
    }
}