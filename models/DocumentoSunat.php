<?php
require_once 'Conectar.php';


class DocumentoSunat
{
    private $id_documento;
    private $nombre;
    private $abreviatura;
    private $cod_sunat;
    private $c_conectar;

    /**
     * DocumentoSunat constructor.
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

    public function verFilas()
    {
        $sql = "select * 
        from documentos_sunat 
        order by nombre asc";
        return $this->c_conectar->get_Cursor($sql);
    }



}