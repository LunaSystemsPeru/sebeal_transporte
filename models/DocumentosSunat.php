<?php

require_once 'Conectar.php';

class DocumentosSunat
{
    private $id_documento;
    private $nombre;
    private $abreviatura;
    private $cod_sunat;
    private $c_conectar;

    /**
     * DocumentosSunat constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * @param mixed $abreviatura
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    }

    /**
     * @return mixed
     */
    public function getCodSunat()
    {
        return $this->cod_sunat;
    }

    /**
     * @param mixed $cod_sunat
     */
    public function setCodSunat($cod_sunat)
    {
        $this->cod_sunat = $cod_sunat;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_documento) +1, 1) as codigo from documentos_sunat";
        $this->id_documento = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function verFilas()
    {
        $sql = "SELECT * FROM documentos_sunat order by nombre asc";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "INSERT INTO documentos_sunat 
                VALUES ('$this->id_documento',
                        '$this->nombre',
                        '$this->abreviatura',
                        '$this->cod_sunat');";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function actualizar()
    {
        $sql = "UPDATE 
                documentos_sunat
                SET nombre = '$this->nombre', 
                abreviatura = '$this->abreviatura', 
                cod_sunat = '$this->cod_sunat' 
                where id_documento = '$this->id_documento'";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE
                FROM documentos_sunat
                WHERE id_documento = '$this->id_cliente';";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}